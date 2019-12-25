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
        $test = 13;
        if($test ==12) {

            $todo = $this->repository->findAll();
            return $this->render('home/home.html.twig', [
                'list' => $todo]);
        }
        else {
            return $this->render('home/homeNonConnecte.html.twig');
        }
    }
}