## CaesarCipherRu ##
This cracker Caesar cipher for the Russian language.
Powered by calculating the smallest value of entropy. This is a training version of the cipher

### What is this repository for? ###

* Hack and encrypt the Caesar cipher in Russian.

### How do I get set up? ###

* git clone https://robotomize@bitbucket.org/robotomize/caesarcipheru.git
* php -q example.php
* expand this

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

