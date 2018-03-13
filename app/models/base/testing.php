<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

$testing = testing::getInstance();

class testing {

    protected static $_instance;
    private function __clone() {}
    private function __wakeup() {}
    private function __construct() {}
    public static function getInstance() {
        if (self::$_instance === null) { self::$_instance = new self; }
        return self::$_instance;
    }

    /* Выборка тестов */
    public function testingAll(){

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        #Выборка тестов
        $testing_array = $bd->getAll('SELECT * FROM `testing_main`');

        #Создание массива id цепочек
        $testing_id = array_column( $testing_array , 'id');

        #Проверка есть ли активные тесты
        //$active_status_array = $bd->getAll('SELECT * FROM `testing_users` WHERE user_id = ?i AND status = 0 AND testing_id IN ( ?a )', $user->data['id'], $testing_id );

        #Добавление статуса в массив
        foreach ( $testing_array as $testing_key => $testing):

            $active_rows = $bd->getAll('SELECT `id` FROM `testing_users` WHERE user_id = ?i AND status = 0 AND testing_id = ?i', $user->data['id'], $testing['id'] );

            if ( count($active_rows) > 0 ):
                $testing_array[ $testing_key ]['status'] = 'active';
            else:
                $testing_array[ $testing_key ]['status'] = 'not_active';
            endif;

            unset($active_rows);
            unset( $testing_array[ $testing_key ]['tmp']);

//            foreach ( $active_status_array as $active_key => $active_test ):
//                if ( $testing['id'] == $active_key )
//                    $testing_array[ $testing_key ]['status'] = '1';
//                        else
//                            $testing_array[ $testing_key ]['status'] = '0';
        endforeach;

        #Выборка всех участников цепочек
        $completed_testing = $bd->getAll('SELECT * FROM `testing_users` WHERE user_id = ?i AND status = 1 AND testing_id IN ( ?a )', $user->data['id'], $testing_id );

        #Добавление результатов тестов в массив
        foreach ( $testing_array as $testing_key => $testing)
            foreach ( $completed_testing as $com_test )
                if ( $testing['id'] == $com_test['testing_id'] )
                    $testing_array[ $testing_key ]['completed'][] = $com_test;


        return $testing_array;

    }

    /* Купить тест */
    public function buyTest($data){

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        global $config;

        #Определение стоимость теста
        if( $user->data['code'] == '' ):
            $price = $config['price_main'];
        else:
            $price = $config['price_sale'];
        endif;

        #Если хватает денег
        if ( $user->data['balance'] >= $price ):

            #Выбрать шаблон теста
            $sql_array = $bd->getAll('SELECT * FROM `testing_main` WHERE name = ?s ', $data['buy_test'] );

            #Добавить пользователю активный тет
            $array = array(
                'user_id'       => (int)$user->data['id'],
                'testing_id'    => (int)$data['buy_test']
                //'tmp'           => $sql_array['tmp']
            );
            $bd->query('INSERT INTO `testing_users` SET ?u', $array );

            #Списание средств
            $bd->query("UPDATE `users` SET balance = balance - ?i WHERE id = ?i", $price , $user->data['id'] );

//            $insert_id = $bd->insertId();
//            $array = array(
//                'user_id'       => $user->data['id'],
//                'testing_id'    => $sql_array['id']
////                'status'        => '0',
////                'tmp'           => $sql_array['tmp']
//            );
//            $bd->query("INSERT INTO `testing_users` SET ?u", $array );

        endif;

        return (int)$user->data['id'].'__'.(int)$sql_array['id'];

    }

    /* Обработка тестов */
    public function completeTest( $url , $id ){

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        #Запись теста в результаты
        #Закрытие доступа к тесту
        $array = array(
            'status' => 1,
            'date'   => date('d:m:Y H:i'),
            'file'   => $url
        );
        $bd->query("UPDATE `testing_users` SET ?u WHERE user_id = ?i AND testing_id = ?i AND status = 0", $array , $user->data['id'], $id );

        //$rows = $bd->getAll('SELECT * FROM `testing_main`');

        return true;
    }

    /*Запись результатов в файл */
    public function generateTest($data){

        $bd     = bd::getInstance();
        $user   = user::getInstance();

        //$rows = $bd->getAll('SELECT * FROM `testing_main`');
        return $rows;
    }

