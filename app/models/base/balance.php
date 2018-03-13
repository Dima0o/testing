<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

$balance = balance::getInstance();

class balance {

    protected static $_instance;
    private function __clone() {}
    private function __wakeup() {}
    private function __construct() {}
    public static function getInstance() {
        if (self::$_instance === null) { self::$_instance = new self; }
        return self::$_instance;
    }

    /* Добавление файла */
    public function balanceUpdate($data){

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        if( $data['amount'] == 'amount' ):
            $amount = $data['amount_custom'];
        else:
            $amount = $data['amount'];
        endif;

        if( $bd->query('UPDATE `users` SET balance = balance + ?i WHERE `id` = ?i', $amount, $user->data['id'] ) ):

            $array = array(
                'user_id'   => $user->data['id'],
                'amount'    => $amount,
                'date'      => time()
            );
            $bd->query("INSERT INTO `balance_input` SET ?u", $array );

            $status = 'success';
        else:
            $status = 'error';
        endif;

        return $status;

    }

    /* Выбрать все товары */
    public function inputAll(){

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        $rows = $bd->getAll("SELECT * FROM `balance_input` WHERE user_id = ?i ORDER BY id DESC ", $user->data['id'] );

        return $rows;
    }

    /* Выбрать все налоги */
    public function getNalog(){

        $bd     = bd::getInstance();

        $array = array(
            1 => 'Январь',2 => 'Февраль',3 => 'Март',4 => 'Апрель',5 => 'Май',6 => 'Июнь',
            7 => 'Июль',8 => 'Август',9 => 'Сентябрь',10 => 'Октябрь',11 => 'Ноябрь',12 => 'Декабрь'
        );

        #Выбор записей налогов
        $rows = $bd->getAll("SELECT * FROM `nalog` ORDER BY id DESC LIMIT 36" );

        #Замена названий месяцев
        foreach ($rows as $key => $row)
            $rows[$key]['month'] = $array[ $rows[$key]['month'] ];

        return $rows;
    }

    /* Расчитать налог */
    public function addNalog($number){

        global $config;

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        #Сумма налога
        $nalog = floor( $number / $config['nalog'] );

        //date('n') date('Y');

        #Выборка текущего месяца
        $check_month = $bd->getAll("SELECT * FROM `nalog` WHERE `month` = ?i AND `year` = ?i", date('n') , date('Y') );

        #Если есть записываем если нет создаём и записываем
        if ($check_month):

            $bd->query('UPDATE `nalog` SET amount = amount + ?i WHERE `month` = ?i AND `year` = ?i ', $nalog, date('n') , date('Y') );

        else:

            $array = array( 'month' => date('n'), 'year' => date('Y'), 'amount' => $nalog );
            $bd->query("INSERT INTO `nalog` SET ?u", $array );

        endif;


        $rows = $bd->getAll("SELECT * FROM `balance_input` WHERE user_id = ?i ORDER BY id DESC ", $user->data['id'] );

        return $nalog;
    }



//
//    /* Выбрать один товары */
//    public function productGetOne($data){
//
//        $bd     = bd::getInstance();
//
//        $row = $bd->getRow('SELECT * FROM `products` WHERE id = ?i', $data);
//
//        return $row;
//    }
//
//    /* Изменить товары */
//    public function productEdit($data){
//
//        $bd     = bd::getInstance();
//
//        $array = array(
//            'name'      => $data['name'],
//            'category'  => $data['category'],
//            'price'     => $data['price'],
//            'info'      => $data['info']
//        );
//
//        if( $_FILES['files']['size'] > 0 ):
//
//            $ras =  end(explode(".", $_FILES['files']['name']));
//            $new_file_name =  md5( end( explode( ".", microtime() ) ) ) .'.'.$ras;
//
//            copy($_FILES['files']['tmp_name'], 'uploads/'.$new_file_name);
//
//            $array = array( 'img' => '/uploads/'.$new_file_name );
//
//        endif;
//
//
//
//        if( $bd->query('UPDATE `products` SET ?u WHERE `id`=?i',$array, $data['product_id'] ) ):
//            $status = 'success';
//        else:
//            $status = 'error';
//        endif;
//
//        return $status;
//
//    }
//
//    /* Удаление товара */
//    public function productDelete($data){
//
//        $bd     = bd::getInstance();
//
//        if( $bd->query('DELETE FROM `products` WHERE `id` = ?i', (int)$data['product_id']) ):
//            $status = 'success';
//        else:
//            $status = 'error';
//        endif;
//
//        return $status;
//
//    }

}