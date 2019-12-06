<?php
// src/Controller/TodoListController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TodoListController extends AbstractController
{
    /**
     * @Route("/todolist")
     */
    public function number()
    {

        return $this->render('home/home.html.twig');
    }
}