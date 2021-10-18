<?php


namespace App\Traits;

class Validation {

    /**
     * Валидация полученных данных
     * @param array $data
     * @return array
     */
    public function validate(array $data): array
    {
        $min_name = 2;
        $max_name = 40;
        $min_task = 10;
        $max_task = 255;
        if (is_array($data)) {
            if ($data['name'] == '' || $data['email'] == '' || $data['task'] == '') {
                $_SESSION['valid'] = 'Все поля обязательные для заполнения!';
                @header("Location: ". $_SERVER["REQUEST_URI"]);
            }else if(mb_strlen($data['name']) < $min_name || mb_strlen($data['name'] > $max_name)) {
                $_SESSION['valid'] = 'Имя должно состоять минимум из 2, максимум из 40 букв!';
                @header("Location: ". $_SERVER["REQUEST_URI"]);
            }else if(mb_strlen($data['task']) < $min_task || mb_strlen($data['task']) > $max_task) {
                $_SESSION['valid'] = 'Задача должна состоять минимум из 10 максисмум из 255 букв!';
                @header("Location: ". $_SERVER["REQUEST_URI"]);
            } else {
                return ($data);
            }
        }else {
            $_SESSION['valid'] = 'Ошибка заполнения формы!';
            @header("Location: ". $_SERVER["REQUEST_URI"]);
        }
    }
}