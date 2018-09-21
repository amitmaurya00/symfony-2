<?php

namespace App\Controller;

use App\Entity\Signup;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserauthController extends AbstractController
{
    /**
     * @Route("/userauth", name="userauth")
     */
    public function index()
    {
        return $this->render('userauth/index.html.twig', [
            'controller_name' => 'UserauthController',
        ]);
    }


    /**
     * @Route("/login", name="user_login")
     */
    public function login(){
        return $this->render('userauth/login.html.twig',[
            'page_name'=>"Login Page"
        ]);
    }

    /**
     * @Route("/signup", name="user_singup")
     */

    public function signup( Request $request ){
        if($request->isMethod("POST")){
            $signup = new Signup();
            $signup->setName($request->request->get("name"));
            $signup->setEmail($request->request->get("email"));
            $signup->setPassword($request->request->get("password"));

            $nameError = $validtor->validateProperty($signup, 'name');
            print_r(  $nameError);
        }
       
        return $this->render("userauth/signup.html.twig",[
        'page_name'=>"Signup Page"
        ]);
    }
    /**
     * @Route("/reset-password",name="user_reset_password")
     */
    public function resetPassword(){
        return $this->render("userauth/reset-password.html.twig",[
            'page_name'=>'Forget Password'
        ]);
    }
}
