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

    public function __construct()
   {
     //
   }

}