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
        return $this->render('home/index.html.twig', [
        'user' => $this->getUser()
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        //dd($this->getUser());
        return $this->render('home/admin.html.twig');
    }
}
