<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {

        $userCandidatId = '';
        
        if($this->getUser()){
            $userCandidatId = $this->getUser()->getIdCandidate();
        }

        return $this->render('home/index.html.twig', [
            'userCandidatId' => $userCandidatId,
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        $userCandidatId = '';
        
        if($this->getUser()){
            $userCandidatId = $this->getUser()->getIdCandidate();
        }
        //dd($this->getUser());
        return $this->render('home/admin.html.twig', [
            'userCandidatId' => $userCandidatId,

        ]);
    }
}
