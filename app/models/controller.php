<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

$controller = controller::getInstance();
	
class controller {
	
	private $this_file;
	private $this_file_last;
	private $this_dir_last;
	private $GET;
    protected static $_instance;
	private function __clone() {}
	private function __wakeup() {}
	private function __construct() {} 
    public static function getInstance() {
        if (self::$_instance === null) { self::$_instance = new self; }
		return self::$_instance;
    }
	
	/*Инициализация контролера*/
	public function init($url=false){

		global $root;
		global $config;

		$bd = bd::getInstance();
		$user = user::getInstance();
		$extra = extra::getInstance();
		$view = view::getInstance();
		
		$default = "index";	
		if($url == false){	
			$url = $_SERVER['REQUEST_URI'];
		}
		if($url == "/"){$url = $default;}

		$url_parts = explode('/', trim($url, ' /'));	
		$array_shift = array_shift($url_parts);

		if(is_dir('app/controllers/'.$array_shift)){
			
			$array_shift_two = array_shift($url_parts);

			if(is_dir('app/controllers/'.$array_shift.'/'.$array_shift_two)){

				$file = array_shift($url_parts);
				if($file === NULL){ $file = 'index';}
				$url_controller = 'app/controllers/'.$array_shift.'/'.$array_shift_two.'/'.$file.'.php';
				$this->this_dir_last = $array_shift;
				
			}else{

				$file = $array_shift_two;
				if($file === NULL){ $file = 'index';}
				$url_controller = 'app/controllers/'.$array_shift.'/'.$file.'.php';	
				$this->this_dir_last = $array_shift;		
			}
			
		}else{
			$file = $array_shift;	
			$url_controller = 'app/controllers/'.$file.'.php';
		}

		//Если файл не найден
		if(!is_file($url_controller)){
			$url_controller = 'app/controllers/404.php';
		}

		$this->GET = $url_parts;
		$this->this_file = $url_controller;
		$this->this_file_last = $file;

		require_once($url_controller);
		
		return true;
		
	}


	//Вывести статистику
	public function getStats(){
		$bd = bd::getInstance();
		echo "<p><b>Информация:</b></p>";
		foreach( $bd->getStats() as $r ){
			foreach($r as $k => $v){
				echo "<br>\n\r 		".$k." => ".$v;
			}
			echo "<br>\n\r";
		}
	}


	//Редирект со слешом на конце
	public function redirect(){

		if( mb_substr($_SERVER['REQUEST_URI'],-1) != '/' && (!$_POST && !$_GET) ){
			header('HTTP/1.1 301 Moved Permanently');
			header('Location: '.$_SERVER['REQUEST_URI'].'/');
			exit;
		}

	}
	
	/*Возвратить текущий файл контроллера*/
	public function this_file (){
		return $this->this_file;	
	}
	
	/*Возвратить текущий конечый файл контроллера*/
	public function this_file_last (){
		return $this->this_file_last;	
	}
	/*Возвратить текущий конечыую дириктрию*/
	public function this_dir_last (){
		return $this->this_dir_last;	
	}
	
	/*Возвратить GET*/
	public function GET(){
		return $this->GET;	
	}

}

?>