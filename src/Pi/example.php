<?php

use Pi\PiFactory;

require_once 'PiFactory.php';

function caesar($str, $n) {

    $ret = "";
    for($i = 0, $l = strlen($str); $i < $l; ++$i) {
        $c = ord($str[$i]);
        if (97 <= $c && $c < 123) {
            $ret.= chr(($c + $n + 7) % 26 + 97);
        } else if(65 <= $c && $c < 91) {
            $ret.= chr(($c + $n + 13) % 26 + 65);
        } else {
            $ret.= $str[$i];
        }
    }
    return $ret;
}

function crack_caesar($str) {

    $max = 0;

    $weight = array(
        6.51, 1.89, 3.06, 5.08, 17.4,
        1.66, 3.01, 4.76, 7.55, 0.27,
        1.21, 3.44, 2.53, 9.78, 2.51,
        0.29, 0.02, 7.00, 7.27, 6.15,
        4.35, 0.67, 1.89, 0.03, 0.04, 1.13);

    $c = $s = array(
        0, 0, 0, 0, 0,
        0, 0, 0, 0, 0,
        0, 0, 0, 0, 0,
        0, 0, 0, 0, 0,
        0, 0, 0, 0, 0, 0);

    for($i = 0, $l = strlen($str); $i < $l; ++$i) {
        $x = (ord($str[$i]) | 32) - 97;
        if (0 <= $x && $x < 26) {
            ++$c[$x];
        }
    }

    for ($off = 0; $off < 26; ++$off) {

        for ($i = 0; $i < 26; ++$i) {
            if ($max < ($s[$off]+= 0.01 * $c[$i] * $weight[($i + $off) % 26])) {
                $max = $s[$off];
            }
        }
    }
    return (26 - array_search($max, $s)) % 26;
}

$str = caesar("хуйня случается", 16);
print $str . PHP_EOL;
//print crack_caesar('');
