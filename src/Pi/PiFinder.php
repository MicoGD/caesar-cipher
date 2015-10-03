<?php

namespace Pi;

/**
 * Class PiFinder - Find the offset sequence number in Pi.
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

    /**
     * @var string
     */
    private $matcher = '';

    /**
     * @return string
     */
    public function getMatcher()
    {
        return $this->matcher;
    }

    /**
     * @param string $matcher
     */
    public function setMatcher($matcher)
    {
        $this->matcher = $matcher;

    }

    function __construct($fileName, $matcher)
    {
        if (!empty($fileName) || !empty($matcher)) {
            if (file_exists($fileName)) {
                $this->fileName = $fileName;
                $this->mather = $matcher;
            } else {
                throw new \Exception('File don\'t exist');
            }
        } else {
            throw new \InvalidArgumentException;
        }
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

        $this->matherArray = str_split($this->mather);
        $this->parserIterNotify = count($this->matherArray);

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
     * Simple progress bar
     *
     * @return bool|string
     */
    private function simpleProgressBar()
    {
        if (rand(0, 100) === 24) {
            return sprintf('Process: %s%s', '%', (round($this->getGlobalParserIter() / $this->getCountPidDigitArray(), 2) * 100)) . PHP_EOL;
        } elseif (rand(0, 100) === 67) {
            return sprintf('Max stack is: %s', $this->getMaxParserIter()) . PHP_EOL;
        }
        return false;

    }

    /**
     * @var int
     */
    private $shiftIndex = 0;

    /**
     * Get final result shift index
     * @return int
     */
    public function getShiftIndex()
    {
        return $this->shiftIndex;
    }

    /**
     * Main func for parsing plain data
     *
     * @return int|string
     */
    public function run()
    {
        $this->loadData();

        foreach ($this->PiDigitArray as $kk => $vv) {
            if ($vv == $this->matherArray[$this->parserIter]) {
                $this->parserIter++;
                if ($this->parserIter == $this->parserIterNotify) {
                    $this->shiftIndex = ($kk + 1) - ($this->parserIterNotify - 1);
                    return ($kk + 1) - ($this->parserIterNotify - 1);
                }
            } else {
                if ($this->parserIter > $this->maxParserIter) {
                    $this->maxParserIter = $this->parserIter;
                }
                $this->parserIter = 0;
            }

            $this->globalParserIter++;

            $helper = $this->simpleProgressBar();

            if ($helper !== false) {
                print $helper . PHP_EOL;
            }
        }

        return 'No matches found';
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