<?php

namespace CompressionOverCounter;

include 'vendor/autoload.php';
include 'AbstractCompress.php';
include 'StringIterator.php';

use Psr\Log\InvalidArgumentException;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Class CompressionOverCounter
 *
 * @package CompressionOverCounter
 * @version 0.1
 * @author robotomize@gmail.com
 */
class CompressionOverCounter extends AbstractCompress
{
    /**
     * @var int|string
     */
    private $sourceLength = '';

    /**
     * @var string
     */
    private $compressLength = '';

    /**
     * @var string
     */
    private $sourceString = '';

    /**
     * @var string
     */
    private $compressString = '';

    /**
     * @param $sourceString
     */
    public function __construct($sourceString)
    {
        if (!is_string($sourceString)) {
            throw new InvalidArgumentException;
        }
        $this->sourceString = $sourceString;
        $this->sourceLength = strlen($sourceString);

    }

    /**
     * Connecting the iterator. Iterator counts repetitions, and generates a new line.
     */
    private function iterationProcess()
    {
        $log = new Logger('Compress algo logger');
        $log->pushHandler(new StreamHandler('comporess.log', Logger::WARNING));
        $values = str_split($this->sourceString);
        $log->addWarning($this->sourceString);
        $iterObj = new StringIterator($values);
        foreach ($iterObj as $a => $b) {
        }
        $this->compressString = $iterObj->getStringCompress();
        $this->compressLength = strlen($this->compressString);
    }

    /**
     * The implementation of an abstract method. Main compress method.
     *
     * @return string
     */
    public function compress()
    {
        $this->iterationProcess();
        if ($this->compressLength > $this->sourceLength) {
            $this->compressString = $this->sourceString;
        }

        return $this->compressString;

    }

    /**
     * @return string
     */
    function __toString()
    {
        return (!empty($this->compressString) ? $this->compressString : $this->compress());
    }

    /**
     *
     */
    function __invoke()
    {
        if (!empty($this->compressString)) {
            print $this->compressString;
        } else {
            print $this->compress();
        }
    }
}


