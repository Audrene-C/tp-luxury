<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index()
    {
        $candidate = '';
        
        if($this->getUser()){
            $candidate = $this->getUser()->getCandidate();
        }

        return $this->render('contact/index.html.twig', [
            'candidate' => $candidate,

        ]);
    }
}
