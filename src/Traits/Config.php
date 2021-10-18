<?php


namespace App\Traits;

/**
 * Trait Config
 * @package App\Traits
 */
trait Config
{

    /**
     * Метод обработки файлов конфига
     * @param $string
     * @return mixed|string
     */
    protected function config($string)
    {
        if (strpos($string, '.')) {
            $pieces = explode('.',$string);
            require_once 'config/'.$pieces[0].'.php';
            $array = constant($pieces[1]);
            $key = $pieces[2];
            if (array_key_exists($key, $array)) {
                return $array[$key];
            }
        } else {
            return require_once 'config/'.$string.'.php';
        }
    }
}