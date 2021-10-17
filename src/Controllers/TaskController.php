<?php


namespace App\Controllers;

use App\Models\Base;
use App\Models\Task as ModelTask;
use App\Views\Task;


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
        $this->model = new Base();
        $this->model = new ModelTask();

    }

    /**
     * show tasks
     */
    public function get()
    {
    //
    }

    /**
     * show index
     */
    public function index()
    {
        $this->view = new Task();

        $tasks = $this->model->getTasks();

        $view = new Task();
        $view->render([
            'tasks'=>$tasks,
        ]);
    }
}