<?php

class Blackjack {
    private string $player;
    private string $dealer;
    private string $deck;

    public function getPlayer()
    {

    }
    public function getDealer()
    {

    }
    public function getDeck()
    {

    }
    public function __construct()
    {
        $player = new Player();
        $dealer = new Player();
        $deck = new Deck();
        shuffle($deck);




}