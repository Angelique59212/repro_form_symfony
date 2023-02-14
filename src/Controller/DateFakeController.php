<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DateFakeController extends AbstractController
{
    #[Route('/date/fake', name: 'app_date_fake')]
    public function index(): Response
    {
        return $this->render('date_fake/index.html.twig', [
            'controller_name' => 'DateFakeController',
        ]);
    }
}
