<?php declare(strict_types=1);

namespace App\Security;

use App\Repository\SessionRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;

class ApiKeyAuthenticator extends AbstractAuthenticator
{
    private const HEADER = 'X-AUTH-TOKEN';

    public function __construct(
        private SessionRepository $sessionRepository
    ) {

    }

    public function supports(Request $request): ?bool
    {
        return $request->headers->has(self::HEADER);
    }

    public function authenticate(Request $request): Passport
    {
        $token = $request->headers->get(self::HEADER);
        if (null === $token) {
            throw new CustomUserMessageAuthenticationException('No Api token provided');
        }
        $session = $this->sessionRepository->findOneBy(['token' => $token]);
        if(null === $session){
            throw new CustomUserMessageAuthenticationException('Invalid token');
        }
        $user = $session->getUser();
        return new SelfValidatingPassport(new UserBadge($user->getUserIdentifier()));
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        return new JsonResponse([
            'errors' => [
                'error' => strtr($exception->getMessage(), $exception->getMessageData()),
            ],
        ],
            Response::HTTP_UNAUTHORIZED,
        );
    }
}