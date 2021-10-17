<?php

namespace App\Views;


/**
 * Class Base
 * @package App\Views
 */

abstract class Base
{

    /**
     * рендерим
     * @param array $data
     */
    public function render(array $data = []) {
        ?>
        <!doctype html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <title>Task Manager</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="/task-manager/assets/js/jquery.js"></script>
            <script src="/task-manager/assets/js/custom.js"></script>
        </head>
        <body>
                  <!-- Page content wrapper-->
                <div id="page-content-wrapper">
                    <!-- Top navigation-->
                    <?php $this->container($data); ?>
                </div>
        </body>
        </html>
        <?php
    }


    /**
     * должен быть объявлен в каждом унаследовавшем классе
     */
    abstract public function container($data = []);

}