<?php

declare(strict_types=1);

//https://www.codewars.com/kata/55e2adece53b4cdcb900006c/train/php

const HOUR_TO_SECONDS = 3600;
const TIME_UNIT = 60;

/**
 * @param $speedTortoiseOne
 * @param $speedTortoiseTwo
 * @param $distance
 * @return int[]|null
 */
function race($speedTortoiseOne, $speedTortoiseTwo, $distance): array|null
{
    if ($speedTortoiseOne >= $speedTortoiseTwo) {
        return null;
    }

    $approachSpeed = $speedTortoiseTwo - $speedTortoiseOne;

    return getTimeAsArray($distance / $approachSpeed);
}

/**
 * @param float $timeAsDecimal
 * @return int[]
 */
function getTimeAsArray(float $timeAsDecimal): array
{
    $seconds = floor($timeAsDecimal * HOUR_TO_SECONDS);
    $hours = floor($timeAsDecimal);
    $seconds = $seconds - $hours * HOUR_TO_SECONDS;
    $minutes = floor($seconds / TIME_UNIT);
    $seconds = $seconds - $minutes * TIME_UNIT;

    return [
        $hours,
        $minutes,
        $seconds,
    ];
}
