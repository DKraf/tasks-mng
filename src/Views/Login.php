<?php


namespace App\Views;


class Login extends Base
{

    /**
     * @inheritDoc
     */
    public function container($data = [])
    {
        ?>
        <?php $this->header(); //print_r($data);die; ?>
        <section class="bg-light block">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Авторизация</div>
                            <div class="card-body">
                                <form id="form-login" action="/login" method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail"  class="form-label">Электронная почта</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="somethig@email.com">
                                    </div>
                                   <div class="mb-3">
                                       <label for="exampleInputPassword" class="form-label">Пароль</label>
                                       <input type="password" name="password" class="form-control" id="exampleInputPassword">
                                   </div>
                                   <button type="submit" class="btn btn-primary">Авторизоваться</button>
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