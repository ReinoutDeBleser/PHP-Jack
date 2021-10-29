<?php
declare(strict_types=1);
require './code/Blackjack.php';
require './code/Suit.php';
require './code/Card.php';
require './code/Deck.php';
require './code/Player.php';
require './code/Dealer.php';

session_start();

if (!isset($_SESSION["blackjack"])) {
    $blackjack = new Blackjack();
    $_SESSION["blackjack"] = $blackjack;
    echo "player: ".$blackjack->getPlayer()->getScore();
    echo "dealer: ".$blackjack->getDealer()->getScore();
    //repeat for new game?
}
else {
    $blackjack = $_SESSION["blackjack"];
    echo "player: ".$blackjack->getPlayer()->getScore();
    echo "dealer: ".$blackjack->getDealer()->getScore();

}
//echo $blackjack->getPlayer()->$cards;
//echo $blackjack->getPlayer()->getScore();

if (isset($_GET["new"])) {
    $blackjack = new Blackjack();
    $_SESSION["blackjack"] = $blackjack;
    echo "player: ".$blackjack->getPlayer()->getScore();
    echo "dealer: ".$blackjack->getDealer()->getScore();
}

if (isset($_GET["hit"])) {
    $blackjack->getPlayer()->hit($blackjack->getDeck());
    if (!$blackjack->getPlayer()->hasLost()) {
        echo "<br>p: ".$blackjack->getPlayer()->getScore();
        echo "<br>d: ".$blackjack->getDealer()->getScore();
        echo "another card?";

    }
    else {
        echo "<br>p: ".$blackjack->getPlayer()->getScore();
        echo "<br>d: ".$blackjack->getDealer()->getScore();
        echo "<br>"."you lost";
    }

}
//most complex
if (isset($_GET["stand"])) {
    $blackjack->getDealer()->hit($blackjack->getDeck());

    if (!$blackjack->getDealer()->hasLost()) {
        if ($blackjack->getPlayer()->getScore() <= $blackjack->getDealer()->getScore()) {
            echo "player: ".$blackjack->getPlayer()->getScore();
            echo "dealer: ".$blackjack->getDealer()->getScore();
            echo "House wins";
        }
        else {
            echo "player: ".$blackjack->getPlayer()->getScore();
            echo "dealer: ".$blackjack->getDealer()->getScore();
            echo "Player wins";
        }
    }
    else {
        $_SESSION["blackjack"] = new Blackjack();
    }

}
//easiest
if (isset($_GET["surrender"])) {
    $blackjack->getPlayer()->surrender();
    $_SESSION["blackjack"] = new Blackjack();
}

require 'view.php';

