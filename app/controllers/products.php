<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

#Подключение классов
//require_once 'app/models/panel/products.php';
require_once 'app/models/bd.php';
require_once 'app/models/files.php';

//Добавление товара
if(isset($_POST['product_add'])):
    $result = $products->productAdd($_POST);
    header('Location: '.$config["admin_path"].'products/add/'.$result.'/');
    exit();
endif;

//Изменение товара
if(isset($_POST['product_edit'])):
    $result = $products->productEdit($_POST);
    header('Location: '.$config["admin_path"].'products/edit/'.$_POST['product_id'].'/'.$result.'/');
    exit();
endif;

//Удаление товар
if(isset($_POST['product_delete'])):
    $result = $products->productDelete($_POST);
    header('Location: '.$config["admin_path"].'products/category/all/');
    exit();
endif;

//Выбрать товар для редактирования
if( $this->GET[0] == 'edit' ):
    $edit_row = $products->productGetOne( $this->GET[1] );
endif;

//Выборка всех товаров
if( $this->GET[0] == 'category' OR $this->GET[0] == 'all' ):

    $category = $this->GET[1];

    if( isset( $this->GET[2] ) ):
        $page = $this->GET[2];
    else:
        $page = 1;
    endif;

    $products_rows = $products->productAll( $category, $page );

    //print_r($products_rows);

endif;

#Данные которые передаются в шаблон
$variables = array(
    'title'     => 'Товары',
    'edit_row'  => $edit_row,
    'products'  => $products_rows
);

#Отрисовка шаблона
$view->set_variables($variables);
$view->render();