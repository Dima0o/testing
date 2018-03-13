<?

	session_start();
	ini_set("session.use_cookies","1");
	header("Content-Type: text/html; charset=UTF-8");
	define("SECRET_Z*#(1219X*!sZZS", TRUE);

	#Отключение отображения ошибок
	#ini_set('display_errors','On');
	#error_reporting('E_ALL');

	#Загрузка основных моделей
    require_once("config.php");
    require_once($root."app/models/controller.php");
    require_once($root."app/models/view.php");

    #Второстепенные модели
    require_once($root."app/models/bd.php");
    require_once($root."app/models/user.php");
    require_once($root."app/models/extra.php");
    require_once($root."app/models/mail.php");
    require_once($root."app/models/files.php");


    $user->info();
	$controller->redirect();
	$controller->init();
	//$controller->getStats();
