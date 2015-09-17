<?php

namespace test;

ini_set('max_execution_time', 36000);
ini_set('memory_limit', '2000M');

require_once '../../src/UserGenerator/UserGenerator.php';

/**
 * Class UserGeneratorTest
 * work or not =)
 * @package test
 * @usage
 * @author robotomzie@gmail.com
 */
class UserGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testUserGeneratorCntTrue()
    {
        $generator = new \UserGenerator\UserGenerator();
        $generator->run(1);
        $this->assertTrue(($generator->getCountUser() == 1 ? true : false));

    }

    public function testUserGeneratorCnt()
    {
        $generator = new \UserGenerator\UserGenerator();
        $generator->run(5);
        $this->assertEquals(5, $generator->getCountUser());
        $generator->run(10);
        $this->assertEquals(10, $generator->getCountUser());

    }
}
