<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewTestController extends Controller
{
    /**
     * @Route("/new/test", name="new_test")
     */
    public function index()
    {
        return $this->render('new_test/index.html.twig', [
            'controller_name' => 'NewTestController',
        ]);
    }
}
