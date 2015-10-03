<?php

namespace test;

use Pi\PiFactory;

require_once '../../src/Pi/PiFactory.php';

/**
 * Class PiCalcTest
 *
 * @package test
 * @author robotomize@gmail.com
 */
class PiCalcTest extends \PHPUnit_Framework_TestCase
{
    /**
     * pi - 10 numbers
     */
    public function testPi10()
    {
        $this->assertEquals('3.1415926535', (string)PiFactory::makePi(10)->bcPi());
    }

    /**
     * pi - 100 numbers
     */
    public function testPi100()
    {
        $this->assertEquals('3.1415926535897932384626433832795028841971693993751058209749445923078164062862089986280348253421170679', (string)PiFactory::makePi(100)->bcPi());
    }

    /**
     * pi - 1000 numbers
     */
    public function testPi1000()
    {
        $this->assertEquals(1002, (int)strlen(PiFactory::makePi(1000)->bcPi()));
    }

    /**
     * @throws \Exception
     */
    public function testPi()
    {
        $this->assertTrue(PiFactory::makePi(rand(0, 99))->bcPi() != '' ? true : false);
    }

}
