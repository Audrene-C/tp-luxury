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
        $candidate = '';
      
      if ($this->getUser()) {
            $candidate = $this->getUser()->getCandidate();
            //dd($candidate);
        }

        return $this->render('home/index.html.twig', [
            'candidate' => $candidate,
            'jobOffers' => $JobOffers
        ]);
    }
}
