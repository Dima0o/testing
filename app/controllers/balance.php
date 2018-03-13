<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

#Проверка авторизации
//if( !$user->info() )
//    header('Location: /');

require_once 'app/models/base/balance.php';

global $config;

//Расчёт стоимости 1го теста, есть ли код приглашения
if( $user->data['code'] == '' ):
    $price = $config['price_main'];
else:
    $price = $config['price_sale'];
endif;

//Пополнение баланса
if ( isset($_POST['balance_add']) ):
    $result = $balance->balanceUpdate($_POST);
    if ( $result == 'success' ):
        header('Location: /balance/success/');
        exit;
    else:
        header('Location: /balance/error/');
        exit;
    endif;
endif;

//Выбрать последние пополнения
$transactions = $balance->inputAll();


#Данные которые передаются в шаблон
$variables = array(
    'title'         => 'Баланс',
    'transactions'  => $transactions,
    'price'         => $price
);

#Отрисовка шаблона
$view->set_variables($variables);
$view->render();