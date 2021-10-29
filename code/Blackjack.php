<?php

class Blackjack{
    private Player $player;
    private Dealer $dealer;
    private Deck $deck;

    public function __construct()
    {
        //this is needed to differentiate between instances in a class.
        $this->deck = new Deck();
        $this->deck->shuffle();
        $this->player = new Player($this->deck);
        $this->dealer = new Dealer($this->deck);
    }
    public function getPlayer()
    {
        return $this->player;
    }
    public function getDealer()
    {
        return $this->dealer;
    }
    public function getDeck()
    {
        return $this->deck;
    }
    public function show(){
        echo "player: ".$this->getPlayer()->getScore()."<br>";
        foreach($this->getPlayer()->getPlayerCards() AS $card) {
            echo "<div style='font-size:40px'>".$card->getUnicodeCharacter(true)."</div>";
        }
        echo "dealer: ".$this->getDealer()->getScore()."<br>";
        foreach($this->getDealer()->getPlayerCards() AS $card) {
            echo "<div style='font-size:40px'>".$card->getUnicodeCharacter(true)."</div>";
        }
    }
    public function end(){
        unset($_SESSION["blackjack"]);
    }
}