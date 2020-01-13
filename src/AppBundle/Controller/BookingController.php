<?php   

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Booking;
use AppBundle\Form\BookingType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class BookingController extends Controller {

    
    /**
     *@Route("/create",name="booking_create")
     *@Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *@param Request $request
     *@return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request) {

        $booking= new Booking();
        
        
        $form = $this->createForm(BookingType::class,$booking);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $currentUser = $this->getUser();
            $booking->setAuthor($currentUser);
            $em = $this->getDoctrine()->getManager();
            $em->persist($booking);
            $em->flush();
            return $this->redirectToRoute("booking_index");
            
            
        }
        
        
      
        return $this->render("booking/create.html.twig",
            ['form'=>$form->createView()]);
    }    
     /**
     *@Route("/booking/delete{id}",name="booking_delete")
     *@param Request $request
     *@param $id
     *@Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *@return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request,$id) {
        
        $booking = $this
        ->getDoctrine()
        ->getRepository(Booking::class)
        ->find($id);
        
        if ($booking === null) {
            return $this->redirectToRoute("booking_index");
        }
        
        /** @var User $currentUser */
        $currentUser = $this->getUser();

        $form = $this->createForm(BookingType::class,$booking);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $currentUser = $this->getUser();
            $booking->setAuthor($currentUser);
            $em = $this->getDoctrine()->getManager();
            $em->remove($booking);
            $em->flush();
            return $this->redirectToRoute("booking_index");
            
            
        }
        
        
        
        return $this->render("booking/delete.html.twig",
            ['form'=>$form->createView(),
                'booking' => $booking]);
    }
    
}