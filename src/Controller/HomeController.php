<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\JobOfferRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(JobOfferRepository $jobOfferRepository)

    {   
        $JobOffers = $jobOfferRepository->getLastJobOffers();
        $userCandidatId = '';
      
      if ($this->getUser()) {
            $userCandidatId = $this->getUser()->getIdCandidate();
        }

        return $this->render('home/index.html.twig', [
            'userCandidatId' => $userCandidatId,
            "jobOffers" => $JobOffers
        ]);
    }

    /**
     * @Route("/candidate/job_offers", name="show_job_offers")
     */
    public function showJobOffers(JobOfferRepository $jobOfferRepository)

    {   
        $JobOffers = $jobOfferRepository->findAll();
        $userCandidatId = '';
      
      if ($this->getUser()) {
            $userCandidatId = $this->getUser()->getIdCandidate();
        }

        return $this->render('home/showJobOffers.html.twig', [
            'userCandidatId' => $userCandidatId,
            "jobOffers" => $JobOffers
        ]);
    }
}
