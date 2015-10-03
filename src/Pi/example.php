<?php
/**
 * Change this option
 */
ini_set('memory_limit', '1024M');

use Pi\PiFinder;

require_once 'PiFinder.php';

$tt = new PiFinder('/Users/robotomize/Desktop/pi-10million.txt', '2148400');
print $tt->run();
