<?php    
namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use AppBundle\Entity\Role;
use AppBundle\Entity\Booking;
use AppBundle\Form\BookingType;

class UserController extends Controller {

    /**
     * @Route("/register",name="user_register")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */  
public function registerAction(Request $request) {
    
    $user = new User();
    $form = $this->createForm(UserType::class,$user);
    $form->handleRequest($request);
    if ($form->isSubmitted()) {
        $password = $this->get('security.password_encoder')
        ->encodePassword($user,$user->getPassword());
        
        $role = $this
        ->getDoctrine()
        ->getRepository(Role::class)
        ->findOneBy(['name'=>'ROLE_USER']);
        $user->addRole($role);
        
        $user->setPassword($password);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        
        return $this->redirectToRoute("security_login");
             }
                 return $this->render('user/register.html.twig');
             }
    /**
     *@Route ("/room",name="user_room")
     *@return \Symfony\Component\HttpFoundation\Response
     */
    public function room(){
        return $this->render('user/room.html.twig');
    }


    /**
     *@Route ("/casino",name="user_casino")
     *@return \Symfony\Component\HttpFoundation\Response
     */
    public function casino(){
        return $this->render('user/casino.html.twig');
    }

     /**
     *@Route ("/resturant",name="user_resturant")
     *@return \Symfony\Component\HttpFoundation\Response
     */
    public function resturant(){
        return $this->render('user/resturant.html.twig');
    }

}