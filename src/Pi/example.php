<?php

use Pi\PiFactory;

require_once 'PiFactory.php';

$tt  = PiFactory::makePi(4000)->bcPi();
$pos = strripos($tt, '2148400');
if ($pos == false) {
    print 'Ничего не найдено' . PHP_EOL;
} else {
    print sprintf('Последнее вхождение строки %s - %s', '2148400', $pos) . PHP_EOL;
}
