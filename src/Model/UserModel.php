<?php
namespace App\Model;

use App\Entity\User;
//use App\Entity\Database\SignupDatabase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;
class UserModel  extends AbstractController{

    public function getUserDetailByEmail($email){
        $detail = $this->getDoctrine()->getRepository(User::class)->find(array("id"=>1));
        return  $detail;
    }
}