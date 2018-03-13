
<!-- Подключение хедера -->
<? $this->includes('header'); ?>

<div style="padding-top: 20px;"></div>

<main role="main" class="container">

<? if( $this->GET[0] == '' ): ?>

    <div class="row">
        <div class="row mb-2">

            <br><br>

            <? if( count($var['testing_rows']) > 0 ):?>

                <? foreach ( $var['testing_rows'] as $item): ?>

                    <div class="col-md-12">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <h3 class="mb-0">
                                    <!--<a class="text-dark" href="/testing/<?=$item['name']?>/"><?=$item['title']?></a>-->
                                    <p class="text-dark" href="#"><?=$item['title']?></p>
                                </h3>

                                <? if ( $item['status'] == 'active' ): ?>
                                    <!--<div class="mb-1 text-muted"><span class="badge badge-primary">В процессе</span></div>-->
                                <? endif; ?>

                                <p class="card-text mb-auto">
                                    <!--
                                    <b>Описание:</b> <br>
                                    This is a wider card with supporting text below as a natural lead-in to additional content
                                    <br>
                                    -->

                                    <!-- Предыдущие результаты -->
                                    <? if ( $item['completed'] ): ?>

                                        <a href="#" data-toggle="modal" data-target="#results_<?=$item['id']?>"> <b>Результаты</b> </a>

                                        <div id="results_<?=$item['id']?>" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="results" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Результаты</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan="2">Дата прохождения</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            <? foreach ( $item['completed'] as $complete):?>

                                                                <tr>
                                                                    <td><?=$complete['date'] ?></td>
                                                                    <td><a href="..<?=$complete['file']?>" class="btn btn-success btm-sm"><i class="fa fa-download"></i></a></td>
                                                                </tr>

                                                            <? endforeach;?>

                                                            <!--
                                                                <tr>
                                                                    <td>03.02.2018 20:50</td>
                                                                    <td><a href="/uploads/user_testing/test_02_18.docx" class="btn btn-success btm-sm"><i class="fa fa-download"></i></a></td>
                                                                </tr>
                                                            -->

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <? endif; ?>

                                </p>

                                <? if ( $item['status'] == 'active' ): ?>

                                    <a href="/testing/<?=$item['name']?>/" class="btn btn-sm btn-info">Пройти тест</a>

                                <? else: ?>

                                    <? if ( $user->data['balance'] >= $var['price'] ): ?>

                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#buy_test_<?=$item['id']?>">Купить <?=$var['price']?> р</button><br>

                                    <div id="buy_test_<?=$item['id']?>" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="buy_test" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <form action="" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Покупка</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Купить тест?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="buy_test" value="<?=$item['id']?>">Купить</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <? else: ?>

                                    <a href="/balance/needmoney/" class="btn btn-sm btn-success" >Купить <?=$var['price']?> р</a><br>

                                    <? endif; ?>


                                <? endif; ?>

                            </div>
                            <img src="<?=$item['img']?>" alt="">
                        </div>
                    </div>

                <? endforeach; ?>

            <? else:;?>

                <div class="col-md-12">
                    <br><br><br><br><label for="">Тесты отсутствуют</label><br><br><br><br>
                </div>

            <? endif;?>

            <!--
            <div class="col-md-12">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <div class="col-md-10">

                            <h3 class="mb-0">
                                <a class="text-dark" href="#">Тест на смекалку</a>
                            </h3>
                            <div class="mb-1 text-muted"><span class="badge badge-primary">В процессе</span></div>
                            <p class="card-text mb-auto"> <b>Описание 2:</b> <br>
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                            </p>

                            <br>Пройдено:<br>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                     aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                    70%
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="https://www.entrepreneurmag.co.za/wp-content/uploads/2014/04/The-One-Habit-That-Will-Make-You-Smarter-_Video_Personal-improvement_Self-development1.jpg">
                </div>
            </div>
            -->

        </div>
    </div>

<? else: ?>

    <div class="row">

        <br><br>

        <?
            /* Подгрузка содержимого теста */
            $include_file = 'app/views/include/testing_form/'.$this->GET[0].'.php';
            if ( file_exists( $include_file ) )
                require_once "$include_file";
        ?>

    </div>

<? endif; ?>

</main>

<!-- Подключение футера -->
<? $this->includes('footer'); ?>

<script>
    $(document).ready(function(){

        //Плавный скрол
        $(document).ready(function() {
            $('.top').click(function(){
                //$(this).addClass('active');
                $('html, body').animate({scrollTop:$('#elm').position().top - 60}, 2000);
            });
        });

    });
</script>