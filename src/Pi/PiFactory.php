<?php

namespace Pi;

require_once 'PiCalc.php';

/**
 * Class PiFactory
 * @package Pi
 * @author robotomize@gmail.com
 */
class PiFactory
{
    /**
     * @param $prec
     * @return PiCalc
     * @throws \Exception
     */
    public static function makePi($prec)
    {
        if (empty($prec)) {
            throw new \Exception('Precision not found');
        } else {
            return New PiCalc($prec);
        }
    }
}