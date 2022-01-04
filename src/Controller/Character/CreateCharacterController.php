<?php declare(strict_types=1);

namespace App\Controller\Character;

use App\Entity\User;
use App\Form\DTO\Character;
use App\Form\Type\CharacterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateCharacterController extends AbstractController
{
    #[Route('/character/create', name: 'character_create', methods: 'POST')]
    public function index(Request $request): JsonResponse
    {
        $character = new Character();
        $form = $this->createForm(CharacterType::class, $character);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        if (!($form->isSubmitted() && $form->isValid())) {
            return $this->json([
                'errors' => $this->getFormErrors($form),
            ],
                Response::HTTP_BAD_REQUEST);
        }
        /** @var Character $character */
        $character = $form->getData();
        return new JsonResponse($character);
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
