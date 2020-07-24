<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Form\CandidateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/candidate")
 */
class CandidateController extends AbstractController
{
    /**
     * @Route("/", name="candidate", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
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
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="candidate_show", methods={"GET"})
     * @IsGranted("ROLE_ADMIN")
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

    public function getProfilePourcentage(Candidate $candidate) 
    {
        $progress = 0;

        if(!null == $candidate->getGender()) {
            $progress += 1;
        }
        if(!null == $candidate->getFirstName()) {
            $progress += 1;
        }
        if(!null == $candidate->getLastName()) {
            $progress += 1;
        }
        if(!null == $candidate->getAdress()) {
            $progress += 1;
        }
        if(!null == $candidate->getCountry()) {
            $progress += 1;
        }
        if(!null == $candidate->getNationality()) {
            $progress += 1;
        }
        if(!null == $candidate->getPassport()) {
            $progress += 1;
        }
        if(!null == $candidate->getCv()) {
            $progress += 1;
        }
        if(!null == $candidate->getProfilPicture()) {
            $progress += 1;
        }
        if(!null == $candidate->getCurrentLocation()) {
            $progress += 1;
        }
        if(!null == $candidate->getDateOfBirth()) {
            $progress += 1;
        }
        if(!null == $candidate->getPlaceOfBirth()) {
            $progress += 1;
        }
        if(!null == $candidate->getEmail()) {
            $progress += 1;
        }
        if(!null == $candidate->getAvailability()) {
            $progress += 1;
        }
        if(!null == $candidate->getExperience()) {
            $progress += 1;
        }
        if(!null == $candidate->getDescription()) {
            $progress += 1;
        }
        if(!null == $candidate->getJobCategory()) {
            $progress += 1;
        }

        $pourcentage = round(($progress/17)*100);
        $candidate->setPourcentage($pourcentage);
        return $pourcentage;
    }

    /**
     * @Route("/edit/{id}", name="candidate_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_USER")
     */
    public function edit(Request $request, Candidate $candidate): Response
    {
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        $idCandidate = $candidate->getId();
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $updatedAt = new \DateTime('now', new \DateTimeZone('Europe/Paris'));     
            $candidate->setUpdatedAt($updatedAt);
            
            $pourcentage = $this->getProfilePourcentage($candidate);
            if(round($pourcentage) >= 100) {
                $candidate->setIsComplete(true);
            }

            $entityManager->persist($candidate);
            $entityManager->flush();
    
            return $this->redirectToRoute( 'candidate_edit', [
                'id' => $idCandidate,
                'candidate' => $candidate,
                'pourcentage' => $pourcentage
                ]);
        }

        $pourcentage = $this->getProfilePourcentage($candidate);
        
        return $this->render('candidate/edit.html.twig', [
            'candidate' => $candidate,
            'form' => $form->createView(),
            'pourcentage' => $pourcentage
        ]);
    }

    /**
     * @Route("/delete/{id}", name="candidate_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN")
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
