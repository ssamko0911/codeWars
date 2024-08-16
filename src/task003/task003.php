<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5a55f04be6be383a50000187/train/php

function specialNumber($n): string {
    $labels = [
        'special' => 'Special!!',
        'notSpecial' => 'NOT!!',
    ];

    $specialDigits = [0, 1, 2, 3, 4, 5];

    foreach (str_split((string)$n) as $digit) {
        if (!in_array($digit, $specialDigits)) {
            return $labels['notSpecial'];
        }
    }

    return $labels['special'];
}

echo specialNumber(2) . PHP_EOL;

echo specialNumber(55) . PHP_EOL;

echo specialNumber(25432) . PHP_EOL;

echo specialNumber(2783) . PHP_EOL;