    /* TEST 22-13 №1*/
    public function test_22_13($data){

        $bd         = bd::getInstance();
        $user       = user::getInstance();

        #Инициализация библиотеки
        $PHPWord = new PHPWord();
        $document = $PHPWord->loadTemplate('uploads/testing_tmp/22_13_tmp.docx');

    /* ОБРАБОТКА ДАННЫХ - НАЧАЛО */

        $array = array();

        #Творнческий
        $array[1] = $data['1'] + $data['2'] + $data['3'] + $data['4'];

        #Оптимистичный
        $array[2] = $data['5'] + $data['6'] + $data['7'] + $data['8'];

        #Целенаправленный
        $array[3] = $data['9'] + $data['10'] + $data['11'] + $data['12'];

        #Формально направленный
        $array[4] = $data['13'] + $data['14'] + $data['15'] + $data['16'];

        #Сопереживающий
        $array[5] = $data['17'] + $data['18'] + $data['19'] + $data['20'];

        #Опасливый
        $array[6] = $data['21'] + $data['22'] + $data['23'] + $data['24'];

        #Экспрессивно-экспансивный
        $array[7] = $data['25'] + $data['26'] + $data['27'] + $data['28'];

        #Сортировка в порядке убывания
        arsort($array);

    /* ОБРАБОТКА ДАННЫХ - КОНЕЦ*/

        #Переменные для Ворда

        $document->setValue('fio', $user->data['surname']." ".$user->data['name'] );
        $document->setValue('year', $user->data['birth_day'].".".$user->data['birth_month'].".".$user->data['birth_year']."г.");

        $num = 0;

        foreach ( $array as $index => $item ) :

            $num = $num + 1;

            $document->setValue('a_'.$num , $index);
            $document->setValue('b_'.$num , $item);

        endforeach;

//        $document->setValue('Value1', 'Sun');
//        $document->setValue('Value1', 'Sun');
//        $document->setValue('weekday', date('l'));
//        $document->setValue('time', date('H:i'));

        #Сохрание документа
        $random_number = rand(1000,9999);
        $document->save('uploads/testing_user/test_'.$random_number.'.docx');

        $this->completeTest( '/uploads/testing_user/test_'.$random_number.'.docx' , 1 );

//        #Автоматическое скачивание файлов
//        $file = 'uploads/testing_user/test_'.rand(111,999).'.docx';
//        header('X-Accel-Redirect: ' . $file);
//        header('Content-Type: application/octet-stream');
//        header('Content-Disposition: attachment; filename=' . basename($file));

        return true;

    }

