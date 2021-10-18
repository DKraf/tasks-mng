<?php


namespace App\Views;


class Task extends Base
{
    /**
     * @inheritDoc
     */
    public function container($data = [])
    {
        ?>
        <?php $this->header(); //print_r($data);die; ?>
        <section class="bg-light block">
        <div class="d-flex justify-content-center pb-3">
            <div class="col-sm-3">
                <form action="" method="get">
                    <select name="sort" class="form-control" id="sort">
                        <option value="default" <?php if (@$_GET['sort'] == 'default') echo 'selected'; ?>>Сортировать</option>
                        <option value="name" <?php if (@$_GET['sort'] == 'name') echo 'selected'; ?>>по Имени</option>
                        <option value="email" <?php if (@$_GET['sort'] == 'email') echo 'selected'; ?>>по Электронной почте</option>
                        <option value="active" <?php if (@$_GET['sort'] == 'active') echo 'selected'; ?>>по Статусу</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Эл. почта</th>
                        <th scope="col">Текст</th>
                        <th scope="col">Статус заявки</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['tasks'] as $task) : ?>
                    <tr>
                        <th scope="row"><?php echo $task['id']; ?></th>
                        <td><?php echo $task['name']; ?></td>
                        <td><?php echo $task['email']; ?></td>
                        <td><?php echo $task['text']; ?></td>
                        <td><?php echo ((bool)$task['active']) ?  'Активна' :  'Закрыта'; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if($data['count'] > 3): ?>
                    <div class="pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php for($i=1; $i<=$data['page']; $i++): ?>
                                    <li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?>  </a></li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                <?php endif; ?>
            </div>
            <div class="d-flex justify-content-center pb-5 ">
                <button type="button" class="btn btn-primary" onclick="location.href='/task/add'" type="button">Добавить задачу</button>
            </div>
        </div>
        </section>
        <?php $this->footer() ?>
        <?php

    }
}