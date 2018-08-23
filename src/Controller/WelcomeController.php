<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/welcome", name="welcome")
     */
    public function index()
    {
        return $this->render('welcome/index.html.twig');
    }

    /**
     * @Route("/hello/{name}", name="hello_page", requirements={"name"="[A-Za-z]+"})
     * @param Request $request
     * @param string $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function hello(Request $request, string $name = 'Alien')
    {
        return $this->render('welcome/hello_page.html.twig', [
            'controller_name' => 'WelcomeController',
            'person_name' => $name,
            'some_variable_name' => $request->query->get('someVar')
        ]);
    }
}
