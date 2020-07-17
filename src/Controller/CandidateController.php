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


    /**
     * @Route("/candidate/formCandidate", name="candidate", methods={"GET", "POST"})
     */
    public function add(Request $request): Response
    {
        $candidate = new Candidate();
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($candidate);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('candidate/formCandidate.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
        ]);
    }


}
