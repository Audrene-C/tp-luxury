<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class JobsOffersController extends AbstractController
{
    /**
     * @Route("/profile/jobs_offers", name="jobs_offers")
     */
    public function index()
    {
        return $this->render('jobs_offers/index.html.twig');
    }
}
