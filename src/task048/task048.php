<?php

declare(strict_types=1);

//https://www.codewars.com/kata/58663693b359c4a6560001d6/train/php

use App\task048\Entity\MazeRunner;
use App\task048\Enum\GameResult;

function maze_runner($maze, $directions): string
{
    $mazeRunner = new MazeRunner($directions, $maze, count($directions));

    $currentPosition = $mazeRunner->getInitialPosition($maze);

    foreach ($mazeRunner->getRoute() as $stepDirection) {
        $currentPosition = match ($stepDirection) {
            'N' => $mazeRunner->stepUp($currentPosition),
            'S' => $mazeRunner->stepDown($currentPosition, $maze),
            'E' => $mazeRunner->stepRight($currentPosition, $maze),
            'W' => $mazeRunner->stepLeft($currentPosition),
            default => [],
        };

        if ($mazeRunner->checkCurrentPosition($currentPosition, $mazeRunner->getMaze()) === GameResult::DEAD->value) {
            return GameResult::DEAD->value;
        }

        if ($mazeRunner->checkCurrentPosition($currentPosition, $mazeRunner->getMaze()) === GameResult::FINISH->value) {
            return GameResult::FINISH->value;
        }
    }

    $totalStepMade = $mazeRunner->getStepCount();
    $stepLimit = $mazeRunner->getStepLimit();

    if ($totalStepMade >= $stepLimit && $mazeRunner->checkCurrentPosition($currentPosition, $mazeRunner->getMaze()) !== GameResult::FINISH->value) {
        return GameResult::LOST->value;
    }

    return GameResult::FINISH->value;
}

$maze = [
    [1, 1, 1, 1, 1, 1, 1],
    [1, 0, 0, 0, 0, 0, 3],
    [1, 0, 1, 0, 1, 0, 1],
    [0, 0, 1, 0, 0, 0, 1],
    [1, 0, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 1],
    [1, 2, 1, 0, 1, 0, 1]
];

//
echo maze_runner($maze, ["N", "N", "N", "W", "W"]) . PHP_EOL;
echo maze_runner($maze, ["N", "N", "N", "N", "N", "E", "E", "S", "S", "S", "S", "S", "S"]) . PHP_EOL;
echo maze_runner($maze, ["N", "N", "N", "N", "N", "E", "E", "E", "E", "E"]) . PHP_EOL; // Finish
echo maze_runner($maze, ["N", "E", "E", "E", "E"]) . PHP_EOL;
echo maze_runner($maze, ["N","N","N","N","N","E","E","E","E","E","W","W"]) . PHP_EOL;

/*
Dead
Dead
Finish
Lost
Finish
 */



/*Working
 * function maze_runner($maze, $directions): string
{
    print_r($directions);
    $mazeRunner = new MazeRunner($directions, $maze, count($directions));

    $currentPosition = $mazeRunner->getInitialPosition($maze);
    foreach ($directions as $step) {
        switch ($step) {
            case 'N':
                $mazeRunner->setStepCount($mazeRunner->getStepCount() + 1);
                $currentPosition = $mazeRunner->stepUp($currentPosition);
                print_r($currentPosition);
                break;
            case 'S':
                $mazeRunner->setStepCount($mazeRunner->getStepCount() + 1);
                $currentPosition = $mazeRunner->stepDown($currentPosition, $maze);
                break;
            case 'E':
                $mazeRunner->setStepCount($mazeRunner->getStepCount() + 1);
                $currentPosition = $mazeRunner->stepRight($currentPosition, $maze);
            print_r($currentPosition);
                break;
            case 'W':
                $mazeRunner->setStepCount($mazeRunner->getStepCount() + 1);
                $currentPosition = $mazeRunner->stepLeft($currentPosition, $maze);
                break;
        }

        if ($mazeRunner->checkPosition($currentPosition, $maze, $mazeRunner->getValues()) === 'Dead') {
            return 'Dead';
        }

            if ($mazeRunner->checkPosition($currentPosition, $maze, $mazeRunner->getValues()) === 'Finish') {
            return 'Finish';
        }
    }

    $count = $mazeRunner->getStepCount();
    print $count;
    $limit = $mazeRunner->getStepLimit();
    echo $limit;
    echo $mazeRunner->checkPosition($currentPosition, $maze, $mazeRunner->getValues());
  if ($count >= $limit && $mazeRunner->checkPosition($currentPosition, $maze, $mazeRunner->getValues()) !== 'Finish') {
        return 'Lost';
    }

    return 'Finish';
}

final class MazeRunner
{
    private array $values = [
        0 => 'continue',
        1 => 'wall',
        2 => 'start',
        3 => 'finish',
    ];

    private int $stepCount = 0;
    /**
     * @return array

     */
