<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    public function number(int $num = 0)
    {
        $number = random_int(0, $num);

        return $this->render('lucky/index.html.twig', array('number' => $number));
    }
}
