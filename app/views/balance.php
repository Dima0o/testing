
<!-- Подключение хедера -->
<? $this->includes('header'); ?>

<div style="padding-top: 20px;"></div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">

            <div class="blog-post">
                <h3>Страница баланса</h3>

                <? if ( $this->GET[0] == 'needmoney' ): ?>

                    <div class="alert alert-warning" role="alert">
                        <strong>Внимание!</strong> Чтобы купить тест пополните баланс удобным вам способами
                    </div>

                <? endif; ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>№ <?=count( $var['transactions'] )?></th>
                            <th>Действие</th>
                            <th>Сумма</th>
                            <th>Дата</th>
                        </tr>
                    </thead>
                    <tbody>

                        <? if ( count( $var['transactions'] ) > 0 ): ?>

                            <? foreach( $var['transactions'] as $item ): ?>

                            <tr>
                                <th scope="row"><?=$item['id']?></th>
                                <td><span class="badge badge-success">Пополнение</span></td>
                                <td><?=$item['amount']?></td>
                                <td><?=date( 'd.m.Y h:m', $item['date'] )?></td>
                            </tr>

                            <? endforeach; ?>

                        <? else: ?>

                            <tr>
                                <td colspan="4">Пополнения отсутствуют</td>
                            </tr>

                        <? endif; ?>

                        <!--
                        <tr>
                            <th scope="row">3</th>
                            <td><span class="badge badge-success">Пополнение</span></td>
                            <td>300 р</td>
                            <td>17.01.2018</td>
                        </tr>
                        -->

                    </tbody>
                </table>

            </div>

        </div>

        <aside class="col-md-4 blog-sidebar">

            <div class="p-3 mb-3 bg-light rounded">
                <h4>Пополнить баланс</h4>

                <form action="" method="post" id="form_balance">

                    <div class="form-group">
                        <label>Способ</label>
                        <select name="payment" id="" class="form-control">
                            <option value="mc">MasterCard / VISA</option>
                            <option value="wm">WebMoney</option>
                            <option value="qw">QIWI</option>
                            <option value="sb">Сбербанк</option>
                            <option value="ab">Альфабанк</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label id="label_warning">Сумма </label>
                        <select name="amount" id="amount" class="form-control">
                            <option value="<?=$var['price']?>">1 тест - <?=$var['price']?> руб.</option>
                            <option value="<?=$var['price']*2?>">2 теста - <?=$var['price']*2?> руб.</option>
                            <option value="<?=$var['price']*3?>">3 теста - <?=$var['price']*3?> руб.</option>
                            <option value="<?=$var['price']*4?>">4 теста - <?=$var['price']*4?> руб.</option>
                            <option value="<?=$var['price']*5?>">5 тестов - <?=$var['price']*5?> руб.</option>
                            <option value="<?=$var['price']*6?>">6 тестов - <?=$var['price']*6?> руб.</option>
                            <option value="<?=$var['price']*7?>">7 тестов - <?=$var['price']*7?> руб.</option>
                            <option value="<?=$var['price']*8?>">8 тестов - <?=$var['price']*8?> руб.</option>
                            <option value="<?=$var['price']*9?>">9 тестов - <?=$var['price']*9?> руб.</option>
                            <option value="<?=$var['price']*10?>">10 тестов - <?=$var['price']*10?> руб.</option>
                            <option value="custom">Произвольная сумма</option>
                        </select>
                        <div class="form-group"  style="display: none;" id="custom_input" >
                            <br><input name="amount_custom" id="custom_amount" type="text" class="form-control" placeholder="Введите сумму" disabled required>
                        </div>
                    </div>
                    <input type="hidden" name="balance_add">
                    <button id="button_submit" type="button" class="btn btn-success">Пополнить</button>

                </form>

            </div>

        </aside>

    </div>

</main>

<!-- Подключение футера -->
<? $this->includes('footer'); ?>

<script>

    $(document).ready(function() {

        //Появление и скрытие инпута
        $( "#amount" ).change(function() {
            var value = $(this).val();
            if ( value !== 'custom' ){
                $("#custom_input").css("display","none");
                $("#custom_amount").attr('disabled','disabled');
            }else{
                $("#custom_input").css("display","block");
                $("#custom_amount").removeAttr('disabled');
            }

        });

        //Отправка вормы
        $( "#button_submit" ).click(function() {

            var select = $( "#amount" ).val();

            if ( select == 'custom' ){
                var summa = $( "#custom_amount" ).val();
            }else {
                var summa = $( "#amount" ).val();
            }

            if ( summa > 49 ){
                //Отправка формы
                $( "#form_balance" ).submit();
            }else {
                //принт ошибки "менее 50 рублей"
                $('#warning').remove();
                $('#label_warning').append('<span class="badge badge-danger" id="warning">Не менее 50 рублей</span>');
            }

        });

        //Ввод в инпут только чисел
        $("#custom_amount").keydown(function(event) {
            // Разрешаем нажатие клавиш backspace, Del, Tab и Esc
            if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
                // Разрешаем выделение: Ctrl+A
                (event.keyCode == 65 && event.ctrlKey === true) ||
                // Разрешаем клавиши навигации: Home, End, Left, Right
                (event.keyCode >= 35 && event.keyCode <= 39)) {
                return;
            }else {
                // Запрещаем всё, кроме клавиш цифр на основной клавиатуре, а также Num-клавиатуре
                if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                    event.preventDefault();
                }
            }
        });

    });

</script>