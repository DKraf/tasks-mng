<?php

namespace App\Models;

use App\Services\DB;

class Base
{
    /**
     * @var  $db
     */
    protected $db;

    /**
     * Base constructor.
     */
    public function __construct()
    {
        $this->db = new DB();
    }
}