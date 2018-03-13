<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');exit();}

#Инициализация класса
$users = users::getInstance();

class users {
	#Не понятная хуитень
	public $data;
	public $auth = NULL;
    protected static $_instance;
	private function __clone() {}
	private function __wakeup() {}
	private function __construct() {}
	public static function getInstance() {
        if (self::$_instance === null) { self::$_instance = new self; }
		return self::$_instance;
    }

    
	#Функция выбора всех пользователей
	public function getAll (){
		
		#Вот так подключаются другие классы в класс этот для работы с бд (не разкоменчивай)
		#$bd = bd::getInstance();
		
		#Здесь делается запрос к бд и всё что нужно
		#Для примера просто сам создал массив
		$user_array = array(
		   1 => array(
			   'id' 	 => '1',
			   'name' 	 => 'Иван 1',
			   'surname' => 'Фамилия 1'
			),
			2 => array(
			   'id' 	 => '2',
			   'name' 	 => 'Иван  2',
			   'surname' => 'Фамилия  2'
			),
			3 => array(
			   'id' 	 => '3',
			   'name' 	 => 'Иван 3',
			   'surname' => 'Фамилия 3'
			),			4 => array(
			   'id' 	 => '4',
			   'name' 	 => 'Иван 4',
			   'surname' => 'Фамилия 4'
			)
			
		);

		return $user_array;
	}

	
}