<?php

namespace App\Models;

/**
 * Class Task
 * @package App\Models
 */
class Task extends Base
{

    /**
     * получаем всех задачи
     * @return array
     */
    public function getTasks() : array
    {
        $db = $this->db->get();
        $stmt = $db->prepare("SELECT * FROM task");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}