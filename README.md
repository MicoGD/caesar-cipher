# CaesarCipherRu #
This cracker Caesar cipher for the Russian language.
Powered by calculating the smallest value of entropy.

### What is this repository for? ###

* Ru version CaesarCipher

### How do I get set up? ###

* **git clone https://robotomize@bitbucket.org/robotomize/caesarcipherru.git**
* php -q example.php

### Usage ###
```
<?php

namespace CaesarCipherru;

include 'CaesarCipherRuFactory.php';

print CaesarCipherRuFactory::encode('твоя русский язык', 25) . PHP_EOL;
print CaesarCipherRuFactory::decode('жшъп хиоотдс пугт', 25) . PHP_EOL;

print CaesarCipherRuFactory::crack('жшъп хиоотдс пугт') . PHP_EOL;

```
