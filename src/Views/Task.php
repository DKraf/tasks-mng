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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Text</th>
                        <th scope="col">IS Active</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['tasks'] as $task) : ?>
                    <tr>
                        <th scope="row"><?php echo $task['id']; ?></th>
                        <td><?php echo $task['name']; ?></td>
                        <td><?php echo $task['email']; ?></td>
                        <td><?php echo $task['text']; ?></td>
                        <td><?php echo $task['active']; ?></td>

                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

        <?php

    }
}