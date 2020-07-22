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
        $candidate = '';
        
        if($this->getUser()){
            $candidate = $this->getUser()->getCandidate();
        }
        return $this->render('about_us/index.html.twig',[
            'candidate' => $candidate,
            ]);
    }
}
