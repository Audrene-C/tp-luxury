<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/admin/contact", name="contact")
     */
    public function index()
    {
        if ($this->getUser()) {
            return $this->render('contact_log/contact-log.html.twig');
        }


        return $this->render('contact/index.html.twig');
    }
}
