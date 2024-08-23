<?php

declare(strict_types=1);

//https://www.codewars.com/kata/586538146b56991861000293/train/php

const NATO_ALPHABET = [
    'A' => 'Alpha',
    'B' => 'Bravo',
    'C' => 'Charlie',
    'D' => 'Delta',
    'E' => 'Echo',
    'F' => 'Foxtrot',
    'G' => 'Golf',
    'H' => 'Hotel',
    'I' => 'India',
    'J' => 'Juliet',
    'K' => 'Kilo',
    'L' => 'Lima',
    'M' => 'Mike',
    'N' => 'November',
    'O' => 'Oscar',
    'P' => 'Papa',
    'Q' => 'Quebec',
    'R' => 'Romeo',
    'S' => 'Sierra',
    'T' => 'Tango',
    'U' => 'Uniform',
    'V' => 'Victor',
    'W' => 'Whiskey',
    'X' => 'Xray',
    'Y' => 'Yankee',
    'Z' => 'Zulu',
];

function toNatoAlphabet(string $string): string
{
    $result = '';

    $words = explode(' ', $string);

    foreach ($words as $word) {
        for ($i = 0; $i < strlen($word); $i++) {
            $key = strtoupper($word[$i]);
            if (array_key_exists($key, NATO_ALPHABET)) {
                $result .= NATO_ALPHABET[$key].' ';
            } else {
                $result .= $word[$i].' ';
            }
        }
    }

    return rtrim($result);
}
