<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Booking;
use AppBundle\Form\BookingType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AdministrationController extends Controller
{
  
        /**
     * @Route("/admin",name="booking_booking")
     * @param $checkin
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewBooking() {
       $booking = $this
        ->getDoctrine()
        ->getRepository(Booking::class)
        ->findAll();

        return $this->render('booking/admin.html.twig',
            ['bookings'=>$booking]);
    }
    
    
    
}

