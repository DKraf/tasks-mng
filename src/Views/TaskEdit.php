<?php

namespace App\Views;


class TaskEdit extends Base {

    public function container($data = [])
    {
        ?>
        <?php $this->header(); ?>
        <section class="bg-light block">
            <div class="container">
                <div class="container-block">
                    <form action="/update-task" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name - <span class="req"><?php echo $data['name'] ?></span></label>
                            <input type="hidden" value="<?php echo $data['id'] ?>" name="id" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email - <span class="req"> <?php echo $data['email'] ?></span></label>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Задание<span class="req"> *</span></label>
                            <textarea name="text"  class="form-control" ><?php echo $data['text']?></textarea>
                        </div>
                        <div class="form-group pb-5 ">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="active" id="inlineRadio1" value="1" checked>
                                <label class="form-check-label" for="inlineRadio1">В работе</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="active" id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">Выполнена</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center pb-5 ">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                    </form>

                </div>
            </div>
        </section>
        <?php $this->footer(); ?>
        <?php
    }
}