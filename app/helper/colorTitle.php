<?php 
namespace App\helper;
class colorTitle
{
    public static function black($string)
    {
        return str_replace(array('[', ']'), array('<span>' , '</span>') ,$string);
    }

    public static function back($string)
    {
        return str_replace(array('<span>' , '</span>'),array('[', ']') ,$string);
    }

  }