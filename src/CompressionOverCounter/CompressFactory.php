<?php

/**
 * @author robotomize@gmail.com
 * @usage factory for CompressionOverCounter
 */
namespace CompressionOverCounter;

include 'CompressionOverCounter.php';

class CompressFactory
{
    public static function makeCompressOverCounter($sourceString)
    {
        return new CompressionOverCounter($sourceString);
    }
}