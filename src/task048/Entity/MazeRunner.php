<?php

declare(strict_types=1);

namespace App\task048\Entity;

use App\task048\Enum\GameResult;
use App\task048\Enum\PositionCode;

final class MazeRunner
{
    private int $stepCount = 0;

    /**
     * @param string[] $route
     * @param array<int, int[]> $maze
     * @param int $stepLimit
     */
    public function __construct(
        private readonly array $route,
        private readonly array $maze,
        private readonly int   $stepLimit
    )
    {
    }

    public function getStepCount(): int
    {
        return $this->stepCount;
    }

    public function setStepCount(int $stepCount): void
    {
        $this->stepCount = $stepCount;
    }

    /**
     * @return string[]
     */
    public function getRoute(): array
    {
        return $this->route;
    }

    /**
     * @return array<int, int[]>
     */
    public function getMaze(): array
    {
        return $this->maze;
    }

    public function getStepLimit(): int
    {
        return $this->stepLimit;
    }

    /**
     * @param array<int, int[]> $maze
     * @return array<string, int>
     */
    public function getInitialPosition(array $maze): array
    {
        $start = [];
        for ($i = 0; $i < count($maze); $i++) {
            for ($j = 0; $j < count($maze[$i]); $j++) {
                if ($maze[$i][$j] === 2) {
                    $start['x'] = $j;
                    $start['y'] = $i;
                    return $start;
                }
            }
        }

        return $start;
    }

    /**
     * @param array<string, int> $position
     * @return array<string, int>|int
     */
    public function stepUp(array $position): array|int
    {
        if ($position['y'] - 1 < 0) {
            return PositionCode::WALL->value;
        }

        $this->setStepCount($this->getStepCount() + 1);

        return [
            'x' => $position['x'],
            'y' =>  $position['y'] - 1,
        ];
    }

    /**
     * @param array<string, int> $position
     * @param array<int, int[]> $maze
     * @return array<string, int>|int
     */
    public function stepDown(array $position, array $maze): array|int
    {
        if ($position['y'] + 1 === count($maze)) {
            return PositionCode::WALL->value;
        }

        $this->setStepCount($this->getStepCount() + 1);

        return [
            'x' => $position['x'],
            'y' => $position['y'] + 1,
        ];
    }

    /**
     * @param array<string, int> $position
     * @return array<string, int>|int
     */
    public function stepRight(array $position, $maze): array|int
    {
        if ($position['x'] + 1 === count($maze[$position['y']])) {
            return PositionCode::WALL->value;
        }

        $this->setStepCount($this->getStepCount() + 1);

        return [
            'x' => $position['x'] + 1,
            'y' => $position['y'],
        ];
    }

    /**
     * @param array<string, int> $position
     * @return array<string, int>|int
     */
    public function stepLeft(array $position): array|int
    {
        if ($position['x'] - 1 < 0) {
            return PositionCode::WALL->value;
        }

        $this->setStepCount($this->getStepCount() + 1);

        return [
            'x' => $position['x'] - 1,
            'y' => $position['y'],
        ];
    }

    /**
     * @param $currentPosition
     * @param $maze
     * @return int|string
     */
    public function checkCurrentPosition($currentPosition, $maze): int|string
    {
        if ($currentPosition === PositionCode::WALL->value
            || $maze[$currentPosition['y']][$currentPosition['x']] === PositionCode::WALL->value
            || $currentPosition === []) {
            return GameResult::DEAD->value;
        }

        if ($maze[$currentPosition['y']][$currentPosition['x']] === PositionCode::FINISH->value) {
            return GameResult::FINISH->value;
        }

        return PositionCode::CONTINUE->value;
    }
}