<?php

namespace App\Models;

/**
 * Class Task
 * @package App\Models
 */
class Task extends Base
{

    /**
     * Запрос на добавленение нового задания
     * @param array $data
     * @return bool
     */
    public function addTask(array $data)
    {
        $db = $this->db->get();
        $stmt = $db->prepare("
            INSERT INTO
                tasks (                
                    email,
                    text,
                    active,
                    name
                )
                VALUES (
                    :email,
                    :text,
                    :active,
                    :name
                )
            ");
        return $stmt->execute([
            ':email' => $data['email'],
            ':text' => $data['text'],
            ':active'=>$data['active'],
            ':name'=> $data['name']
        ]);
    }


    /**
     * Запрос на получение всех задач
     * @return array
     */
    public function getTasks($limit, $offset=0, $sort) : array
    {
        $db = $this->db->get();
        $stmt = $db->prepare("
            SELECT * 
            FROM 
                 task
            ORDER BY 
                 $sort 
            LIMIT 
                 $limit
            OFFSET 
                $offset
        ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTasksCount()
    {
        $db = $this->db->get();
        $stmt = $db->prepare("
            SELECT
                COUNT(*) as count
            FROM 
                task
        ");
        $stmt->execute();
        return $stmt->fetchAll();

    }
}