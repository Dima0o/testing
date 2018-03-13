<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Аида витрина</title>
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- include header -->
<? $this->includes('panel/header'); ?>


<div class="container theme-showcase" role="main" style="margin-top: 30px;">

    <div class="page-header">
        <h1>Товары</h1>
        <?
            //if( $this->GET[1] !== '' )
            //echo 'get:'.$this->GET[1];
        ?>
    </div>

    <div class="row">

        <div class="col-md-3">
            <label for="">Выберите категорию</label>
            <select class="selectpicker" data-live-search="true" style="width: 100%;" data-size="10" title="Выберите категорию" onchange="location = this.value;">
                <option value="<?=$config["admin_path"]?>products/category/all/" >-- Все товары --</option>
                <?
                    $g = $this->GET[0];
                    foreach( $config['products_category'] as $key => $item ):
                        if( $this->GET[0] == $key ):
                            $select = 'selected';
                        else:
                            $select = '';
                        endif;
                        echo '<option value="'.$config["admin_path"].'products/category/'.$key.'" '.$select.'>'.$item.'</option>';
                    endforeach;
                ?>
                <!--
                <optgroup label="Сыры">
                    <option>Tent</option>
                    <option>Flashlight</option>
                    <option>Toilet Paper</option>
                </optgroup>
                -->
            </select><br><br>
            <label for="">Товары</label><br>
            <a href="/panel/products/add/" class="btn btn-success">Добавить товар</a>
        </div>

        <div class="col-md-8">

            <!-- Разделение на страницы -->
            <? if ( $this->GET[0] == 'edit' ): ?>

                <h4>Изменение товара</h4>

                <br><a href="<?=$config['admin_path']?>products/category/all/" class="btn btn-sm btn-default">Назад</a><br><br>

                <!-- Показать статус -->
                <? if ( $this->GET[2] == 'success' ): ?>
                    <div class="alert alert-success">
                        <strong>Успешно!</strong> Товар изменён
                    </div>
                <? elseif($this->GET[2] == 'error'):?>
                    <div class="alert alert-danger">
                        <strong>Ошибка!</strong> Товар не изменён
                    </div>
                <?endif;?>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Название:</label>
                            <input name="name" type="text" class="form-control" value="<?=$var['edit_row']['name']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Категория:</label><br>
                            <select name="category" class="selectpicker" data-live-search="true" style="width: 100%;" data-size="10" title="Выберите категорию" required>
                                <?
                                foreach( $config['products_category'] as $key => $item ):
                                    if( $var['edit_row']['category'] == $key ):
                                        $select = 'selected';
                                    else:
                                        $select = '';
                                    endif;
                                    echo '<option value="'.$key.'" '.$select.'>'.$item.'</option>';
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Цена:</label>
                            <input name="price" type="text" class="form-control" value="<?=$var['edit_row']['price']?>" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Описание:</label>
                            <textarea name="info" id="" cols="5" rows="5" class="form-control"><?=$var['edit_row']['info']?></textarea>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Картинка:</label><br>
                            <img src="<?= $var['edit_row']['img'] ?>" class="img-thumbnail" height="200" width="200">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Картинка:</label>
                            <input type="file" name="files" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <input type="hidden" name="product_id" value="<?=$var['edit_row']['id'] ?>">
                        <button type="submit" class="btn btn-success" name="product_edit">Изменить</button>
                    </div>

                </form>


            <? elseif( $this->GET[0] == 'add'):?>

                <h4>Добавление товара</h4>

                    <!-- Показать статус -->
                    <? if ( $this->GET[1] == 'success' ): ?>
                        <div class="alert alert-success">
                            <strong>Успешно!</strong> Товар добавлен
                        </div>
                    <? elseif($this->GET[1] == 'error'):?>
                        <div class="alert alert-danger">
                            <strong>Ошибка!</strong> Товар не добавлен
                        </div>
                    <?endif;?>

                <form action="" method="post" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="email">Название:</label>
                        <input name="name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Категория:</label><br>
                        <select name="category" class="selectpicker" data-live-search="true" style="width: 100%;" data-size="10" title="Выберите категорию" required>
                            <?
                            foreach( $config['products_category'] as $key => $item ):
                                if( $this->GET[0] == $key ):
                                    $select = 'selected';
                                else:
                                    $select = '';
                                endif;
                                echo '<option value="'.$key.'" '.$select.'>'.$item.'</option>';
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Цена:</label>
                        <input type="text" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Картинка:</label>
                        <input type="file" name="files" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Описание:</label>
                        <textarea name="info" id="" cols="5" rows="5" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="product_add">Добавить</button>
                </form>

            <? else: ?>

                <!-- Показать статус -->
                <? if ( $this->GET[0] == 'success' ): ?>
                    <div class="alert alert-success">
                        <strong>Успешно!</strong> Товар удалён
                    </div>
                <? elseif($this->GET[0] == 'error'):?>
                    <div class="alert alert-danger">
                        <strong>Ошибка!</strong> Товар не удалён
                    </div>
                <?endif;?>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Картинка</th>
                        <th>Название</th>
                        <th>Стоимость</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>

                    <? if( count( $var['products']['array'] ) > 0 ): ?>

                        <? foreach( $var['products']['array'] as $key => $item ): ?>

                            <tr>
                                <th scope="row"><?=$item['id']?></th>
                                <td><img src="<?=$item['img']?>" height="100" width="100" alt=""></td>
                                <td><?=$item['name']?></td>
                                <td><?=$item['price']?> ₽</td>
                                <td>
                                    <a href="/panel/products/edit/<?=$item['id']?>/" class="btn btn-xs btn-default">Изменить</a>
                                    <button class="btn btn-xs btn-default" data-toggle="modal" data-target="#smallModal<?=$item['id']?>">Удалить</button>
                                </td>
                            </tr>

                            <div id="smallModal<?=$item['id']?>" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Удаление товара</h4>
                                        </div>
                                        <div class="modal-body">
                                            Удалить '<?=$item['name']?>' ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="" method="post">
                                                <input type="hidden" name="product_id" value="<?=$item['id']?>">
                                                <button type="submit" name="product_delete" class="btn btn-primary">Удалить</button>
                                            </form>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <? endforeach; ?>

                    <? else: ?>

                        <tr>
                            <td colspan="5">Нет данных</td>
                        </tr>

                    <? endif; ?>

                    </tbody>
                </table>

                <!-- Постаничная навигация -->
                <div class="col-md-12">

                    <!-- Назад страница -->
                    <? if( $var['products']['this_page'] != 1 ): ?>
                        <a href="/panel/products/category/<?=$this->GET[1]?>/<?=$var['products']['this_page'] - 1 ?>" class="btn btn-default">◀</a>
                    <? endif;?>

                    <!-- Текущая страница -->
                    <button class="btn btn-info"><?=$var['products']['this_page']?></button>

                    <!-- Вперёд страница -->
                    <? if( $var['products']['this_page'] < $var['products']['max_page']): ?>
                        <a href="/panel/products/category/<?=$this->GET[1]?>/<?=$var['products']['this_page'] + 1 ?>" class="btn btn-default">▶</a>
                    <? endif;?>

                </div>

                <!--
                <a href="/users/add/">Добавить</a><br>

                <table>

                    <? foreach( $var['user_array'] as $user ):?>

                        <tr>
                            <td><?=$user['id']?><td>
                            <td><?=$user['name']?><td>
                            <td><?=$user['surname']?><td>
                            <td><a href="/users/edit/">Изменить</a><td>
                        </tr>

                    <? endforeach;?>

                </table>
            -->

                <br>
            <? endif ?>

        </div>

    </div>

</div>


<!-- include footer -->
<? $this->includes('panel/footer'); ?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
