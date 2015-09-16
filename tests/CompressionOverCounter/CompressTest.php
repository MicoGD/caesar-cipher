<?php

namespace test;

require_once '../../src/CompressionOverCounter/CompressFactory.php';
require_once '../../src/CompressionOverCounter/CompressionOverCounter.php';

class CompressTest extends \PHPUnit_Framework_TestCase
{
    public function testCommonCompress()
    {
        $this->assertEquals('hd7g4sajsjaksj4slsl1sl1slsl1slsklkfdkfkf',
            \CompressionOverCounter\CompressFactory::makeCompressOverCounter('hddddddddgggggsajsjaksjjjjjslsllsllslsllslsklkfdkfkf')->compress());

        $this->assertEquals('g9l1k1l1k1l1k1l3ksksksk1s1k5js',
            \CompressionOverCounter\CompressFactory::makeCompressOverCounter('ggggggggggllkkllkkllkkllllkskskskksskkkkkkjs')->compress());

        $this->assertEquals('hd7g1dfjsfjsdk1dsdlsg2sajsjaksj4slsl1sl1slsl1slsklkfdkfkf',
            \CompressionOverCounter\CompressFactory::makeCompressOverCounter('hddddddddggdfjsfjsdkkdsdlsgggsajsjaksjjjjjslsllsllslsllslsklkfdkfkf')->compress());

        $this->assertEquals('hd6n8l4y3w2kdsjk1sksk1sd1g4sajsjaksj4slsl1sl1slsl1slsklkfdkfkf',
            \CompressionOverCounter\CompressFactory::makeCompressOverCounter('hdddddddnnnnnnnnnlllllyyyywwwkdsjkkskskksddgggggsajsjaksjjjjjslsllsllslsllslsklkfdkfkf')->compress());
    }
}
