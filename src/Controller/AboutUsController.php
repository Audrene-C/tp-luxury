<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AboutUsController extends AbstractController
{
    /**
     * @Route("/about_us", name="about_us")
     */
    public function index()
    {
        $userCandidatId = '';
        
        if($this->getUser()){
            $userCandidatId = $this->getUser()->getIdCandidate();
        }
        return $this->render('about_us/index.html.twig',[
            'userCandidatId' => $userCandidatId,
            ]);
    }
}
