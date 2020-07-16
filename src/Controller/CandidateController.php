<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\CandidateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidateController extends AbstractController
{
    // /**
    //  * @Route("/candidate", name="candidate")
    //  */
    // public function index()
    // {
    //     return $this->render('candidate/index.html.twig', [
    //         'controller_name' => 'CandidateController',
    //     ]);
    // }

    /**
     * @Route("/candidate/{id}", name="candidate", methods={"GET", "POST"})
     */
    public function account(Request $request): Response
    {
        $candidate = new Candidate();
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);
    }
}
