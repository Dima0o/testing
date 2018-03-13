<? if(!defined("SECRET_Z*#(1219X*!sZZS")){header('Location: /');}

$extra = extra::getInstance();
	
class extra {

    protected static $_instance;
	private function __clone() {}
	private function __wakeup() {}
	private function __construct() {} 
    public static function getInstance() {
        if (self::$_instance === null) { self::$_instance = new self; }
		return self::$_instance;
    }

	/*Генератор паролей*/
    function generate_password($number)
    {
        $arr = array(
            'A','B','C','D','E','F',
            'G','H','I','J','K','L',
            'M','N','O','P','R','S',
            'T','U','V','X','Y','Z',
            '1','2','3','4','5','6',
            '7','8','9','0');
        // Генерируем пароль
        $pass = "";
        for($i = 0; $i < $number; $i++)
        {
            // Вычисляем случайный индекс массива
            $index = rand(0, count($arr) - 1);
            $pass .= $arr[$index];
        }
        return $pass;
    }
	
	/*br2nl*/
	public function br2nl($str)
	{
		return preg_replace('/\<br(\s*)?\/?\>/i', "\r\n", $str);
	}
	
	/*nl2brmy*/
	public function nl2br($str){
		return str_replace(array("\r\n", "\r", "\n"), "<br />", $str); ;
	}

	//Склонение слов числительных
	public function number_word($number, $suffix) {
		$keys = array(2, 0, 1, 1, 1, 2);
		$mod = $number % 100;
		$suffix_key = ($mod > 7 && $mod < 20) ? 2: $keys[min($mod % 10, 5)];
		return $suffix[$suffix_key];
	}

	//Перевод в ЧПУ
	public function translit_url ($s){
		
		$s = (string)$s;
		$s = mb_strtolower($s,'UTF-8');
		$s = strip_tags($s);
		$s = str_replace(array("\n", "\r"), " ", $s);
		$s = preg_replace("/\s+/", ' ', $s);
		$s = trim($s);
		
		$s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'', 'quot' => ''));
		$s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
		$s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
		$s = preg_replace("/-{2,99}/i", "-", $s); // очищаем строку от множетсво повторяющихся знаков минусов
		
		return $s;
		
	}


	//Сделать первую букву большой
	public function mb_ucfirst($str, $encoding='UTF-8')
    {return $str;
    	$str = mb_strtolower($str);
        $str = mb_ereg_replace('^[\ ]+', '', $str);
        $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
               mb_substr($str, 1, mb_strlen($str), $encoding);
        return $str;
    }

	//Преобразовать все ссылки в тексте
	public function link_it($text){
		$text= preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<noindex><a href=\"$3\" target=\"_blank\" rel=\"nofollow\">$3</a></noindex>", $text);
	    $text= preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<noindex><a href=\"http://$3\" target=\"_blank\" rel=\"nofollow\">$3</a></noindex>", $text);
	    //$text= preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\">$2@$3</a>", $text);
	    return($text);
	}


	//Обрезать строку по словам
	public function mbCutString($str, $length, $postfix='', $encoding='UTF-8')
	{
		if (mb_strlen($str, $encoding) <= $length) {
			return $str;
		}

		$tmp = mb_substr($str, 0, $length, $encoding);
		return mb_substr($tmp, 0, mb_strripos($tmp, ' ', 0, $encoding), $encoding) . $postfix;
	}


	//Пагинация
	public function pagination($data,$get=false){
		$limit = 4; //Сколько страниц отображать по краям
		$page = (int)$data['page'];
		$max_page = (int)$data['max_page'];
		$link = $data['link'];

		if( $get ){
			$get = http_build_query($get);
			$get = '?'.$get;
		}

		if($page < 1)
			$page = 1;
		elseif($page > $max_page)
			$page = $max_page;

		if($max_page > 1){

			$prev = $page - 1;
			if($prev < 1)
				$prev = 1;

			$next = $page + 1;
			if($next > $max_page)
				$next = $max_page;

			//Расчитываем с какой по какую страницу выводим
			$start_page = $page - $limit;
			if($start_page < 1)
				$start_page = 1;

			$end_page = $page + $limit;
			if($end_page > $max_page)
				$end_page = $max_page;


			$html = '
            <nav aria-label="Page navigation" class="text-center">
                  <ul class="pagination">
            ';
			if($page != 1):
				$html .= '
                    <li class="previous">
                      <a href="'.$link.$prev.'/'.$get.'" data-page="'.$prev.'">«</a>
                    </li>';
			endif;

			//Если ещё есть много место до начала - выводим первую страницу
			if( $start_page > 1):
				$html .= '
                    <li>
                        <a href="'.$link.'1/'.$get.'" data-page="1">1</a>
                    </li>
                ';
				if( ($start_page-1) != 1):
					$html .= '
                    <li>
                        <a href="'.$link.($start_page-1).'/'.$get.'" data-page="'.($start_page-1).'">...</a>
                    </li>
                ';
				endif;
			endif;

			for($this_page=$start_page; $this_page <= $end_page ; $this_page++) {

				if($this_page == $page){

					$html .='
                        <li class="active"><span>'.$this_page.'</span></li>
                    ';

				}else{

					$html .='
                        <li>
                          <a href="'.$link.$this_page.'/'.$get.'" data-page="'.$this_page.'">'.$this_page.'</a>
                        </li>
                    ';

				}

			}

			//Если ещё есть много до конца - выводим посленюю страницу
			if( $end_page < $max_page):
				if($this_page != $max_page):
					$html .= '
                        <li>
                            <a href="'.$link.$this_page.'/'.$get.'" data-page="'.$this_page.'">...</a>
                        </li>
                    ';
				endif;
				$html .= '
                    <li>
                        <a href="'.$link.$max_page.'/'.$get.'" data-page="'.$max_page.'">'.$max_page.'</a>
                    </li>
                ';
			endif;

			if($next > $page):
				$html .= '
                    <li class="next">
                      <a href="'.$link.$next.'/'.$get.'" data-page="'.$next.'">»</a>
                    </li>
                ';
			endif;

			$html .= '</ul>
                </nav>';

			return $html;
		}

		return false;
	}

}

?>