<?php

namespace App\Controller;

use App\Repository\ApplicationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\JobOfferRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(JobOfferRepository $jobOfferRepository, ApplicationRepository $applicationRepository)

    {   
        $JobOffers = $jobOfferRepository->getLastJobOffers();
        $candidate = '';
        $applications = [];
        $myApplications = [];
        
        if ($this->getUser()) {
            $candidate = $this->getUser()->getCandidate();
            //$applications[$applicationRepository->findBy(['candidate' => $candidate->getId()])] = true;
            $applications = $applicationRepository->findBy(['candidate' => $candidate->getId()]);

            foreach($applications as $application) {
                $myApplications[$application->getJobOffer()->getId()] = true;
            }
        }

        return $this->render('home/index.html.twig', [
            'candidate' => $candidate,
            'jobOffers' => $JobOffers,
            'applications' => $myApplications
        ]);
    }

    /**
     * @Route("/candidate/job_offers", name="show_job_offers")
     * @IsGranted("ROLE_ADMIN")
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
