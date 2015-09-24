<?php

$a="$";
$e='printf(\'<?php %sa="$"; %se=%s; eval(%se);\', $a, $a, var_export($e, 1), $a);';
eval($e);
