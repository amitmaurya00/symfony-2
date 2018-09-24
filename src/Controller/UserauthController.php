<?php

namespace App\Controller;

//use App\Model\UserModel;
use App\Entity\User;
//use App\Entity\Database\SignupDatabase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\Validator\Validator\ValidatorInterface;
//use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class UserauthController extends AbstractController
{   
  /*   var $user;
    function __construct(){
        $this->user = new UserModel();
    }
   */
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
    public function login(Request $request, ValidatorInterface $validator ){
       /*  $entityManager = $this->getDoctrine()->getManager();
        print_r($entityManager->getRepository('App\Entity\User')); */
        $error = array();
        $flag = true;
        if($request->isMethod("POST")){
            $user = new User();
            $email = $request->request->get("email");
            $password = $request->request->get("password");

            $user->setEmail($email);
            $user->setPassword($password);

            $emailError = $validator->validateProperty($user, 'email');
            $error['email']['value'] = $email;
            if(count($emailError) > 0){
                $error['emailError']['message'] = $emailError[0]->getMessage();
                $error['emailError']['key'] = 'email';
                $flag = false;
            }
            $passwordError = $validator->validateProperty($user, 'password');
            $error['password']['value'] = $password;
            if(count($passwordError) > 0){
                $error['passwordError']['message'] = $passwordError[0]->getMessage();
                $error['passwordError']['key'] = 'password';
                $flag = false;
            }
            if($flag){
                $detail = $this->getDoctrine()
                ->getRepository(User::class)->findOneBy(array("email"=>$email));
                if($detail){

                    if($detail->getPassword() == $password){
                        echo "Login Successfully.";
                        die;
                    }else{
                        echo "Invalid Credentials.";
                        die;
                    }
                }else{
                    echo "Invalid Credentials.";
                    die;
                }
            }
        }
        return $this->render('userauth/login.html.twig',[
            'page_name'=>"Login Page",
            'error'=>$error
        ]);
    }

    /**
     * @Route("/signup", name="user_singup")
     */

    public function signup( Request $request, ValidatorInterface $validator /* ,UserPasswordEncoderInterface $encoder */){
        $error = array();
        $flag = true;
        if($request->isMethod("POST")){
            $signup = new User();
            $name = $request->request->get("name");
            $email = $request->request->get("email");
            $password = $request->request->get("password");

            $signup->setName($name);
            $signup->setEmail($email);
            $signup->setPassword($password);

            $nameError = $validator->validateProperty($signup, 'name');
            $error['name']['value'] = $name;
            if(count($nameError) > 0){
                $error['nameError']['message'] = $nameError[0]->getMessage();
                $error['nameError']['key'] = 'name';
                $flag = false;
            }
            $emailError = $validator->validateProperty($signup, 'email');
            $error['email']['value'] = $email;
            if(count($emailError) > 0){
                $error['emailError']['message'] = $emailError[0]->getMessage();
                $error['emailError']['key'] = 'email';
                $flag = false;
            }
            $passwordError = $validator->validateProperty($signup, 'password');
            $error['password']['value'] = $password;
            if(count($passwordError) > 0){
                $error['passwordError']['message'] = $passwordError[0]->getMessage();
                $error['passwordError']['key'] = 'password';
                $flag = false;
            }
           
            if($flag){
                echo "sdf";
                $entityManager = $this->getDoctrine()->getManager();

               /*  $password = $encoder->encodePassword($signup, $password);
                $signup->setPassword($password); */
                // tell Doctrine you want to (eventually) save the User (no queries yet)
                $entityManager->persist($signup);
    
                // actually executes the queries (i.e. the INSERT query)
                $entityManager->flush();
    
                return new Response('Saved new signup with id '.$signup->getId());
             
            }
            /*   $errors = $validator->validate($signup);
            $errorsString = (string) $errors;

            print_r($errorsString); */
        }
       
        return $this->render("userauth/signup.html.twig",[
            'page_name'=>"User Page",
            'error'=>$error
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
