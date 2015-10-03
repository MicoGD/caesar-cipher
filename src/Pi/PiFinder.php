<?php

namespace Pi;

/**
 * Class PiFinder
 * @package Pi
 * @author robotomize@gmail.com
 * @usage
 *  $tt = new PiFinder('/path/to/pi_text_file.txt', '32423')
 *  $tt->runParse()
 */
class PiFinder
{

    /**
     * @var string
     */
    private $fileName = '';

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * String contents Pi digits
     * @var string
     */
    private $piString = '';

    /**
     * @return string
     */
    public function getPiString()
    {
        return $this->piString;
    }

    /**
     * This main indexes array contents Pi digits
     * @var array
     */
    private $PiDigitArray = [];

    /**
     * @return array
     */
    public function getPiDigitArray()
    {
        return $this->PiDigitArray;
    }

    /**
     * @var string
     */
    private $mather = '';

    /**
     * @return string
     */
    public function getMather()
    {
        return $this->mather;
    }

    /**
     * @var array
     */
    private $matherArray = [];

    /**
     * @return array
     */
    public function getMatherArray()
    {
        return $this->matherArray;
    }


    function __construct($fileName, $mather)
    {
        if (!empty($fileName) || !empty($mather)) {
            if (file_exists($fileName)) {
                $this->fileName = $fileName;
            } else {
                throw new \Exception('File don\'t exist');
            }
        } else {
            throw new \InvalidArgumentException;
        }

        $this->matherArray = str_split($mather);
        $this->parserIterNotify = count($this->matherArray);

    }

    /**
     * @var int
     */
    private $parserIterNotify = 0;

    /**
     * @return int
     */
    public function getParserIterNotify()
    {
        return $this->parserIterNotify;
    }


    /**
     * @var int
     */
    private $parserIter = 0;

    /**
     * @var int
     */
    private $globalParserIter = 0;

    /**
     * @return int
     */
    public function getGlobalParserIter()
    {
        return $this->globalParserIter;
    }

    /**
     * @var int
     */
    private $maxParserIter = 0;

    /**
     * @return int
     */
    public function getMaxParserIter()
    {
        return $this->maxParserIter;
    }

    /**
     * @var int
     */
    private $countPidDigitArray = 0;

    /**
     * @return int
     */
    public function getCountPidDigitArray()
    {
        return $this->countPidDigitArray;
    }

    /**
     * init data
     */
    private function loadData()
    {
        $this->globalParserIter = 0;
        try {
            $this->piString = file_get_contents($this->fileName);
            $this->PiDigitArray = str_split($this->piString);
            $this->countPidDigitArray = count($this->PiDigitArray);

            print sprintf('Count Pi digit array is: %s', $this->countPidDigitArray) . PHP_EOL;
        } catch(\Exception $e) {
            print_r($e);
        }
    }

    /**
     * Main func for parsing plain data
     * @return int|string
     */
    public function runParse()
    {
        $this->loadData();

        foreach ($this->PiDigitArray as $kk => $vv) {
            foreach($this->matherArray as $values) {
                if ($vv == $values) {
                    $this->parserIter++;
                    if ($this->parserIter == $this->parserIterNotify) {
                        return $kk;
                    }
                } else {
                    if ($this->parserIter > $this->maxParserIter) {
                        $this->maxParserIter = $this->parserIter;
                    }
                    $this->parserIter = 0;
                }
            }
            $this->globalParserIter++;
            if (rand(0, 10) === 8) {
                print sprintf('Process: %s%', round($this->getCountPidDigitArray() / $this->getGlobalParserIter(), 2) * 100) . PHP_EOL;
            }

            if (rand(0, 10) === 7) {
                print sprintf('Max stack is: %s', $this->getMaxParserIter()) . PHP_EOL;
            }

        }

        return 'Not found';
    }

    /**
     * @return string
     */
    function __toString()
    {
        if (!empty($this->getPiDigitArray())) {
            return serialize($this->getPiDigitArray());
        } else {
            return '';
        }
    }

    /**
     * @return array
     */
    function __invoke()
    {
        if (!empty($this->getPiDigitArray())) {
            return $this->getPiDigitArray();
        } else {
            return [false];
        }
    }
}