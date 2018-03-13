<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

$mail = mail::getInstance();
	
class mail {
	
    protected static $_instance;
	private function __clone() {}
	private function __wakeup() {}
	private function __construct() {} 
    public static function getInstance() {
        if (self::$_instance === null) { self::$_instance = new self; }
		return self::$_instance;
    }
	
	/*Отправить сообщение*/
	public function send($email,$subject,$text){

		if( !preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/u", $email) )
			return false;

		return mail($email,$subject,$text, 
		 "From:  =?utf-8?B?" . base64_encode('robot@site.ru') . "?= <robot@site.ru>\r\n"
		.'Content-type: text/html; charset=utf-8' . "\r\n"
		."X-Mailer: PHP/" . phpversion());
	}

	
}

?>