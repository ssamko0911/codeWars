<?php
declare(strict_types=1);

//https://www.codewars.com/kata/5679aa472b8f57fb8c000047/php

/**
 * @param array $array
 * @return int
 */
function findEvenIndex(array $array): int
{
    for ($i = 0; $i < count($array); $i++) {
        $leftPart = getLeftPart($array, $i);
        $rightPart = getRightPart($array, $i);
        $comparison = compareParts($leftPart, $rightPart);

        if ($comparison) {
            return $i;
        }
    }

    return -1;
}

/**
 * @param int[] $leftPart
 * @param int[] $rightPart
 * @return bool
 */
function compareParts(array $leftPart, array $rightPart): bool
{
    if (array_sum($leftPart) === array_sum($rightPart)) {
        return true;
    }

    return false;
}

/**
 * @param int[] $array
 * @param int $index
 * @return int[]
 */
function getRightPart(array $array, int $index): array
{
    if ($index === count($array) - 1) {
        return [];
    }

    return array_slice($array, $index + 1);
}

/**
 * @param int[] $array
 * @param int $index
 * @return int[]
 */
function getLeftPart(array $array, int $index): array
{
    if ($index === 0) {
        return [];
    }

    return array_slice($array, 0, $index);
}
