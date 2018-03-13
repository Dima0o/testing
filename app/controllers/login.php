<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

#Выход
if( $this->GET[0] == 'logout'):
    $user->logout();
    header('Location: /home/');
    exit();
endif;

#Авторизация
if( isset( $_POST['login'] ) ):

    $result = $user->login($_POST);

    if( $result === 'success' ):
        header('Location: /');
        exit();
    else:
        header('Location: /login/login_error/');
        exit();
    endif;

endif;

#Регистрация
if(isset($_POST['register'])):

    $register   = $user->register($_POST);

    if( $register === 'success' ):
        header('Location: /login/register_success/');
        exit();
    else:
        header('Location: /login/register_error/');
        exit();
    endif;

endif;

#Данные которые передаются в шаблон
$variables = array(
    'title'     => 'Авторизация / Регистрация'
);

#Отрисовка шаблона
$view->set_variables($variables);
$view->render();