//public function getValues(): array
//{
//    return $this->values;
//}
//
///**
// * @return int
// */
//public function getStepCount(): int
//{
//    return $this->stepCount;
//}
//
///**
// * @param int $stepCount
// */
//public function setStepCount(int $stepCount): void
//{
//    $this->stepCount = $stepCount;
//}
//
//
//public function __construct(
//    private array $route,
//    private array $maze,
//    private int   $stepLimit
//)
//{
//}
//
///**
// * @return array
// */
//public function getRoute(): array
//{
//    return $this->route;
//}
//
///**
// * @param array $route
// */
//public function setRoute(array $route): void
//{
//    $this->route = $route;
//}
//
///**
// * @return array
// */
//public function getMaze(): array
//{
//    return $this->maze;
//}
//
///**
// * @param array $maze
// */
//public function setMaze(array $maze): void
//{
//    $this->maze = $maze;
//}
//
///**
// * @return int
// */
//public function getStepLimit(): int
//{
//    return $this->stepLimit;
//}
//
///**
// * @param int $stepLimit
// */
//public function setStepLimit(int $stepLimit): void
//{
//    $this->stepLimit = $stepLimit;
//}
//
//public function getInitialPosition(array $maze): array
//{
//    $start = [];
//    for ($i = 0; $i < count($maze); $i++) {
//        for ($j = 0; $j < count($maze[$i]); $j++) {
//            if ($maze[$i][$j] === 2) {
//                $start['x'] = $j;
//                $start['y'] = $i;
//                return $start;
//            }
//        }
//    }
//
//    return $start;
//}
//
//public function stepUp(array $position): array|string
//{
//    if ($position['y'] - 1 < 0) {
//        return 'Dead';
//    }
//
//    return [
//        'x' => $position['x'],
//        'y' =>  $position['y'] - 1,
//    ];
//}
//
//public function stepDown(array $position, $maze)
//{
//    if ($position['y'] + 1 === count($maze)) {
//        return 'Dead';
//    }
//
//    return [
//        'x' => $position['x'],
//        'y' => $position['y'] + 1,
//    ];
//}
//
//public function stepRight(array $position, $maze): array|string
//{
//    if ($position['x'] + 1 === count($maze[$position['y']])) {
//        return 'Dead';
//    }
//
//    return [
//        'x' => $position['x'] + 1,
//        'y' => $position['y'],
//    ];
//}
//
//public function stepLeft(array $position, $maze): array|string
//{
//    if ($position['x'] - 1 < 0) {
//        return 'Dead';
//    }
//
//    return [
//        'x' => $position['x'] - 1,
//        'y' => $position['y'],
//    ];
//}
//
//public function checkPosition($currentPosition, $maze, $values)
//{
//    if ($currentPosition === 'Dead') {
//        return 'Dead';
//    }
//
//    if ($maze[$currentPosition['y']][$currentPosition['x']] === 1) {
//        return 'Dead';
//    }
//
//    if ($maze[$currentPosition['y']][$currentPosition['x']] === 3) {
//        return 'Finish';
//    }
//
//    return $values[0];
//}
//}
// */




