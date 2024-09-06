<?php

declare(strict_types=1);

namespace App\task053\Entity;

class Player
{
    private int $position = 0;

    public function __construct(
        private int $playerId
    ) {
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function rollDice(): array
    {
        $diceOne = rand(1, 6);
        $diceTwo = rand(1, 6);

        return [
            'diceOne' => $diceOne,
            'diceTwo' => $diceTwo,
            'duplicate' => $diceOne === $diceTwo,
        ];
    }

    public function takeTurn(): string
    {
        $diceValues = $this->rollDice();
        // make a move;
        $newPosition = $this->makeMove($diceValues);
        // check -> snake / double / nothing

        $this->setPosition($newPosition);

//        if ($diceValues['duplicate']) {
//            $diceValues = $this->rollDice();
//            // make a move;
//            $newPosition = $this->makeMove($diceValues);
//            // check -> snake / double / nothing
//
//            $this->setPosition($newPosition);
//        }

        return $this->getPositionAsString($this->getPosition(), $this);
    }

    public function makeMove($diceValues): int
    {
        echo $this->getPlayerId() . PHP_EOL;
        print_r($diceValues);

        return $this->getPosition() + ($diceValues['diceOne'] + $diceValues['diceTwo']);
    }

    public function getPositionAsString(int $possiblePosition, Player $player): string
    {
        return sprintf('Player %d is on square %d', $player->playerId, $possiblePosition);
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }


}

/*
 * class Player
{
    private int $position = 0;

    public function __construct(
        private int $playerId
    ) {
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function rollDice(): array
    {
        return [
            'diceOne' => rand(1, 6),
            'diceTwo' => rand(1, 6),
        ];
    }

    //public function takeTurn(array $snakes, array $dice): string
    public function takeTurn(): string
    {
        // make a move;
        $newPosition = $this->makeMove();
        // check -> snake / double / nothing
//
//        $isSnake = false;
//        $isDouble = false;

//        foreach ($snakes as $snake) {
//            if ($snake['start'] === $newPosition) {
//                $newPosition = $snake['end'];
//                $isSnake = true;
//            }
//        }
//
//        if ($isSnake) {
//            return 'Next Player moves';
//        }

//        if ($dice['diceOne'] === $dice['diceTwo']) {
//            $isDouble = true;
//        }
//
//        if ($isDouble) {
//            $newPosition = $this->makeMove();
//        }
          $this->setPosition($newPosition);

          return $this->getPositionAsString($this->getPosition(), $this);
    }

    public function makeMove(): int
    {
        $diceValues = $this->rollDice();
        // get current position;
        $currentPosition = $this->getPosition();

        // change the position;
        $possiblePosition = $this->getPosition() + ($diceValues['diceOne'] + $diceValues['diceTwo']);

        return $possiblePosition;
    }

    public function getPositionAsString(int $possiblePosition, Player $player): string
    {
        return sprintf('Player %d is on square %d', $player->playerId, $possiblePosition);
    }

    // check the dice values;

    // make turn again if needed;

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }


}
 */
