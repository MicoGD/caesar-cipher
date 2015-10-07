<?php

namespace test;

use CaesarCipherRu\CaesarCipherRuFactory;

include '../src/CaesarCipherRuFactory.php';

class CaesarCipherTest extends \PHPUnit_Framework_TestCase
{
    public function testEncode()
    {
        $this->assertEquals('жгшкзнзэ', CaesarCipherRuFactory::encode('окейгугл', 3));
        $this->assertEquals('ж ьоьо гдбьбщоэ гдбьбщоэ', CaesarCipherRuFactory::encode('о мама криминал криминал', 3));
        $this->assertEquals('цячущя эшббщйн цзщбц', CaesarCipherRuFactory::encode('только русский текст', 5));
    }


    public function testDecode()
    {
        $this->assertEquals('точько русский текст', CaesarCipherRuFactory::decode('цячущя эшббщйн цзщбц', 5));
    }

    public function testCrack()
    {
        $this->assertEquals('точько русский текст', CaesarCipherRuFactory::crack('цячущя эшббщйн цзщбц'));
        $this->assertEquals('мамаша твоя дотер', CaesarCipherRuFactory::crack('лщлщйщ жшъп ыъжьх'));
    }
}
