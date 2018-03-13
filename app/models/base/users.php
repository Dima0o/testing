<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

$users = users::getInstance();

class users {

    protected static $_instance;
    private function __clone() {}
    private function __wakeup() {}
    private function __construct() {}
    public static function getInstance() {
        if (self::$_instance === null) { self::$_instance = new self; }
        return self::$_instance;
    }

    /* Создание новой цепочки */
    public function chainAdd($data){

        $bd     = bd::getInstance();
        $user   = user::getInstance();
        $extra  = extra::getInstance();

        /* Запись цепочки */

        #Генерация кода цепочке
        $code  = $extra->generate_password(6);
        $сcode = $extra->generate_password(6);

        #Проверка на наличие названия
        if ( trim( $_POST['chain_name']) !== '' ):
            $chain_name = trim( $_POST['chain_name']);
        else:
            $chain_name = 'Безымянная цепочка';
        endif;

        $array = array(
            'name'    => $chain_name,
            'code'    => $code,
            'ccode'    => $сcode
        );
        $result_one = $bd->query("INSERT INTO `chains_main` SET ?u", $array );

        /* Запись админа в участники */

        #Последний записанный ID
        $insert_id = $bd->insertId();

        $array_two = array(
            'chain_id'  => $insert_id,
            'user_id'   => $user->data['id']
        );
        $result_two = $bd->query("INSERT INTO `chains_users` SET ?u", $array_two );

        return 'success';
    }

    /* Выбрать всех партнёров */
    public function partnerAll(){

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        return 'success';
    }

    /* Добавить пользователя в цепочку */
    public function chainUserAdd($data){

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        #Проверка добавления по url или email
        if( $data['chain_user_add'] == 'address' ):

            $url = explode("/", $data['user_profile']);

            if( isset( $url['4'] ) AND is_numeric( (int)$url['4'] ) ):

                #Проверка существования id пользователя
                $count_id = $bd->getOne('SELECT COUNT(*) FROM `users` WHERE id = ?i', $url['4'] );

                #Если найден пользователь
                if ($count_id > 0):

                    #Проверка на дубликат в цепочке
                    $count = $bd->getOne('SELECT COUNT(*) FROM `chains_users` WHERE chain_id = ?i AND user_id = ?i', $data['chain_id'] , $url['4'] );

                    #Если дубликатов нет
                    if ($count < 1):
                        #Добавление пользователя
                        $array = array(
                            'chain_id'  => $data['chain_id'],
                            'user_id'   => (int)$url['4']
                        );
                        $result = $bd->query("INSERT INTO `chains_users` SET ?u", $array );
                    endif;

                endif;

            endif;

        else:

            //Проверка на дубликат
            $count = $bd->getOne('SELECT COUNT(*) FROM `chains_users` WHERE chain_id = ?i AND user_email = ?s', $data['chain_id'] , $data['user_profile'] );

            if ($count < 1):

                //Добавление пользователя
                $array = array(
                    'chain_id'      => $data['chain_id'],
                    'user_id'       => rand(900000,999999),
                    'user_email'    => $data['user_profile']
                );
                $result = $bd->query("INSERT INTO `chains_users` SET ?u", $array );

            endif;

        endif;

        return $url;
        //return 'success';
    }

    /* Добавить пользователя в цепочку */
    public function partnerAdd($data){

        $bd     = bd::getInstance();

        $url = explode("/", $data['user_profile']);

        if( isset( $url['4'] ) AND is_numeric( (int)$url['4'] ) ):

            #Проверка на дубликат
            $count = $bd->getOne('SELECT COUNT(*) FROM `users` WHERE id = ?i AND status = ?s', $url['4'] , 'partner' );

            if ($count < 1):

                #Изменение статуса на партнёра
                $bd->query('UPDATE `users` SET status = "partner" WHERE id = ?i', (int)$url['4'] );

            endif;

        endif;

        return 'success';
    }


    /* Удалить цепочку */
    public function chainDelete($data){

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        //Удаление цепочки
        $bd->query('DELETE FROM `chains_main` WHERE `id` = ?i', (int)$data['delete_chain'] );

        //Удаление участников
        $bd->query('DELETE FROM `chains_users` WHERE `chain_id` = ?i', (int)$data['delete_chain'] );

        return 'success';
    }


    /* Исключить участника цепочки */
    public function leaveUser($data){

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        $bd->query('DELETE FROM `chains_users` WHERE `chain_id` = ?i AND user_id = ?i', (int)$data['chain_id'], (int)$data['user_id'] );

        return 'success';
    }

