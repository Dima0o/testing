
<!-- Подключение хедера -->
<? $this->includes('header'); ?>

<div style="padding-top: 20px;"></div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">

            <? //print_r($var['chains']) ?>

            <? if ( $var['act'] == 'chains' ): ?>

                <h3>Рекрутёры</h3>

                <!-- Проверка передачи массива -->
                <? if( $var['chains'] ): ?>

                    <!-- Распечатка цепочек -->
                    <? foreach ($var['chains'] as $chain):?>

                        <? $number = 0; ?>

                        <div class="blog-post">

                            <div class="card" style="margin-top: 10px;">
                                <div class="card-header">
                                    <h5 style="padding-bottom: -50px;"><?=$chain['name']?></h5>
                                    <p style="padding-bottom: -50px;"> Личный: <b><?=$chain['code']?></b> - Компания: <b><?=$chain['ccode']?></b></p>
                                    <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#new_user_chain_<?=$chain['id']?>"><i class="fa fa-plus" aria-hidden="true"></i> Добавить участника</button>
                                    <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#delete_chain_<?=$chain['id']?>"><i class="fa fa-trash" aria-hidden="true"></i> Удалить цепочку</button>
                                    <button class="btn btn-sm btn-default"><i class="fa fa-rub" aria-hidden="true"></i> Заработано: <?=$chain['amount']?> р</button>
                                    <button class="btn btn-sm btn-default"><i class="fa fa-users" aria-hidden="true"></i> Приведено: <?=$chain['count']?> чел.</button>
                                    <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#name_edit_<?=$chain['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                </div>
                                <div class="card-block">
                                    <div class="row">

                                        <div class="col-md-12">

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>№</th>
                                                        <th>ФИО</th>
                                                        <th>Действие</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <!-- Проверка наличия пользователей -->

                                                    <? if( $chain['users'] ):?>

                                                        <? foreach ( $chain['users'] as $chain_user_key => $chain_user ):?>

                                                            <? $number = $number + 1; ?>

                                                            <tr>
                                                                <th scope="row"><?=$number?></th>
                                                                <td><?=$chain_user?></td>
                                                                <td><button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#leave_<?=$chain['id']?>_<?=$chain_user_key?>"> <i class="fa fa-trash" aria-hidden="true"></i> Исключить</button></td>
                                                            </tr>

                                                            <div id="leave_<?=$chain['id']?>_<?=$chain_user_key?>" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content">
                                                                        <form action="" method="post">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Исключение</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Исключить <?=$chain_user?> ?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <input name="chain_id" type="hidden" value="<?=$chain['id']?>">
                                                                                <input name="user_id"  type="hidden" value="<?=$chain_user_key?>">
                                                                                <button type="submit" class="btn btn-primary" name="leave_user">Исключить</button>
                                                                                <button type="button" class="btn btn-secondary">Отмена</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <? endforeach;?>

                                                    <? else:?>
                                                        <tr>
                                                            <td colspan="3">Нет участников</td>
                                                        </tr>
                                                    <? endif;?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="delete_chain_<?=$chain['id']?>" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Удаление</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    Удалить цепочку ?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="delete_chain" value="<?=$chain['id']?>">Удалить</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div id="new_user_chain_<?=$chain['id']?>" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Добавить участника</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <ul class="nav nav-pills" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="pill" href="#address_<?=$chain['id']?>">Адрес</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="pill" href="#email_<?=$chain['id']?>">Email</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content">
                                                    <div id="address_<?=$chain['id']?>" class="container tab-pane active"><br>
                                                        <form action="" method="post">
                                                            <div class="form-group">
                                                                <label>Адрес пользователя</label>
                                                                <input name="user_profile" type="text" class="form-control" autocomplete="off" required>
                                                                <br>
                                                                <input name="chain_id" type="hidden" value="<?=$chain['id']?>">
                                                                <button type="submit" class="btn btn-primary" name="chain_user_add" value="address">Добавить</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="email_<?=$chain['id']?>" class="container tab-pane fade"><br>
                                                        <form action="" method="post">
                                                            <div class="form-group">
                                                                <label>Email пользователя</label>
                                                                <input name="user_profile" type="email" class="form-control" autocomplete="off" required>
                                                                <br>
                                                                <input name="chain_id" type="hidden" value="<?=$chain['id']?>">
                                                                <button type="submit" class="btn btn-primary" name="chain_user_add" value="email">Добавить</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">

                                            </div>

                                    </div>
                                </div>
                            </div>

                            <div id="name_edit_<?=$chain['id']?>" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <form action="" method="post">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Изменение названия</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Название</label>
                                                    <input name="chain_name" type="text" class="form-control" value="<?=$chain['name']?>" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="name_edit" value="<?=$chain['id']?>">Изменить</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    <? endforeach;?>

                <? else: ?>
                    <p class="text-center">Цепочки не созданы</p>
                <? endif; ?>



            <? elseif ( $var['act'] == 'partners' ): ?>

                <div class="blog-post">
                    <h3>Партнёры</h3>

                    <? if ( $this->GET[1] == 'success' ): ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Отлично!</strong> Процент успешно изменён
                        </div>
                    <? elseif( $this->GET[1] == 'error' ): ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Ошибка!</strong> Кол-во процентов больше 100
                        </div>
                    <? endif; ?>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ФИО</th>
                            <th>%</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                            <!-- Проверка передачи массива партнёров -->
                            <? if( $var['partners'] ): ?>

                                <!-- Распечатка цепочек -->
                                <? foreach ($var['partners'] as $partner):?>

                                    <form action="" method="post">
                                        <tr>
                                            <th scope="row"><?=$partner['id']?></th>
                                            <td><?=$partner['surname']?> <?=$partner['name']?> <? if( $partner['status'] == 'admin'):?> <span class="badge badge-success">админ</span><? endif; ?> </td>
                                            <td><input name="percent_value" type="text" class="form-control" style="width: 50px" value="<?=$partner['part_persent']?>" maxlength="2" autocomplete="off" data-bind="value:replyNumber" required> </td>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-info" name="edit_percent" value="<?=$partner['id']?>">Изменить %</button>
                                                <? if( $partner['status'] !== 'admin'):?>
                                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#leave_partner">Исключить</button>
                                                <? endif; ?>
                                            </td>
                                        </tr>
                                    </form>

                                    <div id="leave_partner" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <form action="" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Исключение партнёра</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Исключить <?=$partner['surname']?> ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="leave_partner" value="<?=$partner['id']?>">Исключить</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                <? endforeach;?>

                            <? else: ?>

                                <tr>
                                    <td colspan="4">Нет партнёров</td>
                                </tr>

                            <? endif; ?>

                        </tbody>
                    </table>

                </div>

            <? else: ?>

                <div class="blog-post">
                    <h3>Налоги</h3>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Сумма</th>
                            </tr>
                        </thead>
                        <tbody>

                            <? if($var['nalog']): ?>

                                <? foreach ($var['nalog'] as $item): ?>

                                    <tr>
                                        <td><?=$item['year']?> - <?=$item['month']?> </td>
                                        <td><b><?=$item['amount']?></b> ₽ </td>
                                    </tr>

                                <? endforeach; ?>

                            <? else: ?>
                                <tr>
                                    <td colspan="2">Нет данных</td>
                                </tr>
                            <? endif; ?>
                        </tbody>
                    </table>

                </div>

            <? endif;?>

        </div>

        <aside class="col-md-4 blog-sidebar">

            <div class="p-3">

                <h4 class="font-italic">Разделы</h4>

                <div class="p-3 mb-3 bg-light rounded">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link <? if( $var['act'] == 'chains') echo 'active'; ?>" href="/users/chains/">Рекрутёры</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <? if( $var['act'] == 'partners') echo 'active'; ?>" href="/users/partners/">Партнёры</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <? if( $var['act'] == 'nalogs') echo 'active'; ?>" href="/users/nalogs/">Налоги</a>
                        </li>
                    </ul>
                </div>

            </div>

                <div class="p-3">

                    <div class="p-3 mb-3 bg-light rounded">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">

                                <? if ( $var['act'] == 'chains' ): ?>

                                    <button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#chain_add">Добавить цепочку</button>

                                    <div id="chain_add" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <form action="" method="post" name="this_form">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Добавить цепочку</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Название цепочки</label>
                                                            <input type="text" name="chain_name" class="form-control" placeholder="Введите название" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="chain_add" class="btn btn-primary">Создать</button>
                                                        <button type="button" class="btn btn-secondary">Закрыть</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                <? elseif ( $var['act'] == 'partners' ): ?>

                                    <button type="button" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target=".bd-example-modal-sm">Добавить партнёра</button>

                                    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <form action="" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Добавить партнёра</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Адрес пользователя</p>
                                                        <input name="user_profile" type="text" class="form-control" autocomplete="off" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="partner_add">Добавить</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                <? endif;?>
                            </li>
                        </ul>
                    </div>

                </div>

        </aside>

    </div>

</main>

<!-- Подключение футера -->
<? $this->includes('footer'); ?>