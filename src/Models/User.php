<?php

namespace App\Models;

/**
 * Class User
 * @package App\Models
 */
class User extends Base
{

    /**
     * получаем всех юзеров
     * @return array
     */
    public function getUsers() : array
    {
        $db = $this->db->get();
        $stmt = $db->prepare("SELECT * FROM users");
        $stmt->execute();
        $a = $stmt->fetchAll();
        var_dump($a);   die;
    }
}