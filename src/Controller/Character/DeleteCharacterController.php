<?php declare(strict_types=1);

namespace App\Controller\Character;

use App\Entity\Character;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DeleteCharacterController extends AbstractController
{
    #[Route('/character/{id}', name: 'character_delete', methods: 'DELETE')]
    public function index(Character $character, Request $request, EntityManagerInterface $em): JsonResponse
    {
        /** @var User $user */
        $user = $this->getUser();

        if($character->getUser()->getId() !== $user->getId()){
            return $this->json([
                'errors' => 'invalid user'
            ]);
        }

        $em->remove($character);
        $em->flush();

        return $this->json('delete success');
    }
}