<?php
declare(strict_types=1);
//Create a class called Player in the file Player.php.
class Player
{
    private array $cards;
    private bool $lost;
    protected const BLACKJACK = 21;

    public function __construct(Deck $deck)
    {
        $this->cards[] = $deck->drawCard();
        $this->cards[] = $deck->drawCard();
        $this->lost = false;
    }
    public function hit(Deck $deck)
    {
        $this->cards[] = $deck->drawCard();
        if($this->getScore() > self::BLACKJACK) {
            $this->surrender();
        }
    }
    public function surrender()
    {
        $this->lost = true;
    }
    public function getScore(): int
    {
        $totalValue = 0;
        foreach ($this->cards AS $card) {
            $totalValue += $card->getValue();
        }
        return $totalValue;
    }
    public function hasLost() : bool
    {
        return $this->lost;
    }

    public function getPlayerCards() : array
    {
        return $this->cards;
    }
}


