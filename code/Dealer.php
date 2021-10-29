<?php

Class Dealer extends Player{

    public function hit(Deck $deck)
    {
        while ($this->getScore()<17) {
            parent::hit($deck);
        }
        if($this->getScore() > self::BLACKJACK) {
            $this->surrender();
        }
    }


}
