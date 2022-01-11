<?php declare(strict_types=1);

namespace App\Controller\Character;

use App\Entity\User;
use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class ListCharacterController extends AbstractController
{
    private CharacterRepository $characterRepository;

    public function __construct(CharacterRepository $characterRepository)
    {

        $this->characterRepository = $characterRepository;
    }

    #[Route('/characters', name: 'characters', methods: 'GET')]
    public function index(Request $request, SerializerInterface $serializer): JsonResponse
    {
        /** @var User|null $user */
        $user = $this->getUser();

        $characters = $this->characterRepository->findBy(['user' => $user ]);

        return $this->json($serializer->serialize($characters, 'json', ['ignored_attributes' => ['user', 'character']]));
    }

    protected function json(mixed $data, int $status = 200, array $headers = [], array $context = []): JsonResponse
    {
        $response = new JsonResponse(json_decode($data) ,$status, $headers);
        $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
        return $response;
    }

    public function getCharacterRepository(): CharacterRepository
    {
        return $this->characterRepository;
    }

    public function setCharacterRepository(CharacterRepository $characterRepository): void
    {
        $this->characterRepository = $characterRepository;
    }
}