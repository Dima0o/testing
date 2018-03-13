<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

$products = products::getInstance();

class products {

    protected static $_instance;
    private function __clone() {}
    private function __wakeup() {}
    private function __construct() {}
    public static function getInstance() {
        if (self::$_instance === null) { self::$_instance = new self; }
        return self::$_instance;
    }

    /* Добавление файла */
    public function productAdd($data){

        $bd     = bd::getInstance();
        $files  = files::getInstance();

        $ras =  end(explode(".", $_FILES['files']['name']));
        $new_file_name =  md5( end( explode( ".", microtime() ) ) ) .'.'.$ras;

        copy($_FILES['files']['tmp_name'], 'uploads/'.$new_file_name);

        $array = array(
            'name'      => $data['name'],
            'category'  => $data['category'],
            'price'     => $data['price'],
            'info'      => $data['info'],
            'img'       => '/uploads/'.$new_file_name
        );

        if($bd->query('INSERT INTO `products` SET ?u',$array)):
            $status = 'success';
        else:
            $status = 'error';
        endif;

        return $status;
    }

    /* Выбрать все товары */
    public function productAll($category, $page){

        $bd     = bd::getInstance();

        $nastr = 5;

        if( $category == 'all' ):
            $count_row = $bd->getOne('SELECT COUNT(*) FROM `products`');
        else:
            $count_row = $bd->getOne('SELECT COUNT(*) FROM `products` WHERE `category` = ?s', $category );
        endif;

        if( $count_row > $nastr ):
            $max_page = ceil( $count_row / $nastr );
        else:
            $max_page = 1;
        endif;

        $start = ( $page * $nastr ) - $nastr;

        if( $category == 'all' ):
            $array = $bd->getAll('SELECT * FROM `products` ORDER BY id DESC LIMIT ?i, ?i', $start , $nastr );
        else:
            $array = $bd->getAll('SELECT * FROM `products` WHERE `category` = ?s  ORDER BY id DESC LIMIT ?i, ?i', $category, $start , $nastr );
        endif;

        $rows['array']      = $array;
        $rows['max_page']   = $max_page;
        $rows['this_page']  = $page;

        return $rows;
    }

    /* Выбрать один товары */
    public function productGetOne($data){

        $bd     = bd::getInstance();

        $row = $bd->getRow('SELECT * FROM `products` WHERE id = ?i', $data);

        return $row;
    }

    /* Изменить товары */
    public function productEdit($data){

        $bd     = bd::getInstance();

        $array = array(
            'name'      => $data['name'],
            'category'  => $data['category'],
            'price'     => $data['price'],
            'info'      => $data['info']
        );

        if( $_FILES['files']['size'] > 0 ):

            $ras =  end(explode(".", $_FILES['files']['name']));
            $new_file_name =  md5( end( explode( ".", microtime() ) ) ) .'.'.$ras;

            copy($_FILES['files']['tmp_name'], 'uploads/'.$new_file_name);

            $array = array( 'img' => '/uploads/'.$new_file_name );

        endif;



        if( $bd->query('UPDATE `products` SET ?u WHERE `id`=?i',$array, $data['product_id'] ) ):
            $status = 'success';
        else:
            $status = 'error';
        endif;

        return $status;

    }

    /* Удаление товара */
    public function productDelete($data){

        $bd     = bd::getInstance();

        if( $bd->query('DELETE FROM `products` WHERE `id` = ?i', (int)$data['product_id']) ):
            $status = 'success';
        else:
            $status = 'error';
        endif;

        return $status;

    }





}