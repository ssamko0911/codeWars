<?php

declare(strict_types=1);

//https://www.codewars.com/kata/581e014b55f2c52bb00000f8/train/php

function decipher(string $string): string
{
    $result = '';

    $words = explode(' ', $string);

    foreach ($words as $word) {
        $getCharCode = preg_replace("/[^0-9]/", '', $word);
        $result .= chr(intval($getCharCode));

        $restString = trim(str_replace($getCharCode, '', $word));
        $firstLetter = substr($restString, 0, 1);
        $lastLetter = substr($restString, -1, 1);

        if (!empty($firstLetter) && $firstLetter !== ' ' || !empty($lastLetter) && $lastLetter !== ' ') {
            $restString[0] = $lastLetter;
            $restString[strlen($restString) - 1] = $firstLetter;
        }

        $result .= "$restString ";
    }

    return rtrim($result);
}
