<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

#Проверка авторизации
//if( !$user->info() )
//    header('Location: /');



#Данные которые передаются в шаблон
$variables = array(
    'title'     => 'Главная'
);

#Отрисовка шаблона
$view->set_variables($variables);
$view->render();