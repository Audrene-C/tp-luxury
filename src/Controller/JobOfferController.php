<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Form\JobOfferType;
use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/job_offer")
 */
class JobOfferController extends AbstractController
{
    /**
     * @Route("/", name="job_offer", methods={"GET"})
     */
    public function index(JobOfferRepository $jobOfferRepository): Response
    {
        $candidate = '';
        
        if($this->getUser()){
            $candidate = $this->getUser()->getCandidate();
        }

        return $this->render('job_offer/index.html.twig', [
            'candidate' => $candidate,
            'job_offers' => $jobOfferRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="job_offer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $jobOffer = new JobOffer();
        $form = $this->createForm(JobOfferType::class, $jobOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jobOffer);
            $entityManager->flush();

            return $this->redirectToRoute('job_offer');
        }

        $candidate = '';
        
        if($this->getUser()){
            $candidate = $this->getUser()->getCandidate();
        }

        return $this->render('job_offer/new.html.twig', [
            'job_offer' => $jobOffer,
            'candidate' => $candidate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="job_offer_show", methods={"GET"})
     */
    public function show(JobOffer $jobOffer): Response
    {
        $candidate = '';
        
        if($this->getUser()){
            $candidate = $this->getUser()->getCandidate();
        }

        return $this->render('job_offer/show.html.twig', [
            'job_offer' => $jobOffer,
            'candidate' => $candidate,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="job_offer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, JobOffer $jobOffer): Response
    {
        $form = $this->createForm(JobOfferType::class, $jobOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('job_offer');
        }

        $candidate = '';
        
        if($this->getUser()){
            $candidate = $this->getUser()->getCandidate();
        }

        return $this->render('job_offer/edit.html.twig', [
            'job_offer' => $jobOffer,
            'candidate' => $candidate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="job_offer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, JobOffer $jobOffer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jobOffer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($jobOffer);
            $entityManager->flush();
        }

        $candidate = '';
        
        if($this->getUser()){
            $candidate = $this->getUser()->getCandidate();
        }

        return $this->redirectToRoute('job_offer', [
            'candidate' => $candidate,

        ]);
    }
}
