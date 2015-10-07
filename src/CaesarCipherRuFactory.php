<?php

namespace CaesarCipherRu;

use CaesarCipherRu\CaesarCipherRu;

include 'CaesarCipherRu.php';

class CaesarCipherRuFactory
{
    public static function encode($msg, $offset)
    {
        $caesarCipherObj = new CaesarCipherRu();
        return $caesarCipherObj->encode($msg, $offset);
    }

    public static function decode($msg, $offset)
    {
        $caesarCipherObj = new CaesarCipherRu();
        return $caesarCipherObj->decode($msg, $offset);
    }

    public static function crack($msg)
    {
        $caesarCipherObj = new CaesarCipherRu();
        return $caesarCipherObj->crack($msg);
    }

}