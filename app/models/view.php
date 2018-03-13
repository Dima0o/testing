<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

$view = view::getInstance();
	
class view {
	
	private $variables = array();
	private $title;
	private $GET;
	private $footer;
    protected static $_instance;
	private function __clone() {}
	private function __wakeup() {}
	private function __construct() {} 
    public static function getInstance() {
        if (self::$_instance === null) { self::$_instance = new self; }
		return self::$_instance;
    }
	
	/*Отоброжение шаблона*/
	public function render($url=false){
		$controller = controller::getInstance();
		$bd = bd::getInstance();
		$user = user::getInstance();
		$extra = extra::getInstance();

		global $root;
		global $config;

		if($url == false){
			$url = $controller->this_file();
			$url = str_replace('/controllers/','/views/',$url);
		}else{
			$url = $root.'app/views/'.$url.'.php';
		}
		$this->variables['file'] = $controller->this_file_last();
		$this->variables['dir'] = $controller->this_dir_last();
		$this->GET = $controller->GET();
		
		$var = $this->variables;

		require_once($url);
		
		return true;
	}
	
	/*Include*/
	public function includes($url){
		global $root;
		global $config;
		$footer = $this->footer;

		if( class_exists('user') )
			$user = user::getInstance();

		if( class_exists('extra') )
			$extra = extra::getInstance();
		
		$url = explode('/',$url);
		if(count($url) < 2){
			$url = $root.'app/views/include/'.$url[0].'.php';	
		}else{
			$url = $root.'app/views/'.$url[0].'/include/'.$url[1].'.php';
		}
		
		$var = $this->variables;
		require_once($url);
		
		return true;
	}
	
	/*Установить переменные*/
	public function set_variables ($variables) {
		return $this->variables = $variables;
	}
	
	/*Получить переменную*/
	public function variables ($variables) {
		return $this->variables[$variables];
	}
	
}

?>