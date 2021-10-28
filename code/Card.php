<?php
declare(strict_types=1);

class Card
{
    //todo: add things learned to the README.md
    // private is a property https://www.php.net/manual/en/language.oop5.properties.php
    // constant is define()'d docs: https://www.php.net/manual/en/language.constants.php
    private const ACE_VALUE = 11;
    private const FACE_VALUE = 10;

    private Suit $suit;
    private int $value;
    // int = integer

    //the constructor method for classes.
    // Unlike other methods, __construct() is exempt from the usual signature compatibility rules when being extended.
    public function __construct(Suit $suit, int $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }

    public function getSuit(): Suit
    {
        return $this->suit;
    }

    public function getValue(): int
    {
        if($this->value === 1) {
            //Scope Resolution Operator (::)Paamayim Nekudotayim (hebrew) url https://www.php.net/manual/en/language.oop5.paamayim-nekudotayim.php
            //, the double colon, is a token that allows access to static, constant, and overridden properties or methods of a class.;
            return self::ACE_VALUE;
        }
        if($this->value >= 10) {
            return self::FACE_VALUE;
        }

        return $this->value;
    }

    private function getRawValue(): int
    {
        return $this->value;
    }

    public function getUnicodeCharacter(bool $includeColor=false): string {
        $value = '&#'. ($this->suit->getStartValue() + $this->getRawValue()) .';';

        if($includeColor) {
            $value = sprintf('<span style="color: %s;">%s</span>',
                $this->suit->getColor(),
                $value
            );
        }

        return $value;
    }
}
