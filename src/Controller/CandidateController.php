<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CandidateController extends AbstractController
{
    /**
     * @Route("/candidate", name="formCandidate")
     */
    public function index()
    {
        return $this->render('candidate/index.html.twig');
    }
}
