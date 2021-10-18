<?php

namespace App\Controllers;

use App\Traits\Authenticate;
use App\Traits\Config;

/**
 * abstract Class BaseController
 * @package App\Controllers
 */
class BaseController
{
    use Authenticate,  Config;

    /**
     * @var $user_id
     */
    protected $user_id;
    /**
     * @var string $role
     */
   protected $role;

    /**
     * @throws \Exception
     */
    public function __construct()
   {
//       $role_slug = new Role();
//       $this->role = $role_slug->getSlugRole($_SESSION['role_id']);
//       $this->permission();
//       $this->_token = $this->csrfToken();
//       $this->user_id = $_SESSION['user_id'];
   }

}