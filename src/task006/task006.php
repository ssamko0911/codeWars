<?php

declare(strict_types=1);

//https://www.codewars.com/kata/57f625992f4d53c24200070e/train/php

function bingo(array $ticket, int $win): string
{
    $labels = [
        'winner' => 'Winner!',
        'loser' => 'Loser!',
    ];

    $countMiniWins = 0;

    foreach ($ticket as $item) {
        $chars = $item[0];
        $match = $item[1];

        $tempMiniWin = 0;
        for ($i = 0; $i < strlen($chars); $i++) {
            if (ord($chars[$i]) === $match) {
                $tempMiniWin++;
            }
        }

        if ($tempMiniWin >= 1) {
            $countMiniWins++;
        }
    }

    return $countMiniWins >= $win ? $labels['winner'] : $labels['loser'];
}

echo bingo([['ABC', 65], ['HGR', 74], ['BYHT', 74]], 2).PHP_EOL;
echo bingo([['ABC', 65], ['HGR', 74], ['BYHT', 74]], 1).PHP_EOL;
echo bingo([['HGTYRE', 74], ['BE', 66], ['JKTY', 74]], 3).PHP_EOL;