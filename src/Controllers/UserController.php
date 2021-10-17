<?php


namespace App\Controllers;

use App\Models\Base;
use App\Models\User;
use App\Views\Login;


/**
 * Class UserController
 * @package App\Controllers
 */
class UserController extends BaseController
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
    public function get()
    {
        $user_model = new User();

        $users = $user_model->getUsers();
        var_dump($users);die;

        $view = new User();
        $view->render([
            'role_slug'=>$this->role['role_slug'],
            '_token'=>$this->_token,
            'cities'=>(new City())->getCities(),
            'roles'=>$roles,
            'users' => $this->model->getUsers()
        ]);
    }

    /**
     * show index
     */
    public function index()
    {
        $this->view->render([
        ]);
    }
}