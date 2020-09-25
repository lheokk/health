<?php
    /**
     * Сюда писать наши стандартные функции
     */


    /**
     * Форматирует дату. Время по Калининграду
     */
    function FormatDate($timestamp)
    {
        if ($timestamp)
            return gmdate("Y-m-d H:i", $timestamp + 3 * 60 * 60);
        return '-';
    }

	/**
     * Функция превода ссылки с кириллицы в траскрипт
     */
	function TranslitLink($str)
    {
        $tr = array(
            "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
            "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
            "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
            "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
            "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
            "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
            "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
            "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
            "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"," "=>"_"
        );
        return strtr($str,$tr);
    }

	/**
     * Функция превода текста с кириллицы в траскрипт
     */
	function Translit($str)
    {
        $tr = array(
            "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
            "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
            "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
            "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
            "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
            "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
            "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
            "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
            "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"
        );
        return strtr($str,$tr);
    }

	function MsgOkAdmin($text)
	{
		return  '<script>
			$(function() {
			  Notifications.push({
				imagePath: "/i/image/admin/ok.png",
				text: "<div>' . $text . '</div>",
				autoDismiss: 10
			  });
			}).call(this);
		</script>';
	}

	function MsgErrAdmin($text)
	{
		return '<script>
			$(function() {
			  Notifications.push({
				imagePath: "/i/image/admin/error.png",
				text: "<div>' . $text . '</div>",
				autoDismiss: 10
			  });
			}).call(this);
		</script>';
	}

	/**
     * Стандартный вывод float-числа
     *
     * @param $value - число
     * @param $mustBe - если true то показывать число даже если нули т.е. в виде: 1.00 если false то в таком случае вернёт 1
     */
    function FormatFloat($value, $mustBe = false)
    {
        if ($mustBe)
        {
            return sprintf("%01.2f", $value);
        }
        return number_format($value, 2, '.', '');
    }

        /**
     * Возвращает расширение файла
     *
     * @param $filename - имя файла
     */
    function GetExt($filename)
    {
        return substr(strrchr($filename, '.'), 1);
    }

    function BoldLastWord($str)
    {
        return (strpos($str, ' ') === false)
                ? '<b>' . $str . '</b>'
                : substr($str, 0, (strrpos($str, ' '))) . ' <b>' . substr(strrchr($str, ' '), 1) . '</b>';
    }

    function RusMonth($timestamp, $format = false)
    {
        $key = $format ? 'format' : 'notFormat';
        
        $month['notFormat'] = array(
            '1'  => 'Я Н В А Р Ь',
            '2'  => 'Ф Е В Р А Л Ь',
            '3'  => 'М А Р Т',
            '4'  => 'А П Р Е Л Ь',
            '5'  => 'М А Й',
            '6'  => 'И Ю Н Ь',
            '7'  => 'И Ю Л Ь',
            '8'  => 'А В Г У С Т',
            '9'  => 'С Е Н Т Я Б Р Ь',
            '10' => 'О К Т Я Б Р Ь',
            '11' => 'Н О Я Б Р Ь',
            '12' => 'Д Е К А Б Р Ь'
         );

        $month['format'] = array(
            '1' => 'ЯНВАРЯ',
            '2' => 'ФЕВРАЛЯ',
            '3' => 'МАРТА',
            '4' => 'АПРЕЛЯ',
            '5' => 'МАЯ',
            '6' => 'ИЮНЯ',
            '7' => 'ИЮЛЯ',
            '8' => 'АВГУСТА',
            '9' => 'СЕНТЯБРЯ',
            '10' => 'ОКТЯБРЯ',
            '11' => 'НОЯБРЯ',
            '12' => 'ДЕКАБРЯ'
         );

        return $month[$key][date("n", $timestamp)];
    }
    
    function ReturnNSymbols ($str, $count)
    {
        $str = strip_tags($str);
        $flag = 0;
        if (mb_strlen($str) > $count)
        {
            $str = mb_substr($str, 0, $count) . ' ...';
            $flag = 1;
        }
        return $str;
    }

?>
