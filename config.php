<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');exit();}

    session_start();

	//База данных
    $bd_db       = "localhost";
    $bd_user     = "supporwv_opros";
    $bd_password = "CuqJ&U6U";
    $bd_base     = "supporwv_opros";

    //Отключение вывода ошибок
    //ini_set('display_errors','Off');
    //error_reporting('E_ALL');

	//Прочие настройки
	$root = '';
	$config = array();
	$config['version'] = 1;

	//Стоимость тестов
    #Обычная цена
	$config['price_main'] = '470';
    #Со скидкой
	$config['price_sale'] = '370';
	
    #Регистрация 1 - yes , 0 - no
    $config['set_register'] = 1;
