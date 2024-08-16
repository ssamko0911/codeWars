<?php

declare(strict_types=1);

//https://www.codewars.com/kata/57eb8fcdf670e99d9b000272/train/php

function high($x): string
{
    $scores = array_combine(range('a', 'z'), range(1, 26));

    $words = explode(' ', $x);

    $highScore = 0;
    $winner = '';

    for ($i = 0; $i < count($words); $i++) {
        $tempScore = 0;
        $tempWinner = '';
        for ($j = 0; $j < strlen($words[$i]); $j++) {
            $tempScore += $scores[$words[$i][$j]];
            $tempWinner = $words[$i];
        }

        if ($tempScore > $highScore) {
            $highScore = $tempScore;
            $winner = $tempWinner;
        }
    }

    return $winner;
}

echo high('man i need a taxi up to ubud').PHP_EOL;
echo high('what time are we climbing up the volcano').PHP_EOL;
echo high('take me to semynak').PHP_EOL;

