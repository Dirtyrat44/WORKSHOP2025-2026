<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Security $security): Response
    {
        if ($security->getUser()) {
            return $this->render('home/home.html.twig', [
                'controller_name' => 'HomeController',
            ]);
        }
        return $this->redirectToRoute('app_login');
    }
}