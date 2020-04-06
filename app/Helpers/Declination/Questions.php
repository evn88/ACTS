<?php

namespace App\Helpers\Declination;

use Exception;

class Questions {
    /**
     * Заменяет окончание в строке с вопросом:
     * 0 - вопросов
     * 1 - вопрос
     * 2,3,4 - вопроса
     * 5,6,7,8,9,10... - вопросов
     *
     * @param string $word
     * @param int $number
     * @return string
     * @throws Exception
     */
    public static function change($number = 1, $word = "вопрос"){

        if(!is_int($number)) throw new Exception('Value is not integer: ' . $number);

        if ($number === 0 || $number >= 5 ) return $word . "ов";

        if ($number === 1) return $word;

        if ($number >= 2 && $number <= 4) return $word . "а";

    }
}
