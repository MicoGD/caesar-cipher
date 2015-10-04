<?php

namespace CaesarCipher;

/**
 * Class CaesarCipherRu - This cracker Caesar cipher for the Russian language.
 * Powered by calculating the smallest value of entropy.
 * The class uses a modified Cyrillic alphabet, you can ask your alphabet through setAlphabet()
 *
 * @package CaesarCipher
 * @author robotomize@gmail.com
 * @version 0.9.9
 * @usage
 * $tt = new CaesarCipherRu();
   print $tt->encode('окейгугл', 3) . PHP_EOL; //Code the string with offset 3
 *
 * Okay, interesting
 * $tt = new CaesarCipherRu();
 * print $tt->crack('Your encrypted set of Russian characters');
 *
 * Look at the entropy and other values here.
 *
 * $tt->getEntropyValues();
 * $tt->getLowestEntropy();
 * $tt->getAttemptCache();
 *
 */
class CaesarCipherRu extends CaesarCipher
{
    /**
     * @var array
     */
    private static $alphabet = [
        'й', 'ц', 'у', 'к', 'е', 'н', 'г', 'ш', 'щ', 'з', 'х', 'ъ', 'ф', 'ы', 'в', 'а', 'п', 'р', 'о', 'л', 'д', 'ж',
        'э', 'я', 'ч', 'с', 'м', 'и', 'т', 'ь', 'б', 'ю'
    ];

    /**
     * @param array $alphabet
     */
    public static function setAlphabet($alphabet)
    {
        self::$alphabet = $alphabet;
    }

    /**
     * @param array $frequency
     */
    public static function setFrequency($frequency)
    {
        self::$frequency = $frequency;
    }

    /**
     * @var array
     */
    private static $frequency = array(
        'а'=> 0.063,
        'б'=> 0.014,
        'в'=> 0.038,
        'г'=> 0.013,
        'д'=> 0.025,
        'е'=> 0.072,
        'ж'=> 0.007,
        'з'=> 0.016,
        'и'=> 0.062,
        'й'=> 0.01,
        'к'=> 0.028,
        'л'=> 0.035,
        'м'=> 0.026,
        'н'=> 0.052,
        'о'=> 0.09,
        'п'=> 0.023,
        'р'=> 0.040,
        'с'=> 0.045,
        'т'=> 0.053,
        'у'=> 0.021,
        'ф'=> 0.001,
        'х'=> 0.009,
        'ц'=> 0.004,
        'ч'=> 0.012,
        'ш'=> 0.005,
        'щ'=> 0.003,
        'ъ' => 0.015,
        'ы' => 0.017,
        'ь' => 0.015,
        'э' => 0.002,
        'ю' => 0.006,
        'я' => 0.018,
    );

    /**
     * @return array
     */
    public static function getAlphabet()
    {
        return self::$alphabet;
    }

    /**
     * @return array
     */
    public static function getFrequency()
    {
        return self::$frequency;
    }


    /**
     * Change keymap to utf8 and back
     *
     * @param string $string
     *
     * @return array|string
     */
    private function f_str_split($string = '')
    {
        if (is_array($string))
            return $string;

        $string = iconv('utf-8', 'windows-1251', $string);

        $array = str_split( $string );
        foreach($array as $key => $value)
            $array[$key] = iconv('windows-1251', 'utf-8', $value );

        return $array;
    }

    /**
     * @param $string
     *
     * @return array
     */
    private function mbStringToArray ($string) {
        $lenOfStr = mb_strlen($string);
        $resultArray = [];
        while ($lenOfStr) {
            $resultArray[] = mb_substr($string, 0, 1,"UTF-8");
            $string = mb_substr($string, 1, $lenOfStr,"UTF-8");
            $lenOfStr = mb_strlen($string);
        }
        return $resultArray;
    }

    /*
     * Applies the Caesar shift cipher
     *
     * @param   string  message
     * @param   int     offset
     *
     * @return string
     */
    private function cipher($message, $offset) {
        $messageArray = $this->mbStringToArray($message);
        foreach($messageArray as $i => $letter) {
            if(!ctype_alpha(iconv('utf-8', 'windows-1251', $letter)))
                continue;

            $value = array_search($letter, self::$alphabet);

            $cipherValue = $value + $offset;
            if($cipherValue > 31) {
                $cipherValue = $cipherValue % 32;
            } else if ($cipherValue < 0) {
                $cipherValue = $cipherValue % 32;
                $cipherValue = $cipherValue + 32;
            }
            $messageArray[$i] = self::$alphabet[$cipherValue];
        }
        return implode($messageArray);
    }

    /*
     * Decodes message using Caesar shift cipher
     *
     * @param   string  message
     * @param   int     offset
     *
     * @return string
     */
    public function decode($message, $offset) {
        return $this->cipher($message, $offset * -1);
    }

    /*
     * Encode message using Caesar shift cipher
     *
     * @param   string  message
     * @param   int     offset
     *
     * @return string
     */
    public function encode($message, $offset) {
        return $this->cipher($message, $offset);
    }

    /**
     * @var array
     */
    private $entropyValues = [];

    /**
     * @return array
     */
    public function getEntropyValues()
    {
        return $this->entropyValues;
    }


    /**
     * @var array
     */
    private $attemptCache = [];

    /**
     * @return array
     */
    public function getAttemptCache()
    {
        return $this->attemptCache;
    }

    /**
     * @var array
     */
    private $lowestEntropy = [];

    /**
     * @return array
     */
    public function getLowestEntropy()
    {
        return $this->lowestEntropy;
    }

    /**
     * Attempts to crack message using frequency of letters in English.
     *
     * @param $message
     *
     * @return mixed
     */
    public function crack($message) {
        foreach(range(0, 32) as $i) {
            $test_cipher = $this->decode($message, $i * -1);
            $this->entropyValues[$i] = $this->calculateEntropy($test_cipher);
            $this->attemptCache[$i] = $test_cipher;
        }
        $this->lowestEntropy = array_keys($this->entropyValues, max($this->entropyValues));
        return $this->attemptCache[$this->lowestEntropy[0]];
    }

    /**
     * Generates all combinations through brute force
     *
     * @return array
     */
    public function bruteForce($encodeText)
    {
        $result = array();
        for ($shift = 0; $shift <= 31; $shift++) {
            $result[$shift] = $this->decode($encodeText, $shift);
        }
        return $result;
    }

    /**
     * @deprecated
     */
    private function arrayConvert()
    {
        $convArr = self::$frequency;
        foreach($convArr as $key => $value)
            self::$frequency[$key] = iconv('windows-1251', 'utf-8', $value);

    }

    /**
     * Calculates the entropy of a string based on known frequency of English letters
     *
     * @param $entropy_string
     *
     * @return float|int
     */
    private function calculateEntropy($entropy_string) {
        $total = 0;
        $entropy_string = $this->mbStringToArray($entropy_string);
        for($i =0; $i < count($entropy_string); $i++) {
            if($entropy_string[$i] != ' ') {
                $prob = self::$frequency[$entropy_string[$i]];
                $total += log($prob) / log(2);
            }
        }
        return $total;
    }

    /**
     * @return $this|array
     */
    function __invoke()
    {
        if (!empty($this->attemptCache)) {
            return $this->attemptCache;
        } else {
            return $this;
        }

    }

    /**
     * @return string
     */
    function __toString()
    {
        if (!empty($this->attemptCache)) {
            return serialize($this->attemptCache);
        } else {
            return serialize($this);
        }
    }


}