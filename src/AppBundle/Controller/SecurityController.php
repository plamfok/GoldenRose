<?php    
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\User;
use AppBundle\Repository\UserRepository;

class SecurityController extends Controller {

    /**
     * @Route("/login", name="security_login")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction() {
        return $this->render('security/login.html.twig');
        
  
    }
    /**
     * @Route ("/logout",name="security_logout")
     * @throws \Exception
     */
    public function logout() {
   throw new \Exception("logout falied");
    }   
}