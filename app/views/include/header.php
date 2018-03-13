<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/tmp/dashboard/assets/favicon.ico">
    <title><?=$var['title']?></title>
    <link href="/tmp/dashboard/assets/blog.css" rel="stylesheet">
    <link href="/tmp/dashboard/assets/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!--    <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

<div class="container">

<header class="blog-header py-3">
    <div class="row">
        
        <div class="col-md-11 text-center">
            <a class="blog-header-logo" style="color: #1A153F;" href="#"> <img src="/tmp/dashboard/assets/unnamed.jpg" style="height: 40px; width: 40px; margin-top: -23px;"> А Т О С - И С И </a>
        </div>

        <? if( !$user->info() ): ?>

            <div class="col-md-1 text-center">
                <? if ( $config['set_register'] == 1 OR $user->data['status'] == 'admin' ): ?>
                <a class="btn btn-sm btn-info" href="/login/" > <!-- data-toggle="modal" data-target=".bd-example-modal-lg" -->  Вход </a>
                <? endif; ?>
            </div>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Вход / Регистрация</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <form action="/index/" method="post">
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Email:</label>
                                            <input name="email" type="email" class="form-control" placeholder="pochta@mail.ru" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Пароль:</label>
                                            <input name="pass" type="password" class="form-control" placeholder="Ваш пароль" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success" name="login">Вход</button>
                                        </div>

                                    </form>

                                </div>

                                <div class="col-md-6">

                                    <form action="/index/" method="post">

                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Email:</label>
                                            <input type="email" name="email" class="form-control" placeholder="pochta@mail.ru" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Пароль:</label>
                                            <input type="password" name="pass" class="form-control" placeholder="Придумайте пароль" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Код приглашения:</label>
                                            <input type="text" name="code" class="form-control" placeholder="000000">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Фамилия Имя:</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="surname" class="form-control" placeholder="Иванов" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="name" class="form-control" placeholder="Иван" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">Дата рождения:</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <select name="day" class="form-control" required>
                                                        <option value="1">1</option> <option value="2">2</option> <option value="3">3</option>
                                                        <option value="4">4</option> <option value="5">5</option> <option value="6">6</option>
                                                        <option value="7">7</option> <option value="8">8</option> <option value="9">9</option>
                                                        <option value="10">10</option> <option value="11">11</option> <option value="12">12</option>
                                                        <option value="13">13</option> <option value="14">14</option> <option value="15">15</option>
                                                        <option value="16">16</option> <option value="17">17</option> <option value="18">18</option>
                                                        <option value="19">19</option> <option value="20">20</option> <option value="21">21</option>
                                                        <option value="22">22</option> <option value="23">23</option> <option value="24">24</option>
                                                        <option value="25">25</option> <option value="26">26</option> <option value="27">27</option>
                                                        <option value="28">28</option> <option value="29">29</option> <option value="29">29</option>
                                                        <option value="30">30</option> <option value="31">31</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="month" class="form-control" required>
                                                        <option value="1">Янв</option>
                                                        <option value="2">Фев</option>
                                                        <option value="3">Мар</option>
                                                        <option value="4">Апр</option>
                                                        <option value="5">Май</option>
                                                        <option value="6">Июн</option>
                                                        <option value="7">Июл</option>
                                                        <option value="8">Авг</option>
                                                        <option value="9">Сен</option>
                                                        <option value="10">Окт</option>
                                                        <option value="11">Ноя</option>
                                                        <option value="12">Дек</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="year" class="form-control" placeholder="год" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!--
                                        <button type="submit" name="register" class="btn btn-success">Регистрация</button>
                                        -->
                                    </form>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>

        <? else: ?>

            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="text-muted" href="/testing/" style="padding-right: 10px;">Кабинет <?=$user->data['surname']?> </a>
                <a class="btn btn-sm btn-outline-secondary" href="/login/logout/"> Выход </a>
            </div>

        <? endif; ?>

    </div>
</header>

<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="/home/"><i class="fa fa-home" aria-hidden="true"></i><b> Главная </b></a>

        <? if ( $_SESSION['place'] == 'home' ): ?>

            <a class="p-2 text-muted" href="/button/1/"><b>• Презентация Технологии</b></a>
            <a class="p-2 text-muted" href="/button/2/"><b>• Освоение Технологии</b></a>
            <a class="p-2 text-muted" href="/button/3/"><b>• Пользование Технологии</b></a>
            <a class="p-2 text-muted" href="/button/4/"><b>• Дополнительно </b></a>

        <? else: ?>

            <!--<a class="p-2 text-muted" href="/feed/"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Лента</a>-->
            <a class="p-2 text-muted" href="/testing/"><i class="fa fa-list" aria-hidden="true"></i><b> Мои тесты </b></a>
            <a class="p-2 text-muted" href="/profile/<?=$user->data['id']?>"><i class="fa fa-user" aria-hidden="true"></i><b> Профиль </b></a>
            <a class="p-2 text-muted" href="/balance/"><i class="fa fa-rub" aria-hidden="true"></i><b> Баланс: <?=$user->data['balance']?>р </b></a>
            <? if( $user->data['status'] == 'admin' ): ?>
            <a class="p-2 text-muted" href="/users/"><i class="fa fa-users" aria-hidden="true"></i><b> Пользователи </b></a>
            <? endif; ?>

        <? endif; ?>

    </nav>
</div>