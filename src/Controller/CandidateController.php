<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\Candidate1Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/candidate")
 */
class CandidateController extends AbstractController
{
    /**
     * @Route("/", name="candidate", methods={"GET"})
     */
    public function index(): Response
    {
        $candidates = $this->getDoctrine()
            ->getRepository(Candidate::class)
            ->findAll();

        $userCandidatId = '';
        
        if($this->getUser()){
            $userCandidatId = $this->getUser()->getIdCandidate();
        }

        return $this->render('candidate/index.html.twig', [
            'userCandidatId' => $userCandidatId,
            'candidates' => $candidates,
        ]);
    }

    /**
     * @Route("/new", name="candidate_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $candidate = new Candidate();
        $form = $this->createForm(Candidate1Type::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($candidate);
            $entityManager->flush();

            return $this->redirectToRoute('candidate_index');
        }

        $userCandidatId = '';
        
        if($this->getUser()){
            $userCandidatId = $this->getUser()->getIdCandidate();
        }

        return $this->render('candidate/new.html.twig', [
            'candidate' => $candidate,
            'userCandidatId' => $userCandidatId,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="candidate_show", methods={"GET"})
     */
    public function show(Candidate $candidate): Response
    {
        $userCandidatId = '';
        
        if($this->getUser()){
            $userCandidatId = $this->getUser()->getIdCandidate();
        }

        return $this->render('candidate/show.html.twig', [
            'userCandidatId' => $userCandidatId,
            'candidate' => $candidate,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="candidate_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Candidate $candidate): Response
    {
        $form = $this->createForm(Candidate1Type::class, $candidate);
        $form->handleRequest($request);
        $idCandidate = $this->getUser()->getIdCandidate()->getId();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $updatedAt = new \DateTime('now', new \DateTimeZone('Europe/Paris'));            
            $candidate->setUpdatedAt($updatedAt);
            $entityManager->persist($candidate);
            $entityManager->flush();

            return $this->redirectToRoute( 'candidate_edit', ['id' => $idCandidate]);//"candidate_edit/". $idCandidate .".html.twig");
        }
        $userCandidatId = '';
        
        if($this->getUser()){
            $userCandidatId = $this->getUser()->getIdCandidate();
        }
        
        return $this->render('candidate/edit.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
            'userCandidatId' => $userCandidatId,
        ]);
    }
    /**
     * @Route("/delete/{id}", name="candidate_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Candidate $candidate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidate->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $deletedAt = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
            $candidate->setDeletedAt($deletedAt);
            $entityManager->remove($candidate);
            $entityManager->flush();
        }

        $userCandidatId = '';
        
        if($this->getUser()){
            $userCandidatId = $this->getUser()->getIdCandidate();
        }

        return $this->redirectToRoute('candidate_index', [
            'userCandidatId' => $userCandidatId,
        ]);
    }

}
