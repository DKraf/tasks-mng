<?php


namespace App\Views;


class TaskCreate extends Base
{

    /**
     * @inheritDoc
     */
    public function container($data = [])
    {
        ?>
        <?php $this->header(); //print_r($data);die; ?>
        <?php if (isset($_SESSION['valid'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['valid']; ?></span>
            <?php unset($_SESSION['valid']); ?>
        </div>
        <?php endif; ?>
        <section class="bg-light block">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Добавление задачи</div>
                        <div class="card-body">
                            <form id="form-task" action="/task/add" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail"  class="form-label">Электронная почта</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="somethig@email.com">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword"  class="form-label">Имя</label>
                                    <input type="text" name="name" class="form-control" placeholder="Имя">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword" name="task" class="form-label">Задание</label>
                                    <input type="text" name="task" class="form-control" placeholder="Задание">
                                </div>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <?php $this->footer() ?>
        <?php
    }
}