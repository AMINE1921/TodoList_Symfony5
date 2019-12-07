<?php
// src/Controller/TodoListController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TodoListController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {

        return $this->render('home/home.html.twig');
    }
}