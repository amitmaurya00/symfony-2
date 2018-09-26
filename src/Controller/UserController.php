<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class UserController extends AbstractController
{
    var $session;
    var $userSession;
    function __construct(SessionInterface $sess)
    {
        $this->session = $sess;
        $this->userSession = $this->session->get('user');
    }

    /**
     * @Route("/user", name="user")
     */
    public function index()
    {

        $detail = $this->getDoctrine()
            ->getRepository(User::class)->find($this->userSession['id']);

        return $this->render('user/profile.html.twig', [
            'controller_name' => 'UserController',
            'detail' => $detail
        ]);
    }

    /**
     * @Route("/user/update", name="user_profile_update")
     */
    public function update(){
        $error = array();
        return $this->render("user/profile-update.html.twig", [
            'page_name' => "Update Profile",
            'error' => $error
        ]);
    }

    /**
     * @Route("/user/blogs", name="user_blogs")
     */
    public function myBlogs(){
        $blogs = $this->getDoctrine()
            ->getRepository(Blog::class)->findBy(array("user_id"=>$this->userSession['id']));
        return $this->render('user/blogs.html.twig',[
            'page_name'=>"My Blogs",
            'blogs'=>$blogs
        ]);
    }

    /**
     *@Route("/user/blogs/add", name="user_blog_add")
     */
    public function addBlog(){
        return $this->render("user/blogs-add.html.twig", [
            'page_name'=>"Add Blog"
        ]);
    }

    /**
     * @Route("/user/change-password", name="user_change_password")
     */
    public function changePassword(){
        return $this->render('user/change-password.html.twig', [
            'page_name'=>"Change Password"
        ]);
    }
}
