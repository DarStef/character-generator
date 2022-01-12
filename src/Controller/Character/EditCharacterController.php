<?php declare(strict_types=1);

namespace App\Controller\Character;

use App\Entity\Character;
use App\Entity\User;
use App\Form\Type\CharacterType;
use App\Form\Type\EditCharacterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class EditCharacterController extends AbstractController
{
    #[Route('/character/{id}', name: 'character_update', methods: 'PUT')]
    public function index(Character $character, Request $request, SerializerInterface $serializer, EntityManagerInterface $em): JsonResponse
    {
        /** @var User|null $user */
        $user = $this->getUser();

        $form = $this->createForm(EditCharacterType::class, $character);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        /** @var User|null $user */
        $user = $this->getUser();

        if (!($form->isSubmitted() && $form->isValid())) {
            return $this->json([
                'errors' => $this->getFormErrors($form),
            ],
                Response::HTTP_BAD_REQUEST);
        }
        /** @var Character $character */
        $character = $form->getData();

        $em->flush();

        return $this->json($serializer->serialize($character, 'json', ['ignored_attributes' => ['user', 'character']]));
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

    protected function json(mixed $data, int $status = 200, array $headers = [], array $context = []): JsonResponse
    {
        $response = new JsonResponse(json_decode($data), $status, $headers);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        return $response;
    }
}