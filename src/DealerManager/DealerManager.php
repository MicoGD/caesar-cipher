<?php

namespace DealerManager;

/**
 * Class DealerManager
 * Dealer shuffling cards
 * @package DealerManager
 * @author robotomzie@gmail.com
 * @usage
 * $tt = new(range(0, 36));
 * print_r($tt->getCardsArray());
 */
class DealerManager
{
    /**
     * @var array
     */
    private $cardsArray = [];

    /**
     * @param $cards
     */
    function __construct($cards)
    {
        $this->cardsArray = $cards;
        $this->shuffleCards();
    }

    /**
     * @return array
     */
    public function getCardsArray()
    {
        return $this->cardsArray;
    }

    /**
     * @return float
     */
    private function mathRandom()
    {
        return (float) rand() / (float)getrandmax();
    }

    /**
     * @return bool
     */
    private function shuffleCards()
    {
        for ($i = 0; $i < count($this->cardsArray); $i++) {
            $index = (int) ($this->mathRandom() * (count($this->cardsArray) - $i)) + $i;
            $temp = $this->cardsArray[$i];
            $this->cardsArray[$i] = $this->cardsArray[$index];
            $this->cardsArray[$index] = $temp;
        }

        if (0 !== count($this->cardsArray)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @throws \Exception
     */
    function __invoke()
    {
        if (!empty($this->cardsArray)) {
            print_r($this->cardsArray);
        } else {
            throw new \Exception('Empty cards array');
        }
    }

    /**
     * @return string
     */
    function __toString()
    {
        return serialize($this->cardsArray);
    }
}