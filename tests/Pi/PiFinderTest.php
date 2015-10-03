<?php

namespace test;

use Pi\PiFinder;

/**
 * Change this option
 */
ini_set('memory_limit', '2048M');

require_once '../../src/Pi/PiFinder.php';

class PiFinderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * True
     */
    public function testGetTest()
    {
        $tt = new PiFinder('/Users/robotomize/Desktop/pi-10million.txt', '92');
        $tt->run();
        $this->assertTrue($tt->getShiftIndex() == 5 ? true : false);
    }


    /**
     * Equals
     */
    public function testGetMoreFinder()
    {
        $tt = new PiFinder('/Users/robotomize/Desktop/pi-10million.txt', '2148400');
        $tt->run();
        $this->assertEquals('5164418', $tt->getShiftIndex());
        $tt->setMatcher('92');
        $tt->run();
        $this->assertEquals('5', $tt->getShiftIndex());
    }
}
