<?php

namespace ConfigParser;

/**
 * Okay, MultiNode config parser
 * Class ConfigParser
 * @package task
 * @author robotomize@gmail.com
 * @version 0.1
 *
 * Test Case
    db.user = vasya
    name.user = petya
    db.password = as123
    db.driver.type = mysql
    ['db' => ['user' => 'vasya', 'password' => 'asd123', 'driver' => ...]]
 *
 * @usage
 *
 * $tt = new ConfigParser('pars_task.ini');
 * print_r($tt->getResultArray());
 *
 */
class ConfigParser
{

    /**
     * @var string
     */
    private $fileName = '';

    /**
     * Finally result array
     *
     * @var array
     */
    private $resultArray = [];

    /**
     * Intermediate array
     *
     * @var array
     */
    private $determArray = [];

    /**
     * @param $fileName
     */
    function __construct($fileName)
    {
        if (empty($fileName)) {
            throw new \Exception('File not found..');
        } else {
            $this->fileName = $fileName;
        }

        $this->parseToArray($this->fileName);
        $this->resultArray = $this->recurSeparateToDelim($this->determArray);
    }

    /**
     * @return string
     */
    function __toString()
    {
        if (!empty($this->resultArray)) {
            return serialize($this->resultArray);
        } else {
            return '';
        }
    }

    /**
     * @return mixed
     */
    function __invoke()
    {
        if (!empty($this->resultArray)) {
            return print_r($this->resultArray);
        } else {
            return print_r($this);
        }
    }

    /**
     * @return array
     */
    public function getResultArray()
    {
        return $this->resultArray;
    }

    /**
     * @return array
     */
    public function getDetermArray()
    {
        return $this->determArray;
    }

    /**
     * Recurs array parsing here
     *
     * @param array $in
     * @param string $separator
     *
     * @return array
     */
    private function recurSeparateToDelim(array $in, $separator = '.') {
        $result = array();
        foreach ($in as $key => $value) {
            $ptr = &$result;

            foreach (explode($separator, $key) as $token) {
                $ptr = &$ptr[$token];
            }

            $ptr = $value;
        }

        return $result;
    }

    /**
     * Current ini line
     *
     * @param $line
     */
    private function createDetermArray($line)
    {
        if (!empty($line)) {
            $values = explode('=', $line);
            $key = trim($values[0]);
            $value = trim($values[1]);
            $this->determArray[$key] = $value;
        }
    }

    /**
     * @usage simple file parsing
     */
    public function parseToArray()
    {
        $f = fopen($this->fileName, "r");
        while(!feof($f)) {
            $this->createDetermArray(fgets($f));
        }
        fclose($f);
    }

}