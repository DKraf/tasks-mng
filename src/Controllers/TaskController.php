<?php


namespace App\Controllers;

use App\Models\Base;
use App\Models\Task as ModelTask;
use App\Views\Task;
use App\Views\TaskCreate;


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
     * show index
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
        } else {
            $sort_table = 'id'. ' ' .'asc';
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
        if ($page > $page_count) {
            Errors::show_error_page();
            die;
        }
        $data = [
            'count' => $count[0]['count'],
            'page'  => $page_count,
            'tasks' => $this->model->getTasks($limit, $offset, $sort_table)
        ];

        $this->view->render($data);
    }

    public function add()
    {
        echo "add";die;
    }


    public function edit()
    {
        echo "edit";die;
    }

    /**
     * Вызов вьюхи создания заявки
     */
    public function create()
    {
        $task_view = new TaskCreate();
        $task_view->render();
    }

    public function show_home()
    {
        $data['token'] = Authenticate::csrf();
        $data['page'] = $this->pageCount;
        $data['tasks'] = $model->get_tasks($limit, $offset, $sort_table);
        $view = new \App\View\Home();
        $view->render($data);
    }
}