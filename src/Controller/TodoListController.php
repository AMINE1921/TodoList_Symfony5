<?php
// src/Controller/TodoListController.php
namespace App\Controller;


use App\Entity\ListTodo;
use App\Repository\ListTodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class TodoListController extends AbstractController
{

    private $repository;

    public function __construct(ListTodoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/", name="home")
     */

    public function index()
    {
        $todo = $this->repository->findAll();
        return $this->render('home/home.html.twig', [
            'list' => $todo]);
    }
}