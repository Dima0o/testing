<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

#Проверка авторизации
//if( !$user->info() )
//    header('Location: /');

require_once 'app/models/base/users.php';
require_once 'app/models/base/balance.php';

//Изменить процент партнёра
if ( isset( $_POST['edit_percent'] ) ):

    $result = $users->editPercent($_POST);

    if ( $result == 'success' ):
        header('Location: /users/partners/success/');
        exit;
    elseif ( $result == 'error' ):
        header('Location: /users/partners/error/');
        exit;
    else:
        header('Location: /users/partners/');
        exit;
    endif;

endif;

//Добавление цепочки $status
if ( isset( $_POST['chain_add'] ) ):
    $result = $users->chainAdd($_POST);
    header('Location: /users/chains/');
    exit;
endif;


//Удаление цепочки
if ( isset( $_POST['delete_chain'] ) ):
    $result = $users->chainDelete($_POST);
    header('Location: /users/chains/');
    exit;
endif;

//Добавить пользователя в цепочку
if ( isset( $_POST['chain_user_add'] ) ):
    $result = $users->chainUserAdd($_POST);
    header('Location: /users/chains/');
    exit;
endif;

//Добавить партнера
if ( isset( $_POST['partner_add'] ) ):
    $result = $users->partnerAdd($_POST);
    header('Location: /users/partners/');
    exit;
endif;

//Исключить участника цепочки
if ( isset( $_POST['leave_user'] ) ):
    $result = $users->leaveUser($_POST);
    header('Location: /users/chains/');
    exit;
endif;

//Исключить Партнёра
if ( isset( $_POST['leave_partner'] ) ):
    $result = $users->leavePartner($_POST);
    header('Location: /users/partners/');
    exit;
endif;

//Изменить название цепочки
if ( isset( $_POST['name_edit'] ) ):
    $result = $users->editName($_POST);
    header('Location: /users/chains/');
    exit;
endif;

//Определение акта, раздела
if ( $this->GET[0] == 'partners' ):
    $act = 'partners';
    $act_title  = 'Список партнёров';
elseif ( $this->GET[0] == 'nalogs' ):
    $act        = 'nalogs';
    $act_title  = 'Налоги';
else:
    $act        = 'chains';
    $act_title  = 'Цепочки рекрутёров';
    $chains     = $users->chainAll( $this->GET[1] );
endif;

$add = $balance->addNalog(1000);

#Данные которые передаются в шаблон
$variables = array(
    'title'     => $act_title,
    'partners'  => $users->partnersAll(),
    'nalog'     => $balance->getNalog(),
    'chains'    => $chains,
    'act'       => $act
);

#Отрисовка шаблона
$view->set_variables($variables);
$view->render();