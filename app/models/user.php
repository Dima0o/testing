<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');exit();}

$user = user::getInstance();

class user {
	
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

    //Проверка авторизован ли юзер и получения данных о нем
    public function info(){
    	$bd = bd::getInstance();


    	//Если уже проверка была - возвращаем результат
    	if( $this->auth !== NULL)
    		return $this->data;

    	//Если неправильный ХЭШ в куках - возвращаем результат
    	if( mb_strlen($_COOKIE['hash']) != 32 || (int)$_COOKIE['user_id'] < 1 ):
    		$this->auth = false;
    		$this->data = false;
    		return false;
    	endif;

    	$info = $bd->getRow('SELECT * FROM `users` WHERE `id`=?i AND `hash`=?s LIMIT 1',$_COOKIE['user_id'],$_COOKIE['hash']);
    	if(!$info):
    		$this->auth = false;
    		$this->data = false;
    		return false;
    	endif;

    	$this->auth = true;
    	$this->data = $info;
    	return true;
    }

	//Авторизация
	public function login ($data){
		$bd = bd::getInstance();

		$user = $bd->getRow('SELECT * FROM users WHERE email = ?s AND pass = ?s', $data['email'], md5(md5($data['pass'])) );

		if( !$user )
			return 'Неверная электронная почта или пароль';

		if( mb_strlen($user['hash']) != 32 ):
			$hash = md5(time().rand());
			$bd->query('UPDATE `users` SET `hash` = ?s WHERE `id`=?i',$hash,$user['id']);
		else:
			$hash = $user['hash'];
		endif;

		$this->data = $user;

		$time_cookies = mktime(0,0,0,1,1,2030);
		setcookie('hash', $hash, $time_cookies, "/");
		setcookie('user_id', $user['id'], $time_cookies, "/");

		return 'success';
	}

    //Регистрация
    public function register ($data){
        $bd = bd::getInstance();

        #Проверка валидности кода приглашения
        $validate_code = $bd->getRow('SELECT * FROM chains_main WHERE code = ?s OR ccode = ?s', $data['code'], $data['code'] );

        #Если код валидный
        if($validate_code):
            $var_code = $data['code'];
        else:
            $var_code = '';
        endif;

        $array = array(
            'email'         => $data['email'],
            'pass'          => md5(md5($data['pass'])),
            'name'          => $data['name'],
            'surname'       => $data['surname'],
            'status'        => 'user',
            'code'          => $var_code,
            'birth_day'     => $data['day'],
            'birth_month'   => $data['month'],
            'birth_year'    => $data['year']
        );

        #Запись в БД
        if( $bd->query( 'INSERT INTO `users` SET ?u',$array ) ):
            $status = 'success';
        else:
            $status = 'error';
        endif;

        #Выбрать последний ID
        $last_id = $bd->insertId();

        #Если код валидный
        if($validate_code):

            #Запись кол-во приглашённых
            $bd->query('UPDATE `chains_main` SET `count` = `count` + 1 WHERE `code` = ?s OR `ccode` = ?s ', $data['code'] , $data['code'] );

            #Проверка есть ли email в цепочках
            $check = $bd->getRow('SELECT * FROM `chains_users` WHERE user_email = ?s' , $data['email'] );

            #Если есть емайлы
            if ( $check ):
                #Запись кол-во приглашённых
                $update_array = array( 'user_id' => $last_id, 'user_email' => '' );
                $bd->query('UPDATE `chains_users` SET ?u WHERE `user_email` = ?s', $update_array , $data['email'] );
            endif;

            #Проверка если код компании (Не личный)
            if ( $validate_code['ccode'] == $data['code'] ):

                #Выбрать баланс компании
                $company_row = $bd->getRow('SELECT `balance` FROM `users` WHERE code = ?s ORDER BY id DESC', $data['code'] );
                if ($company_row):
                    $bd->query('UPDATE `users` SET `balance` = ?i WHERE `id` = ?i', $company_row['balance'] , $last_id );
                endif;

            endif;

        endif;

        return $status;
    }

	//Выход
	public function logout (){
		$bd = bd::getInstance();

		//Чистим куки и сессию
		session_unset();
		session_destroy();
		setcookie('user_id','',0,"/");
		setcookie('hash','',0,"/");

		return true;
	}

}