<?php
// src/Controller/TodoListController.php
namespace App\Controller;


use App\Entity\ListTodo;
use App\Form\TodoType;
use App\Repository\ListTodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TodoListController extends AbstractController
{
    /**
     * @var ListTodoRepository
     */
    private $repository;

    public function __construct(ListTodoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/", name="home", methods="GET|POST")
     */

    public function new(Request $request): Response
    {
        $task = new ListTodo();
        $users = $this->getUser();
        if (TRUE === $this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $task->setIdUser($users->getId());
        }
        $form = $this->createForm(TodoType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
        }
        $todo = $this->repository->findAll();

        return $this->render('home/home.html.twig', [
            'form' => $form->createView(), 'list' => $todo
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods="DELETE")
     */
    public function delete(ListTodo $tasks, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $tasks->getId(), $request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tasks);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->redirectToRoute('home');
    }
}