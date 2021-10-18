<?php


namespace App\Controllers;

use App\Models\Base;
use App\Models\Task as ModelTask;
use App\Views\Task;
use App\Views\TaskCreate;
use App\Views\TaskEdit;
use App\Traits\Validation;

/**
 * Class UserController
 * @package App\Controllers
 */
class TaskController extends BaseController
{

    /**
     * @var Base $model
     */
    private Base $model;
    private Task $view;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelTask();
        $this->view = new Task();
    }


    /**
     * Список задач
     */
    public function index()
    {
        $limit = 3;
        $page_count = 0;

        $sort_list = [
            'name'   => 'name',
            'email'  => 'email',
            'active' => 'active',
        ];

        $sort = @$_GET['sort'];
        if (array_key_exists($sort, $sort_list)) {
            $sort_table = $sort_list[$sort];
            $_SESSION['sort'] = $sort_list[$sort];
        } else {
            if (isset($_GET['page']) && isset($_SESSION['sort'])) {
                $sort_table = $_SESSION['sort'];
            } else {
                unset($_SESSION['sort']);
                $sort_table = 'id' . ' ' . 'asc';
            }
        }

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if (empty($page)) {
            $page = 1;
        }
        $offset = ($page-1) * $limit;
        if ($offset < 0) {
            $offset = 0;
        }
        $count = $this->model->getTasksCount();
        $temp_count = $count[0]['count'] / $limit;
        $page_count = ceil($temp_count);

        $data = [
            'count' => $count[0]['count'],
            'page'  => $page_count,
            'tasks' => $this->model->getTasks($limit, $offset, $sort_table)
        ];

        $this->view->render($data);
    }


    /**
     * Добавление новой задачи
     */
    public function add()
    {
        if ($_POST) {
            $in_data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'task' => $_POST['task']
            ];
            $valid= new Validation();
            $data = $valid->validate($in_data);
            $result = $this->model->addTask($data);
            if ($result) {
                $_SESSION['success'] = 'Задача успешно создана!';
            } else {
                $_SESSION['error'] = 'Что-то пошло не так! Попробуйте снова!';
            }
            header('Location: /');
        }
    }


    /**
     * Редактирование задачи
     */
    public function edit()
    {
        if ($_SESSION['auth']['name'] !== 'admin') {
            exit(header('Location: /login'));
        } else {
            if ($_POST) {
                $data = [
                    'text'   => $_POST['text'],
                    'active' => $_POST['active'],
                    'id'     =>$_POST['id']
                ];
                $result = $this->model->update_task($data);
                if ($result === true){
                    $_SESSION['success'] = 'Запись успешно обновлена!';
                    header('Location: /');
                }else {
                    $_SESSION['error'] = 'Что-то пошло не так! Попробуйте снова!';
                    header('Location: /edit-task');
                }
            }else {
                $_SESSION['error'] = 'Ошибка в полученных данных!';
                header('Location: /edit-task');
            }
        }
    }


    /**
     * Вызов вьюхи создания заявки
     */
    public function create()
    {
        $task_view = new TaskCreate();
        $task_view->render();
    }


    /**
     * Вьюшка редактирования задачи
     * @param $id
     */
    public function showEditTask($id)
    {
        $data = [];
        if ($_SESSION['auth']['name'] !== 'admin') {
            exit(header('Location: /login'));
        } else {
            $data = $this->model->getTaskByID($id);
        }
        $view = new TaskEdit();
        $view->render($data);
    }
}