<?php

namespace App\Controller;

use App\Entity\JobOffer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\JobOfferRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(JobOfferRepository $jobOfferRepository)

        
        $JobOffers = $jobOfferRepository->getLastJobOffers();
        $userCandidatId = '';
      
      if($this->getUser()){
            $userCandidatId = $this->getUser()->getIdCandidate();
        }

        return $this->render('home/index.html.twig', [
            'userCandidatId' => $userCandidatId,
            "jobOffers" => $JobOffers

}
