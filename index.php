<?php
declare(strict_types=1);
require './code/Blackjack.php';
require './code/Suit.php';
require './code/Card.php';
require './code/Deck.php';
require './code/Player.php';
require './code/Dealer.php';

session_start();

if (isset($_GET["new"])) {
    $blackjack = new Blackjack();
    $_SESSION["blackjack"] = $blackjack;
    $blackjack->show();
}

if (!isset($_SESSION["blackjack"])) {
    $blackjack = new Blackjack();
    $_SESSION["blackjack"] = $blackjack;
    $blackjack->show();
}
else {
    $blackjack = $_SESSION["blackjack"];
    $blackjack->show();
}

if (isset($_GET["hit"])) {
    //$_SESSION["blackJack"]->getDeck()->hit();
    $blackjack->getPlayer()->hit($blackjack->getDeck());
    if (!$blackjack->getPlayer()->hasLost()) {
        $blackjack->show();
        echo "another card?";

    }
    else {
        $blackjack->show();
        echo "<br>"."you lost";
        $blackjack->end();
    }
}

//most complex
if (isset($_GET["stand"])) {
    $blackjack->getDealer()->hit($blackjack->getDeck());

    if (!$blackjack->getDealer()->hasLost()) {
        if ($blackjack->getPlayer()->getScore() <= $blackjack->getDealer()->getScore()) {
            $blackjack->show();
            echo "House wins";
            $blackjack->end();
        }
        else {
            $blackjack->show();
            echo "Player wins";
            $blackjack->end();
        }
    }
    else {
        $blackjack->end();
    }

}
//easiest
if (isset($_GET["surrender"])) {
    $blackjack->getPlayer()->surrender();
    $blackjack->end();
}

require 'view.php';

