<?php declare(strict_types=1);

namespace App\Controller\Security;

use App\Entity\User;
use App\Form\Type\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    public function __construct(
        private UserRepository $userRepository,
        private UserPasswordHasherInterface $passwordHasher
    ) {

    }

    #[Route('/security/register', name: 'register', methods: 'POST')]
    public function register(Request $request): JsonResponse
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        if (!($form->isSubmitted() && $form->isValid())) {
            return $this->json([
                'errors' => $this->getFormErrors($form),
            ],
                Response::HTTP_BAD_REQUEST);
        }
        /** @var User $user */
        $user = $form->getData();
        $hashPassword = $this->passwordHasher->hashPassword($user, $user->getPassword());
        $user->setPassword($hashPassword);
        $this->userRepository->add($user);
        return $this->json([
            'success' => ['message' => 'User registered'],
        ],
            Response::HTTP_CREATED);
    }

    private function getFormErrors(FormInterface $form): array
    {
        $errors = [];
        foreach ($form as $child) {
            foreach ($form->getErrors() as $error) {
                $errors['form'][] = $error->getMessage();
            }
            if (!$child->isValid()) {
                foreach ($child->getErrors() as $error) {
                    $errors[$child->getName()][] = $error->getMessage();
                }
            }
        }

        return $errors;
    }
}