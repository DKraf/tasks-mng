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
    public function addTask(array $data): bool
    {
        $db = $this->db->get();
        $stmt = $db->prepare("
            INSERT INTO
                task (                
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
            ':email'  => $data['email'],
            ':text'   => $data['task'],
            ':active' => 1,
            ':name'   => $data['name']
        ]);
    }


    /**
     * Запрос на получение обновление задачи
     * @param array $data
     * @return mixed
     */
    public function update_task(array $data)
    {
        $id = $data['id'];
        $db = $this->db->get();
        $stmt = $db->prepare("
            UPDATE 
                task
            SET 
                text = :text,
                active = :active
            WHERE id = $id
            ");
        $result = $stmt->execute([
            ':text'=>$data['text'],
            ':active'=>$data['active']
        ]);
        return $result;
    }


    /**
     * Запрос на получение всех задач
     * @param $limit
     * @param int $offset
     * @param $sort
     * @return array
     */
    public function getTasks($limit, int $offset = 0, $sort) : array
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


    /**
     *  Запрос на получение нужной задачи
     * @param $id
     * @return mixed
     */
    public function getTaskByID($id)
    {
        $db = $this->db->get();
        $stmt = $db->prepare("
            SELECT *
                FROM
                    task
                WHERE
                    id = :id
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }


    /**
     * Запрос на получение колличество записей для пагинатора
     * @return array
     */
    public function getTasksCount(): array
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