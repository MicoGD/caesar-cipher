<?php

/**
 *
 * User: robotomize
 * Date: 16.09.15
 * Time: 0:37
 */

namespace CompressionOverCounter;

class CompressOverCounter extends AbstractCompress
{
    private $sourceLength = '';
    private $compressLength = '';
    private $sourceString = '';
    private $compressString = '';

    public function __construct($sourceString)
    {
        $this->sourceString = $sourceString;
        $this->sourceLength = strlen($sourceString);
        $this->compress();

    }

    private function iteriorSymbols($start, $end, $step = 1)
    {
        for ($i = $start; $i <= $end; $i += $step) {
            yield $i;
        }
    }

    private function compress()
    {

        if ($this->compressLength > $this->sourceLength) {
            $this->compressString = $this->sourceString;
        }
        return false;
    }

    public function getCompressString()
    {
        return $this->compressString;
    }

    function __toString()
    {
        // TODO: Implement __toString() method.
        return '';
    }

    function __invoke()
    {
        // TODO: Implement __invoke() method.
    }


}



