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
        $candidate = '';
        
        if($this->getUser()){
            $candidate = $this->getUser()->getCandidate();
        }

        return $this->render('dashboard/dashboard.html.twig', [
            'candidate' => $candidate,

        ]);
    }
}
