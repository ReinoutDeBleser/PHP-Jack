<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<section> <h2>Rules of the game:</h2>
    <p> basic rules of blackjack:
        both sides receive a hand of 2 cards
        they then receive the opportunity to draw more cards if they wish so.
        if they end on 21 they have the highest hand and win if the other party is lower or busts.
        if they bust they lose. once the dealer reaches at least  17 he will stop drawing cards.
    </p>
</section>
<section>
    <button id="deal">deal</button>
    <button id ="card">another card</button>
    <button id="dealer">No more/Dealer's Turn</button>
</section>

<section>
    <p id ="win">Here we show what the player's options are</p>
    <p id ="winner">Here we show what the player's options are</p>
    <p id ="score">Here we show your current score</p>
    <p id ="houseText">Here we show what the House does</p>
    <p id ="houseScore">Here we show the houses' current score</p>


</section>
<template id="drawnCard">
    <li class="card">
        <h4 class="title">
            <em class="number"></em>
            <em class ="symbol"></em>
            <em class ="value"></em>
        </h4>
        <img class="newCard" src="" alt= "no image available"/>
    </li>
</template>
<section>
    <ol id="player"></ol>
</section>

<section>
    <ol id="house"></ol>
</section>

<?php

require './code/Suit.php';
require './code/Card.php';
require './code/Deck.php';
require './code/Player.php';
require './code/Blackjack.php';

$deck = new Deck();
$deck->shuffle();
foreach($deck->getCards() AS $card) {
    echo $card->getUnicodeCharacter(true);
    echo '<br>';
}
?>


</body>
</html>