    /* TEST 22-13 №2 */
    public function test_27_13($data){

        $bd         = bd::getInstance();
        $user       = user::getInstance();

        #Инициализация библиотеки
        $PHPWord = new PHPWord();
        $document = $PHPWord->loadTemplate('uploads/testing_tmp/27_13_tmp.docx');

    /* ОБРАБОТКА ДАННЫХ - НАЧАЛО */

        $json = '
            {
                "vlast": {"1": "\u0411","4": "\u0410","21": "\u0410","24": "\u0411","32": "\u0410","41": "\u0411","47": "\u0411","52": "\u0410","64": "\u0411","77": "\u0410","93": "\u0411","108": "\u0410","123": "\u0410","151": "\u0411","156": "\u0410","163": "\u0411","169": "\u0410","177": "\u0410","190": "\u0410","194": "\u0411"},
                "norm_deyat": {"8": "\u0410","10": "\u0411","20": "\u0411","33": "\u0410","42": "\u0411","55": "\u0410","65": "\u0411","78": "\u0410","96": "\u0411","110": "\u0410","115": "\u0410","123": "\u0411","134": "\u0411","150": "\u0410","157": "\u0410","171": "\u0410","183": "\u0410","193": "\u0410","196": "\u0411","201": "\u0411"},
                "vremya": {"2": "\u0410","9": "\u0410","23": "\u0411","34": "\u0410","43": "\u0411","49": "\u0411","56": "\u0410","63": "\u0411","69": "\u0411","86": "\u0411","103": "\u0411","111": "\u0410","115": "\u0411","126": "\u0410","146": "\u0410","151": "\u0410","172": "\u0411","174": "\u0410","202": "\u0411","209": "\u0411"},
                "ogovor_rez": {"12": "\u0410","25": "\u0411","36": "\u0411","44": "\u0411","66": "\u0410","70": "\u0411","82": "\u0410","92": "\u0411","106": "\u0410","112": "\u0410","118": "\u0411","126": "\u0411","141": "\u0411","143": "\u0410","154": "\u0410","169": "\u0411","176": "\u0410","189": "\u0411","193": "\u0411","208": "\u0410"},
                "minimiz_usil": {"14": "\u0410","26": "\u0411","37": "\u0410","54": "\u0410","58": "\u0410","84": "\u0410","104": "\u0411","112": "\u0411","119": "\u0411","132": "\u0411","139": "\u0410","145": "\u0411","152": "\u0410","159": "\u0411","164": "\u0411","174": "\u0411","190": "\u0411","196": "\u0410","203": "\u0410","205": "\u0411"},
                "sob_prin": {"7": "\u0410","27": "\u0411","38": "\u0410","45": "\u0411","59": "\u0410","67": "\u0411","71": "\u0411","85": "\u0410","108": "\u0411","118": "\u0410","121": "\u0411","131": "\u0410","133": "\u0411","137": "\u0411","150": "\u0411","152": "\u0411","161": "\u0410","167": "\u0410","181": "\u0410","202": "\u0410"},
                "soc_lico": {"16": "\u0410","19": "\u0411","29": "\u0411","40": "\u0410","64": "\u0410","73": "\u0411","80": "\u0410","86": "\u0410","90": "\u0411","110": "\u0411","119": "\u0410","128": "\u0410","137": "\u0410","147": "\u0411","162": "\u0411","170": "\u0411","179": "\u0410","184": "\u0411","197": "\u0411","208": "\u0411"},
                "ocenka_nefor_grup": {"18": "\u0410","31": "\u0411","41": "\u0410","48": "\u0411","65": "\u0410","74": "\u0411","90": "\u0410","98": "\u0410","107": "\u0411","111": "\u0411","121": "\u0410","125": "\u0411","129": "\u0411","138": "\u0410","143": "\u0411","149": "\u0410","159": "\u0410","180": "\u0410","185": "\u0410","191": "\u0411"},
                "formal_struk": {"18": "\u0411","24": "\u0410","40": "\u0411","42": "\u0410","59": "\u0411","69": "\u0410","75": "\u0411","92": "\u0410","97": "\u0411","114": "\u0410","124": "\u0411","127": "\u0411","132": "\u0410","135": "\u0411","160": "\u0410","175": "\u0411","182": "\u0410","188": "\u0410","198": "\u0410","204": "\u0411"},
                "prichast_vlast": {"5": "\u0411","13": "\u0410","16": "\u0411","20": "\u0410","38": "\u0411","43": "\u0410","58": "\u0411","70": "\u0410","76": "\u0411","79": "\u0410","93": "\u0410","95": "\u0411","101": "\u0411","109": "\u0411","116": "\u0410","129": "\u0410","136": "\u0411","160": "\u0411","186": "\u0410","199": "\u0410"},
                "tradic_org": {"7": "\u0411","23": "\u0410","37": "\u0411","44": "\u0410","62": "\u0411","77": "\u0411","88": "\u0410","97": "\u0410","100": "\u0411","105": "\u0411","122": "\u0410","130": "\u0411","134": "\u0410","140": "\u0411","162": "\u0410","165": "\u0411","180": "\u0411","187": "\u0410","199": "\u0411","206": "\u0410"},
                "sob_bezop": {"14": "\u0411","25": "\u0410","56": "\u0411","71": "\u0410","78": "\u0411","91": "\u0411","94": "\u0410","98": "\u0411","102": "\u0410","122": "\u0411","135": "\u0410","142": "\u0411","153": "\u0410","158": "\u0410","163": "\u0410","166": "\u0410","179": "\u0411","186": "\u0411","195": "\u0411","200": "\u0411"},
                "ust_bezop": {"12": "\u0411","26": "\u0410","34": "\u0411","45": "\u0410","51": "\u0410","55": "\u0411","68": "\u0411","73": "\u0410","83": "\u0411","99": "\u0410","117": "\u0411","136": "\u0410","148": "\u0411","156": "\u0411","166": "\u0411","173": "\u0410","178": "\u0410","182": "\u0411","191": "\u0410","206": "\u0411"},
                "nov_goriz": {"9": "\u0411","19": "\u0410","27": "\u0410","30": "\u0411","33": "\u0411","52": "\u0411","60": "\u0410","72": "\u0410","74": "\u0410","82": "\u0411","89": "\u0410","101": "\u0410","140": "\u0410","144": "\u0411","155": "\u0411","164": "\u0410","173": "\u0411","192": "\u0411","195": "\u0410","204": "\u0410"},
                "stabil_org": {"5": "\u0410","8": "\u0411","15": "\u0410","29": "\u0410","32": "\u0411","48": "\u0410","50": "\u0411","53": "\u0411","75": "\u0410","81": "\u0410","84": "\u0411","103": "\u0410","113": "\u0410","131": "\u0411","142": "\u0410","148": "\u0410","168": "\u0410","176": "\u0411","187": "\u0411","192": "\u0410"},
                "kariera": {"4": "\u0411","31": "\u0410","35": "\u0410","49": "\u0410","57": "\u0410","61": "\u0410","76": "\u0410","85": "\u0411","87": "\u0411","99": "\u0411","104": "\u0410","113": "\u0411","144": "\u0410","153": "\u0411","165": "\u0410","171": "\u0411","184": "\u0410","189": "\u0410","198": "\u0411","207": "\u0411"},
                "mat_interes": {"3": "\u0410","11": "\u0411","15": "\u0411","30": "\u0410","39": "\u0411","51": "\u0411","91": "\u0410","100": "\u0410","109": "\u0410","114": "\u0411","120": "\u0410","125": "\u0410","128": "\u0411","133": "\u0410","139": "\u0411","141": "\u0410","146": "\u0411","177": "\u0411","201": "\u0410","207": "\u0410"},
                "obyaz_drugih": {"3": "\u0411","13": "\u0411","22": "\u0410","28": "\u0410","47": "\u0410","57": "\u0411","63": "\u0410","66": "\u0411","81": "\u0411","89": "\u0411","102": "\u0411","117": "\u0410","124": "\u0410","130": "\u0410","149": "\u0411","157": "\u0411","170": "\u0410","181": "\u0411","203": "\u0411","210": "\u0410"},
                "stab_trud": {"2": "\u0411","10": "\u0410","17": "\u0411","21": "\u0411","36": "\u0410","46": "\u0411","54": "\u0411","62": "\u0410","67": "\u0410","80": "\u0411","87": "\u0410","95": "\u0410","107": "\u0410","120": "\u0411","155": "\u0410","168": "\u0411","178": "\u0411","188": "\u0411","200": "\u0410","210": "\u0411"},
                "stab_deyat": {"1": "\u0410","6": "\u0410","11": "\u0410","22": "\u0411","35": "\u0411","46": "\u0410","53": "\u0410","60": "\u0411","68": "\u0410","79": "\u0411","88": "\u0411","96": "\u0410","106": "\u0411","145": "\u0410","158": "\u0411","167": "\u0411","175": "\u0410","185": "\u0411","197": "\u0410","209": "\u0410"},
                "visok_zarab": {"6": "\u0411","17": "\u0410","28": "\u0411","39": "\u0410","50": "\u0410","61": "\u0411","72": "\u0411","83": "\u0410","94": "\u0411","105": "\u0410","116": "\u0411","127": "\u0410","138": "\u0411","147": "\u0410","154": "\u0411","161": "\u0411","172": "\u0410","183": "\u0411","194": "\u0410","205": "\u0410"
                }
            }
        ';

        #Преобразование в массив
        $array = json_decode( $json , true );

        #Подсчёт совпадений
        $new_array = array();
        foreach ($array as $key => $item)
            foreach ($array[$key] as $i => $value)
                if( $value === $_POST[$i])
                    $new_array[$key] = $new_array[$key] + 1;

        #Сортировка по возрастанию
        asort($new_array);

        #Расчёт места и ранга
        foreach ( $new_array as $n_key => $n_value):

            if( $place !== $n_value ):
                $num   = $num + 1;
                $place = $n_value;
            endif;

            $n_arr = array(
                'place' => $num,
                'points' => $n_value
            );

            $new_array[$n_key] = $n_arr;

        endforeach;

    /* ОБРАБОТКА ДАННЫХ - КОНЕЦ*/


    /* СОЗДАНИЕ ДОКУМЕНТА - НАЧАЛО*/

        #ФИО и дата
        $document->setValue('fio', $user->data['surname']." ".$user->data['name'] );
        $document->setValue('year', $user->data['birth_day'].".".$user->data['birth_month'].".".$user->data['birth_year']."г.");

        $document->setValue('1_1',  $new_array['vlast']['place'] );             $document->setValue('2_1',  $new_array['vlast']['points'] );
        $document->setValue('1_2',  $new_array['norm_deyat']['place'] );        $document->setValue('2_2',  $new_array['norm_deyat']['points'] );
        $document->setValue('1_3',  $new_array['vremya']['place'] );            $document->setValue('2_3',  $new_array['vremya']['points'] );
        $document->setValue('1_4',  $new_array['ogovor_rez']['place'] );        $document->setValue('2_4',  $new_array['ogovor_rez']['points'] );
        $document->setValue('1_5',  $new_array['minimiz_usil']['place'] );      $document->setValue('2_5',  $new_array['minimiz_usil']['points'] );
        $document->setValue('1_6',  $new_array['sob_prin']['place'] );          $document->setValue('2_6',  $new_array['sob_prin']['points'] );
        $document->setValue('1_7',  $new_array['soc_lico']['place'] );          $document->setValue('2_7',  $new_array['soc_lico']['points'] );
        $document->setValue('1_8',  $new_array['ocenka_nefor_grup']['place'] ); $document->setValue('2_8',  $new_array['ocenka_nefor_grup']['points'] );
        $document->setValue('1_9',  $new_array['formal_struk']['place'] );      $document->setValue('2_9',  $new_array['formal_struk']['points'] );
        $document->setValue('1_10', $new_array['prichast_vlast']['place'] );    $document->setValue('2_10', $new_array['prichast_vlast']['points'] );
        $document->setValue('1_11', $new_array['tradic_org']['place'] );        $document->setValue('2_11', $new_array['tradic_org']['points'] );
        $document->setValue('1_12', $new_array['sob_bezop']['place'] );         $document->setValue('2_12', $new_array['sob_bezop']['points'] );
        $document->setValue('1_13', $new_array['ust_bezop']['place'] );         $document->setValue('2_13', $new_array['ust_bezop']['points'] );
        $document->setValue('1_14', $new_array['nov_goriz']['place'] );         $document->setValue('2_14', $new_array['nov_goriz']['points'] );
        $document->setValue('1_15', $new_array['stabil_org']['place'] );        $document->setValue('2_15', $new_array['stabil_org']['points'] );
        $document->setValue('1_16', $new_array['kariera']['place'] );           $document->setValue('2_16', $new_array['kariera']['points'] );
        $document->setValue('1_17', $new_array['mat_interes']['place'] );       $document->setValue('2_17', $new_array['mat_interes']['points'] );
        $document->setValue('1_18', $new_array['obyaz_drugih']['place'] );      $document->setValue('2_18', $new_array['obyaz_drugih']['points'] );
        $document->setValue('1_19', $new_array['stab_trud']['place'] );         $document->setValue('2_19', $new_array['stab_trud']['points'] );
        $document->setValue('1_20', $new_array['stab_deyat']['place'] );        $document->setValue('2_20', $new_array['stab_deyat']['points'] );
        $document->setValue('1_21', $new_array['visok_zarab']['place'] );       $document->setValue('2_21', $new_array['visok_zarab']['points'] );

//        #Сохрание документа
//        $document->save('uploads/testing_user/test_'.rand(111,999).'.docx');

        #Сохрание документа
        $random_number = rand(1000,9999);
        $document->save('uploads/testing_user/test_'.$random_number.'.docx');

        $this->completeTest( '/uploads/testing_user/test_'.$random_number.'.docx' , 2 );

    /* СОЗДАНИЕ ДОКУМЕНТА - КОНЕЦ*/

        return true;

    }









    /* ШАБЛОН TEST 00-00 */
    public function TMP_test_00_00($data){

        $bd         = bd::getInstance();
        $user       = user::getInstance();

        #Инициализация библиотеки
        $PHPWord = new PHPWord();
        $document = $PHPWord->loadTemplate('uploads/testing_tmp/22_13_tmp.docx');

        /* ОБРАБОТКА ДАННЫХ - НАЧАЛО */


        /* ОБРАБОТКА ДАННЫХ - КОНЕЦ*/


        /* СОЗДАНИЕ ДОКУМЕНТА - НАЧАЛО*/

        #ФИО и дата
        $document->setValue('fio', $user->data['surname']." ".$user->data['name'] );
        $document->setValue('year', $user->data['birth_day'].".".$user->data['birth_month'].".".$user->data['birth_year']."г.");

        $document->setValue('a_'.$num , $index);

        #Сохрание документа
        $document->save('uploads/testing_user/test_'.rand(111,999).'.docx');

        /* СОЗДАНИЕ ДОКУМЕНТА - КОНЕЦ*/

        return true;

    }


}