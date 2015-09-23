<?php

namespace ConfigParser;

include 'ConfigParser.php';

/**
 * pars_task.ini This configuration file
 */

$tt = new ConfigParser('pars_task.ini');
$resultArray = $tt->getResultArray();
/**
 * Parsed array|
 */
print_r($resultArray);