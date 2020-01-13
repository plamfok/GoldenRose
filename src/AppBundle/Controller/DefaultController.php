<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Booking;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="booking_index")
     */
    public function indexAction(Request $request)
    {
        $bookings=$this
        ->getDoctrine()
        ->getRepository(Booking::class)
        ->findAll();
        
        
        return $this->render('default/index.html.twig',
            ['bookings'=>$bookings]);
    }
}
