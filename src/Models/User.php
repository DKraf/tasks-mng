<?php

namespace App\Models;

/**
 * Class User
 * @package App\Models
 */
class User extends Base
{

    /**
     * Запрос на получение пользователя
     * @param array $data
     * @return mixed
     */
    public function auth(array $data)
    {
        $db = $this->db->get();
        $stmt = $db->prepare("
            SELECT 
                name
            FROM
                users
            WHERE 
                email = :email 
            AND 
                password = :password
            ");
        $stmt->execute([
            ':email' => $data['email'],
            ':password' => $data['password']
        ]);
        return $stmt->fetch();
    }
}