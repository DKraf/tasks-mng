<?php

namespace App\Traits;

trait Authenticate
{
    /**
     * @var  $auth
     */
    private $auth;

    /**
     * проверяем авторизованного юзера
     */
    protected function authorize()
    {
        $this->auth = $_SESSION['user'];
        if(!$this->auth) {
            header('Location: /login.php');
        }
    }

}