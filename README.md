## CaesarCipherRu ##
This cracker Caesar cipher for the Russian language.
Powered by calculating the smallest value of entropy.

### What is this repository for? ###

* Ru version CaesarCipher

### How do I get set up? ###

* git clone https://robotomize@bitbucket.org/robotomize/caesarcipherru.git
* php -q example.php

### Basic Usage ###
#### With Factory ####
```php
<?php

namespace CaesarCipherRu;

include 'CaesarCipherRuFactory.php';

print CaesarCipherRuFactory::encode('твоя русский язык', 25) . PHP_EOL;
print CaesarCipherRuFactory::decode('жшъп хиоотдс пугт', 25) . PHP_EOL;

print CaesarCipherRuFactory::crack('жшъп хиоотдс пугт') . PHP_EOL;

```

#### Simple with object ####

```php
<?php
namespace CaesarCipherRu;

include 'CaesarCipherRuFactory.php';

$testCipher = new CaesarCipherRu();

print $testCipher->encode('твоя русский язык', 25) . PHP_EOL;
print $testCipher->decode('жшъп хиоотдс пугт', 25) . PHP_EOL;

print $testCipher->crack('жшъп хиоотдс пугт') . PHP_EOL;
```

