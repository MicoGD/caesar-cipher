<?php

namespace UserGenerator;

/**
 * Class UserGenerator
 * @package UserGenerator
 * @author @brujeo, robotomize@gmail.com modification
 * @usage
 *
 *    ini_set('max_execution_time', 36000);
 *    ini_set('memory_limit', '2000M');
 *    $generator = new userGenerator();
 *    $generator->run(500000);
 *    echo "complete";
 *    //print_r($generator->getUserValue());
 */
class UserGenerator
{
    /**
     * @var array
     */
    private $countries = array(
        'Russian Federation',
        'Ukraine',
        'Germany',
        'France',
        'Lithuania',
        'Latvia',
        'Poland',
        'Finland',
        'Sweden'
    );

    /**
     * @var array
     */
    private $userValue = [];

    /**
     * @return array
     */
    public function getUserValue()
    {
        return $this->userValue;
    }

    /**
     * @var int
     */
    private $countUser = 0;

    /**
     * @return int
     */
    public function getCountUser()
    {
        return $this->countUser;
    }

    /**
     * @param $cnt
     */
    public function run($cnt)
    {

        for ($i = 0; $i < $cnt; $i++) {
            $query = $this->generateQuery($i);
            echo "generating user " . $i . " ... ";
            $this->countUser++;
            echo "done" . PHP_EOL;
        }
    }

    /**
     * @param $id
     */
    private function generateQuery($id)
    {
        $date = new DateTime('1960-01-01');

        $this->userValue[] = [

            "id"          => $id ,
            "firstname"   => ucfirst($this->generateWord(10)) ,
            "surname"     => ucfirst($this->generateWord(10)) ,
            "birthDate"   => $date->modify('+' . rand(0, 14600) . ' days')->format('Y-m-d'),
            "location"    => $this->generateWord(10) . ', ' . $this->countries[array_rand($this->countries)],
            "skills"      => [strtoupper($this->generateWord(3)), strtoupper($this->generateWord(4)), strtoupper($this->generateWord(3))]
        ];
    }

    /**
     * @param $length
     * @return string
     */
    private function generateWord($length)
    {

        $letters = array(
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m",
            "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

        $word = '';
        for ($i = 0; $i < $length; $i++) {
            $word .= $letters[rand(0, 25)];
        }
        return $word;
    }
}

