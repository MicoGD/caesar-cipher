<?php

use Pi\PiFinder;

require_once 'PiFinder.php';

$tt = new PiFinder('pi-10million.txt', '2148400');
$tt->runParse();
