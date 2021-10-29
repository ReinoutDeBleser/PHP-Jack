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
    <form>
        <button type="submit" name="new">New Game</button>
        <button type="submit" name="hit">Hit</button>
        <button type="submit" name="stand">Stand</button>
        <button type="submit" name="surrender">Surrender</button>
    </form>
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



</body>
</html>

