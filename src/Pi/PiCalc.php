<?php

namespace Pi;

/**
 * Class PiCalc
 * @package Pi
 * @author robotomize class handlers, @url
 * @author Source: http://mgccl.com/2007/01/22/php-calculate-pi-revisited
 */
class PiCalc
{

    /**
     * @param $precision
     */
    function __construct($precision)
    {
        $this->precision = $precision;
    }

    /**
     * @var int
     */
    private $precision = 0;

    /**
     * @return mixed
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * @param mixed $precision
     */
    public function setPrecision($precision)
    {
        $this->precision = $precision;
    }

    /**
     * @param $n
     *
     * @return int|string
     */
    private function bcFact($n)
    {
        return ($n == 0 || $n== 1) ? 1 : bcmul($n,$this->bcFact($n-1));
    }

    /**
     * @return string
     */
    public function bcPi()
    {
        $precision = $this->precision;
        $num = 0;$k = 0;
        bcscale($precision+3);
        $limit = ($precision+3)/14;
        while($k < $limit)
        {
            $num = bcadd($num, bcdiv(bcmul(bcadd('13591409',bcmul('545140134', $k)),bcmul(bcpow(-1, $k), $this->bcFact(6*$k))),bcmul(bcmul(bcpow('640320',3*$k+1),bcsqrt('640320')), bcmul($this->bcFact(3*$k), bcpow($this->bcFact($k),3)))));
            ++$k;
        }
        return bcdiv(1,(bcmul(12,($num))),$precision);
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    function __invoke()
    {
        if (!empty($this->precision)) {
            return $this->bcPi();
        } else {
            throw new \Exception('Precision not found');
        }

    }

    /**
     * @return string
     * @throws \Exception
     */
    function __toString()
    {
        if (!empty($this->precision)) {
            return $this->bcPi();
        } else {
            throw new \Exception('Precision not found');
        }
    }
}
