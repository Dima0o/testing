
<!-- Подключение хедера -->
<? $this->includes('header'); ?>

<div style="padding-top: 20px;"></div>

<main role="main" class="container">
    <div class="row">

        <div class="col-md-2 blog-main"></div>
        <div class="col-md-8 blog-main">

            <div class="blog-post">
                <h3>Страница профиля</h3>

                <? if ( $this->GET['1'] == 'success'): ?>

                    <div class="alert alert-success" role="alert">
                        <strong>Отлично!</strong> Код приглашения успешно добавлен
                    </div>

                <? elseif ( $this->GET['1'] == 'error' ): ?>

                    <div class="alert alert-danger" role="alert">
                        <strong>Ошибка!</strong> Вы ввели неверный код приглашения
                    </div>

                <? endif; ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">Данные пользователя</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Фамилия</td>
                            <td><?=$user->data['surname']?></td>
                        </tr>
                        <tr>
                            <td>Имя</td>
                            <td><?=$user->data['name']?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?=$user->data['email']?></td>
                        </tr>
                        <tr>
                            <td>Баланс</td>
                            <td><?=$user->data['balance']?></td>
                        </tr>
                        <tr>
                            <td>Зарегистрирован</td>
                            <td><?=$user->data['reg_time']?></td>
                        </tr>

                        <tr>
                            <td>Код приглашения</td>
                            <td>
                                <? if ( $user->data['code'] !== '' ): ?>

                                    <?=$user->data['code']?>

                                <? else: ?>

                                    <form action="" method="post">
                                        <div class="input-group">
                                            <input name="code" type="text" class="form-control" placeholder="Введите код" style="width: 50px" autocomplete="off" required>
                                            <span class="input-group-btn">
                                                <button name="code_add" class="btn btn-success" type="submit">Добавить</button>
                                            </span>
                                        </div>
                                    </form>

                                <? endif; ?>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>

        </div>

<!--        <aside class="col-md-4 blog-sidebar">-->
<!--            <div class="p-3 mb-3 bg-light rounded">-->
<!--                <h4 class="font-italic">Дополнительная колонка</h4>-->
<!--                <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>-->
<!--            </div>-->
<!--        </aside>-->

    </div>

</main>

<!-- Подключение футера -->
<? $this->includes('footer'); ?>