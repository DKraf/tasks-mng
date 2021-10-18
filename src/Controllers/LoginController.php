<?php


namespace App\Controllers;

use App\Models\Base;
use App\Models\User;
use App\Views\Login;


/**
 * Class UserController
 * @package App\Controllers
 */
class LoginController extends BaseController
{

    /**
     * @var Base $model
     */
    private Base $model;
    private Login $view;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Base();
        $this->view = new Login();

    }

    /**
     * show users
     */
    public function login()
    {
        var_dump("asdas");die;
        $user_model = new User();
        $users = $user_model->getUsers();
        var_dump($users);die;

    }

    /**
     * Авторизация
     */
    public function loginView()
    {
        $this->view->render();

    }

}