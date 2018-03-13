<!-- Подключение хедера -->
<? $this->includes('header'); ?>

<div style="padding-top: 20px;"></div>

<main role="main" class="container">
    <div class="row">

        <div class="col-md-12 blog-main">
            <? if ( $this->GET[0] == 'login_error' ): ?>
                <div class="alert alert-danger">
                    <strong>Ошибка входа!</strong> Логин или пароль не верный
                </div>
            <? elseif ( $this->GET[0] == 'register_success' ): ?>
                <div class="alert alert-success">
                    <strong>Отлично!</strong> Вы успешно зарегистрировались, воспользуйтесь формой входа
                </div>
            <? elseif ( $this->GET[0] == 'register_error' ): ?>
                <div class="alert alert-danger">
                    <strong>Ошибка регистрации!</strong> Вы ввели не верные данные попробуйте снова
                </div>
            <? endif; ?>
        </div>

        <div class="col-md-6 blog-main">
            <div class="blog-post">
                <form action="/login/" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Email:</label>
                        <input name="email" type="email" class="form-control" placeholder="pochta@mail.ru" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Пароль:</label>
                        <input name="pass" type="password" class="form-control" placeholder="Ваш пароль" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="login">Вход</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6 blog-main">
            <div class="blog-post">
                <form action="/login/" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="pochta@mail.ru" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Пароль:</label>
                        <input type="password" name="pass" class="form-control" placeholder="Придумайте пароль" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Код приглашения:</label>
                        <input type="text" name="code" class="form-control" placeholder="000000" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Фамилия Имя:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="surname" class="form-control" placeholder="Иванов" autocomplete="off" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Иван" autocomplete="off" required>
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
                                <input type="text" name="year" class="form-control" placeholder="год" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="register" class="btn btn-success">Регистрация</button>
                </form>

            </div>

        </div>


</main>

<!-- Подключение футера -->
<? $this->includes('footer'); ?>