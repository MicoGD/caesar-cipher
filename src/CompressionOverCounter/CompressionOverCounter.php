<?php

/**
 *
 * @author robotomize@gmail.com
 */

namespace CompressionOverCounter;

use Psr\Log\InvalidArgumentException;

class CompressOverCounter extends AbstractCompress
{
    private $sourceLength = '';
    private $compressLength = '';
    private $sourceString = '';
    private $compressString = '';

    public function __construct($sourceString)
    {
        if (!is_string($sourceString)) {
            throw new InvalidArgumentException;
        }
        $this->sourceString = $sourceString;
        $this->sourceLength = strlen($sourceString);
        $this->compress();

    }

    private function iterationProcess()
    {
        $values = str_split($this->sourceString);
        $iterObj = new StringIterator($values);
        foreach ($iterObj as $a => $b) {
            // @TODO doing
            // monolog iteration proccess  save to text file
        }
        $this->compressString = $iterObj->getStringCompress();
        $this->compressLength = strlen($this->compressString);
    }

    public function compress()
    {
        $this->iterationProcess();
        if ($this->compressLength > $this->sourceLength) {
            $this->compressString = $this->sourceString;
        }

        return $this->compressString;

    }

    public function getCompressString()
    {
        return $this->compressString;
    }

    function __toString()
    {
        // TODO: Implement __toString() method.
        return (!empty($this->compressString) ? $this->compressString : '');
    }

    function __invoke()
    {
        // TODO: Implement __invoke() method.
    }


}



