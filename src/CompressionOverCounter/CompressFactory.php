<?php

namespace CompressionOverCounter;

include 'CompressionOverCounter.php';

/**
 * Class CompressFactory
 *
 * @package CompressionOverCounter
 * @author robotomize@gmail.com
 */
class CompressFactory
{
    /**
     * @param $sourceString
     *
     * @return CompressionOverCounter
     */
    public static function makeCompressOverCounter($sourceString)
    {
        return new CompressionOverCounter($sourceString);
    }
}