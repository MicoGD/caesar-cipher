<?php
/**
 * My compress iterator
 * @author robotomize
 * @version rev 0.2.1
 * @usage $t = new StringIterator($sampleArray)
 * foreach($t as $k => $v) {
 *
 * }
 * $t->getStringCompress() // compress string
 */

namespace CompressionOverCounter;

/**
 * Class StringIterator
 * @author robotomize@gmail.com
 * @package CompressionOverCounter
 */
class StringIterator implements \Iterator
{
    /**
     * @var array
     */
    private $var = array();

    /**
     * @var string
     */
    public $stringCompress = '';

    /**
     * @var string
     */
    private $curr = '';

    /**
     * @var string
     */
    private $next = '';

    /**
     * @var int
     */
    private $iter = 1;

    /**
     * @param $array
     */
    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
        $this->iter = 1;
    }

    /**
     * @return string
     */
    public function getStringCompress()
    {
        return $this->stringCompress;
    }

    /**
     * rewind iterator
     */
    public function rewind()
    {
        reset($this->var);
    }

    /**
     * save the current value
     * @return mixed
     */
    public function current()
    {
        $var = current($this->var);
        $this->curr = $var;
        return $var;
    }

    /**
     * key iterator
     * @return mixed
     */
    public function key()
    {
        $var = key($this->var);

        return $var;
    }

    /**
     * save the next value
     * @return mixed
     */
    public function next()
    {
        $var = next($this->var);
        $this->next = $var;
        if ($this->curr == $this->next) {
            $this->iter++;
        } else {
            if ($this->iter == 1) {
                $this->stringCompress = $this->stringCompress . $this->curr;
            } else {
                $this->stringCompress = $this->stringCompress . $this->iter;
                $this->iter = 1;
            }
        }

        return $var;
    }

    /**
     * Validation iter param
     * @return bool
     */
    public function valid()
    {
        $key = key($this->var);
        $var = ($key !== NULL && $key !== FALSE);
        return $var;
    }

}