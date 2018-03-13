<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

$profile = profile::getInstance();

class profile {

    protected static $_instance;
    private function __clone() {}
    private function __wakeup() {}
    private function __construct() {}
    public static function getInstance() {
        if (self::$_instance === null) { self::$_instance = new self; }
        return self::$_instance;
    }

    /* Добавление файла */
    public function codeAdd($data){

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        /*Проверка существования кода*/

        $result = $bd->getRow('SELECT * FROM `chains_main` WHERE code = ?s OR ccode = ?s', $data['code'] , $data['code'] );

        /*Добавить проверку существования*/

        if ($result):

            #Добавляет код
            $array = array(
                'code' => $data['code']
            );

            if( $bd->query('UPDATE `users` SET ?u WHERE `id`=?i', $array, $user->data['id'] ) ):
                $status = 'success';
            else:
                $status = 'error';
            endif;

            #Добавляет баланс
            #Проверка если код компании (Не личный)
            if ( $result['ccode'] == $data['code'] ):

                #Выбрать баланс компании
                $company_row = $bd->getRow('SELECT `balance` FROM `users` WHERE code = ?s ORDER BY id DESC', $data['code'] );
                if ($company_row):
                    $bd->query('UPDATE `users` SET `balance` = `balance` + ?i WHERE `id` = ?i', $company_row['balance'] , $user->data['id'] );
                endif;

            endif;

        else:

            $status = 'error';

        endif;

        return $status;
    }

}