    /* Исключить партнёра */
    public function leavePartner($data){

        $bd     = bd::getInstance();

        $array = array(
            'status'        => 'user',
            'part_persent'  => '0'
        );

        #Изменение статуса
        $bd->query('UPDATE `users` SET ?u WHERE id = ?i', $array , (int)$data['leave_partner'] );

        return 'success';
    }

    /* Изменить название цепочки */
    public function editName($data){

        $bd     = bd::getInstance();

        #Изменение названия
        $bd->query("UPDATE `chains_main` SET name = ?s WHERE id = ?i", $data['chain_name'] , $data['name_edit'] );

        return 'success';
    }



    /* Выбрать все цепочки */
    public function chainAll($page){

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        #Определение страницы
        if( $page == '' )$page = 1;

        #Кол-во записей на страницу
        $nastr = 10;

        #Выборка всех записей

        $count_row = $bd->getOne('SELECT COUNT(*) FROM `chains_main`');

        #Определение количества страниц
        if( $count_row > $nastr ):
            $max_page = ceil( $count_row / $nastr );
        else:
            $max_page = 1;
        endif;

        $start = ( $page * $nastr ) - $nastr;

        /* 1) ВЫБРАТЬ ВСЕ ЦЕПОЧКИ */

        $array = $bd->getAll('SELECT * FROM `chains_main` ORDER BY id DESC LIMIT ?i, ?i', $start , $nastr );

        $rows['array']      = $array;
        $rows['max_page']   = $max_page;
        $rows['this_page']  = $page;

        /* 2) ВЫБРАТЬ ID УЧАСТНИКОВ ВСЕХ ЦЕПОЧЕК */


        #Создание массива id цепочек
        $chains_id = array_column( $array , 'id');

        #Выборка всех участников цепочек
        //$users_id = $bd->getIndCol('id','SELECT * FROM `chains_users`  WHERE id IN ( ?a )', $chains_id );
        $chains_users_id = $bd->getAll('SELECT * FROM `chains_users` WHERE chain_id IN ( ?a )', $chains_id );

        #Создание массива id участников
        $users_id = array_column( $chains_users_id , 'user_id');

        #Массив фио пользователей
        $fio_array = $bd->getAll('SELECT `id`,`name`,`surname` FROM `users` WHERE id IN ( ?a )', $users_id );
        foreach ( $fio_array as $fio_array_key => $fio_array_item ):
            $fio_array_new[ $fio_array_item['id'] ] = $fio_array_item['name'].' '.$fio_array_item['surname'];
        endforeach;

        #Перебор массива цепочек и добавление участников
        foreach ( $array as $arr_key => $arr_item):

            foreach ( $chains_users_id as $chains_users_id_item):

                if ( $arr_item['id'] == $chains_users_id_item['chain_id'] ):

                    if( $chains_users_id_item['user_email'] ):
                        $array[ $arr_key ]['users'][ $chains_users_id_item['user_id'] ] = $chains_users_id_item['user_email'];
                    else:
                        $array[ $arr_key ]['users'][ $chains_users_id_item['user_id'] ] = $fio_array_new[ $chains_users_id_item['user_id'] ];
                    endif;

                endif;

            endforeach;

        endforeach;

        #Перебор добавление емайлов
        foreach ( $array as $item):
            foreach ( $item['users'] as $key => $user):
                if($user):
                    $a = 1;
                else:
                    $item['users'][$key] = 'Пользователь по email';
                endif;
            endforeach;
        endforeach;

        return $array;
    }

    /* Выбрать всех партнёров */
    public function partnersAll(){

        $bd     = bd::getInstance();

        #Изменение названия
        $array = $bd->getAll('SELECT * FROM `users` WHERE status != "user" ORDER BY id DESC');

        return $array;

    }

    /* Выбрать всех партнёров */
    public function editPercent($data){

        $bd     = bd::getInstance();

        #Изменение названия
        $array = $bd->getAll('SELECT * FROM `users` WHERE status != "user" AND id != ?i ORDER BY id DESC' , $data['edit_percent'] );

        $count_percent = 0;
        foreach ( $array as $part)
            $count_percent = $count_percent + $part['part_persent'];

        #Если сумма процентов не больше 100
        if ( $count_percent + (int)$data['percent_value'] <= 100 ):

            #Изменение процента партнёра
            $array_update = array( 'part_persent' => (int)$data['percent_value'] );
            $bd->query('UPDATE `users` SET ?u WHERE id = ?i', $array_update , (int)$data['edit_percent'] );

            $status = 'success';

        else:

            $status = 'error';

        endif;

        //$array['percent'] = $count_percent;

        return $status;

    }


}