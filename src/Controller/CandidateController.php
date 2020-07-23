<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\CandidateType;
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

        $candidate = '';
        
        if($this->getUser()){
            $candidate = $this->getUser()->getCandidate();
        }

        return $this->render('candidate/index.html.twig', [
            'candidate' => $candidate,
            'candidates' => $candidates,
        ]);
    }

    /**
     * @Route("/new", name="candidate_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $candidate = new Candidate();
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($candidate);
            $entityManager->flush();

            return $this->redirectToRoute('candidate_index');
        }

        $candidate = '';
        
        if($this->getUser()){
            $candidate = $this->getUser()->getCandidate();
        }

        return $this->render('candidate/new.html.twig', [
            'candidate' => $candidate,
            'candidate' => $candidate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="candidate_show", methods={"GET"})
     */
    public function show(Candidate $candidate): Response
    {
        $candidate = '';
        
        if($this->getUser()){
            $candidate = $this->getUser()->getCandidate();
        }

        return $this->render('candidate/show.html.twig', [
            'candidate' => $candidate,
            'candidate' => $candidate,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="candidate_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Candidate $candidate): Response
    {
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        $idCandidate = $candidate->getId();
        $pourcentage = 0;
        $progress = 0;
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $updatedAt = new \DateTime('now', new \DateTimeZone('Europe/Paris'));     
            $candidate->setUpdatedAt($updatedAt);
            
            $getCandidat = $request->request->get("candidate");
            foreach($getCandidat as $candidatInfo) {
                if(!null == $candidatInfo){
                    $progress += 1;
                }
            }
            
            $getCandidatFiles = $request->files->get('candidate');
            foreach($getCandidatFiles as $candidatFile) {
                if(!null == $candidatFile['file']){
                    $progress += 1;
                }
            }
            
            $pourcentage = round(($progress/15)*100);
            $candidate->setPourcentage($pourcentage);

            if($pourcentage >= 100) {
                $candidate->setIsComplete(true);
            }
            
            $entityManager->persist($candidate);
            $entityManager->flush();
            //dd($candidate);

            return $this->redirectToRoute( 'candidate_edit', [
                'id' => $idCandidate,
                'candidate' => $candidate,
                ] );
        }
        
        return $this->render('candidate/edit.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
            'pourcentage' => $pourcentage
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

        $candidate = '';
        
        if($this->getUser()){
            $candidate = $this->getUser()->getCandidate();
        }

        return $this->redirectToRoute('candidate_index', [
            'candidate' => $candidate,
        ]);
    }

}
