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
            <link rel="stylesheet" href="/assets/css/style.css">
        </head>
        <body>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <?php $this->container($data); ?>
            </div>
            <script src="/assets/js/jquery.js"></script>
            <script src="/assets/js/custom.js"></script>
        </body>
        </html>
        <?php
    }


    /**
     * Выводим HEADER
     */
    public function header()
    {
        ?>
        <header>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container d-flex justify-content-between">
                    <a href="/" class="navbar-brand d-flex align-items-center">
                        <strong>Task MNG</strong>
                    </a>
                    <?php if(isset($_SESSION['auth'])): ?>
                        <a id="logout" href="" class="navbar-brand d-flex align-items-center">
                            <strong><?php echo $_SESSION['auth']['name']; ?></strong>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-closed" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                                <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                            </svg>
                        </a>
                        <form id="logout-form" action="/logout" method="get">
                            <button type="submit"></button>
                        </form>
                    <?php else: ?>
                    <button type="button" class="btn btn-primary" onclick="location.href='/login'" type="button">Login</button>
                </div>
                <?php endif; ?>
            </div>
        </header>
        <?php
    }


    /**
     * Выводим "ПОДВАЛ"
     */
    public function footer()
    {
        ?>
        <footer class="text-muted">
            <div class="navbar-fixed-bottom row-fluid">
                <div class="navbar-inner">
                    <div class="container">
                        <p class="float-right">
                            <a href="https://github.com/DKraf/">#GitHub</a>
                        </p>
                        <p>Task MNG by DKRAF-DEV</p>
                    </div>
                </div>
            </div>
        </footer>
        <?php
    }


    /**
     * должен быть объявлен в каждом унаследовавшем классе
     * Контейнер с контеном ("Наполнением")
     */
    abstract public function container($data = []);

}