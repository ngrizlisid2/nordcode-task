<?php

namespace App\Controller;

use App\Entity\Task;
use App\UserLogin\UserLoginChecker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends AbstractController
{
    /**
     * @var Request $request
     */
    private $request;
    /**
     * @var int $taskPageLimit
     */
    protected $taskPageLimit = 5;

    public function tasksListPage(Request $request)
    {
        $this->request = $request;
        if (!$this->checkLoggedInUser()) {
            return $this->redirectToRoute('login_page');
        }
        return $this->render('task/tasks_list.html.twig', [
            'tasks' => $this->getUserTasksForPage(),
            'page' => $this->getRequestPage(),
        ]);
    }

    public function newTaskPage(Request $request)
    {
        $this->request = $request;
        if (!$this->checkLoggedInUser()) {
            return $this->redirectToRoute('login_page');
        }

        return $this->render('task/task_form.html.twig');
    }

    public function createNewTask(Request $request)
    {
        $this->request = $request;
        if (!$this->checkLoggedInUser()) {
            return $this->redirectToRoute('login_page');
        }
        $entityManager = $this->getDoctrine()->getManager();

        //create task
        $task = new Task();
        $task->setTitle($this->request->request->get('title'));
        $task->setComment($this->request->request->get('comment'));
        $task->setDate(new \DateTime($this->request->request->get('date')));
        $task->setTimeSpent($this->request->request->get('time_spent'));

        $taskLoginChecker = new UserLoginChecker($this->request->cookies, $this->getDoctrine());
        $task->setUser($taskLoginChecker->getLoggedInUserId()->getUser());
        $entityManager->persist($task);
        $entityManager->flush();
        //create task
        return $this->redirectToRoute('user_tasks_page');
    }

    /**
     * @return object[]
     * return array of user tasks
     */
    public function getUserTasksForPage()
    {
        $taskLoginChecker = new UserLoginChecker($this->request->cookies, $this->getDoctrine());
        return $this->getDoctrine()
            ->getRepository(Task::class)
            ->findBy(['user' => $taskLoginChecker->getLoggedInUserId()->getUser()], ['id' => 'DESC'], $this->getTaskPageLimit(), $this->getTaskOffset());
    }

    private function checkLoggedInUser()
    {
        $cookies = $this->request->cookies;
        $taskLoginChecker = new UserLoginChecker($cookies, $this->getDoctrine());
        return $taskLoginChecker->checkLoggedInUser();
    }

    public function getTaskPageLimit(): int
    {
        return $this->taskPageLimit;
    }

    protected function getRequestPage(): int
    {
        $page = $this->request->query->get('page');
        if ($page === null) {
            $page = 1;
        }
        return $page;
    }

    public function getTaskOffset(): int
    {
        return ($this->getTaskPageLimit() * $this->getRequestPage()) - $this->getTaskPageLimit();
    }

    public function generateCsvFile(Request $request)
    {
        $this->request = $request;

        if (!$this->checkLoggedInUser()) {
            return $this->redirectToRoute('login_page');
        }

        $taskLoginChecker = new UserLoginChecker($this->request->cookies, $this->getDoctrine());
        $tasks = $tasks = $this->getDoctrine()
            ->getRepository(Task::class)
            ->getUserTaskBetweenDates( $this->request->query->get('date_from'), $this->request->query->get('date_to'), $taskLoginChecker->getLoggedInUserId()->getUser());

        $rows = [];
        $totalTimeSpent = 0;
        /**
         * @var $task Task
         */
        foreach ($tasks as $task) {
            $data = [$task->getId(), $task->getTitle(), $task->getComment(), $task->getDate()->format('Y-m-d'), $task->getTimeSpent()];
            $rows[] = implode(',', $data);
            $totalTimeSpent += $task->getTimeSpent();
        }
        $rows[] = implode(',', ['total time spent', $totalTimeSpent]);
        $content = implode("\n", $rows);

        $response = new Response($content);
        $response->headers->set('Content-Type', 'text/csv');

        return $response;
    }
}