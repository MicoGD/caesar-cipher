<?php

namespace CaesarCipherRu;

include 'CaesarCipherRuFactory.php';

/**
 *
 */
print CaesarCipherRuFactory::encode('твоя русский язык', 25) . PHP_EOL;
print CaesarCipherRuFactory::decode('цячущя эшббщйн цзщбц', 5) . PHP_EOL;
print CaesarCipherRuFactory::crack('жгшкзнзэ') . PHP_EOL;

/**
 * Some iterate matrix
 */
foreach(range(1, 32) as $values) {
    print sprintf('key: %s - value: %s', $values, CaesarCipherRuFactory::encode('окейгугл', $values) . PHP_EOL);
}



