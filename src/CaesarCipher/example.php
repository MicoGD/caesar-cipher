<?php

namespace CaesarCipher;

use CaesarCipher\CaesarCipherRu;

include 'CaesarCipher.php';
include 'CaesarCipherRu.php';

/**
 *
 */
$tt = new CaesarCipherRu();
print $tt->encode('окейгугл', 3) . PHP_EOL;

print $tt->crack('юйбьхуфдтацъьлъюйцшхщуцюхдлщобер') . PHP_EOL;

/**
 * Some iterate matrix
 */
foreach(range(1, 32) as $values) {
    print sprintf('key: %s - value: %s', $values, $tt->encode('правильныйответпрочислопинескажу', $values) . PHP_EOL);
}



