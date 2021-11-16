<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController
{
    #[Route('/my/first_page')]
    public function index(): Response
    {
        return new Response('test');
    }
}