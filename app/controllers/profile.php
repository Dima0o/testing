<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

#Проверка авторизации
//if( !$user->info() )
//    header('Location: /');

require_once 'app/models/base/profile.php';

#Добавление кода приглашения
if( isset( $_POST['code_add'] ) ):
    $result = $profile->codeAdd($_POST);
    if ( $result == 'success' ):
        header('Location: /profile/1/success/');
        exit;
    else:
        header('Location: /profile/1/error/');
        exit;
    endif;
endif;

#Данные которые передаются в шаблон
$variables = array(
    'title'     => 'Профиль пользователя'
);

#Отрисовка шаблона
$view->set_variables($variables);
$view->render();