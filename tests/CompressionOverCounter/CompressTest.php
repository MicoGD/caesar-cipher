<?php

namespace test;

require_once '../../src/CompressionOverCounter/CompressFactory.php';
require_once '../../src/CompressionOverCounter/CompressionOverCounter.php';

class CompressTest extends \PHPUnit_Framework_TestCase
{
    public function testCommonCompress()
    {
        $this->assertEquals('h85sajsjaks5sls2s2sls2slsklkfdkfkf',
            \CompressionOverCounter\CompressFactory::makeCompressOverCounter('hddddddddgggggsajsjaksjjjjjslsllsllslsllslsklkfdkfkf')->compress());
    }
}
