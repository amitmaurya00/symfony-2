<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * Macthes /blog exactly
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
    /**
     * Matches /blog/detail/*
     * 
     * @Route("/blog/detail/{slug}", name="blog_detail")
     */
    public function detail($slug){
        return $this->render('blog/detail.html.twig', [
            'slug'=>$slug
        ]);
    }
}
