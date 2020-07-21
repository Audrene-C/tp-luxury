<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/admin/dashboard", name="dashboard")
     */
    public function index()
    {
        return $this->render('dashboard/dashboard.html.twig', [
            'user' => $this->getUser(),

        ]);
    }
}
