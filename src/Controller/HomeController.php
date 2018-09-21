<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class HomeController extends AbstractController
{
    var $session;
    function __construct(SessionInterface $sess)
    {
        $this->session = $sess;
    }
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
       /*  echo $this->session->get('name');
        return $this->redirectToRoute('blog', array('max' => 10));
        return $this->redirectToRoute('blog'); */
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
 
    /**
     * @Route("/about", name="about")
     */

     public function about(Request $request){
         // $this->session->set('name','Amit kumar maurya');
        // echo $this->session->get('name');
       // $this->session->clear();
         $query = $request->query->get('page', 1);
        //echo $query; 
        echo $request->getBaseUrl();
        return $this->render('home/about.html.twig',[
            'page_name'=>"About Page"
        ]);
     }
     
}
