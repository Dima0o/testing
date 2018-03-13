<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

#Переключение пежду кабинетом и главной
$_SESSION['place'] = 'cabinet';

#Подключение библиотери Word
require_once 'app/models/WORD/PHPWord.php';

#Подключение классов
require_once 'app/models/base/testing.php';


//Обработка результатовтеста
if ( isset( $_POST['testing_end'] ) ):

    //print_r($_POST);

    #Выбор названия теста и удаления
    $test_name = $_POST['testing_end'];
    unset( $_POST['testing_end'] );

    #Выбор функции обработки теста
    switch ( $test_name ) :
        case '1':
            $result = $testing->test_22_13($_POST);
            break;
        case '2':
            $result = $testing->test_27_13($_POST);
            break;
        case 'шоколадка':
            echo "i это шоколадка";
            break;
    endswitch;

    /* Обработка теста */

    header('Location: /testing/');
    exit;
endif;




//Купить тест
if ( isset( $_POST['buy_test'] ) ):
    $result = $testing->buyTest($_POST);
    //echo $result;
    //print_r($_POST);
    header('Location: /testing/');
    exit;
endif;

//Выборка всех тестов
if( $this->GET[0] == '' ):
    $testing_rows = $testing->testingAll();
endif;

//Расчёт стоимости 1го теста, есть ли код приглашения
if( $user->data['code'] == '' ):
    $price = $config['price_main'];
else:
    $price = $config['price_sale'];
endif;

#Данные которые передаются в шаблон
$variables = array(
    'title'         => 'Тестирование',
    'price'         => $price,
    'testing_rows'  => $testing_rows
);

#Отрисовка шаблона
$view->set_variables($variables);
$view->render();