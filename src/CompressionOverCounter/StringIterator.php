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


class StringIterator implements \Iterator
{
    private $var = array();

    public $stringCompress = '';

    private $curr = '';
    private $next = '';
    private $iter = 1;

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
        $this->iter = 1;
    }

    public function getStringCompress()
    {
        return $this->stringCompress;
    }

    public function rewind()
    {
        reset($this->var);
    }

    public function current()
    {
        $var = current($this->var);
        $this->curr = $var;
        return $var;
    }

    public function key()
    {
        $var = key($this->var);

        return $var;
    }

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

    public function valid()
    {
        $key = key($this->var);
        $var = ($key !== NULL && $key !== FALSE);
        return $var;
    }

}

/*
$values = str_split('fdgssssssjffffdjjjjjfgdkkkksssfjgkdjj');

$it = new StringIterator($values);

foreach ($it as $a => $b) {

}
print $it->getStringCompress();
*/