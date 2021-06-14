<?php
namespace Helper;

use Faker\Provider\Base;

/**
 * Класс кастомного Фейкера
 */
class CustomFakerProvider extends Base
{
    public function getRandomCardNumber(){
        return sprintf(
            '%d%d%d%d', 
            random_int(100,999),
            random_int(100,999),
            random_int(100,999),
            random_int(100,999)
        );
    }
}