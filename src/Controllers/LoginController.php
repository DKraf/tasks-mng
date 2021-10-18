<?php


namespace App\Controllers;

use App\Models\User;
use App\Views\Login;


/**
 * Class UserController
 * @package App\Controllers
 */
class LoginController extends BaseController
{

    /**
     * @var User $model
     */

    private User $model;
    private Login $view;

    public function __construct()
    {
        parent::__construct();
        $this->model = new User();
        $this->view = new Login();

    }


    /**
     * Авторизация
     */
    public function auth()
    {
        $data = [];
        if (!$_POST) {
            $_SESSION['error'] = 'Что-то пошло не так! Попробуйте снова!';
        } else {
            $data= [
                'email' => trim($_POST['email']),
                'password' => md5(trim($_POST['password']))
            ];
            $user = $this->model->auth($data);
            if ($user) {
                $_SESSION['auth'] = $user;
            } else {
                $_SESSION['error'] = 'Пользователь не найден!';
            }
        }
        header('Location: /');
    }


    /**
     * Выход с учетки
     */
    public function logout()
    {
        unset($_SESSION['auth']);
        header('Location: /');
    }


    /**
     * Вьюшка авторизации
     */
    public function loginView()
    {
        $this->view->render();
    }

}