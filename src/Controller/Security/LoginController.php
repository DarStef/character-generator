<?php declare(strict_types=1);

namespace App\Controller\Security;

use App\Entity\Session;
use App\Entity\User;
use App\Repository\SessionRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{

    public function __construct(
        private SessionRepository $sessionRepository,
    )
    {

    }

    #[Route('/security/login', name: 'login', methods: 'POST')]
    public function login(): JsonResponse
    {
        /** @var User|null $user */
        $user = $this->getUser();
        if (null === $user) {
            return $this->json([
                'errors' => [
                    'error' => 'missing credentials',
                ],
            ],
                Response::HTTP_UNAUTHORIZED
            );
        }
        $token = $this->addSession($user);
        return $this->json([
            'user' => $user->getUserIdentifier(),
            'token' => $token,
        ]);
    }

    private function addSession(User $user): string
    {
        $session = new Session();
        $session->setToken($this->generateToken());
        $session->setTokenValidTo(new DateTimeImmutable('+30 days'));
        $session->setUser($user);
        $this->sessionRepository->add($session);
        return $session->getToken();
    }

    private function generateToken(): string
    {
        return bin2hex(openssl_random_pseudo_bytes(25));
    }


}