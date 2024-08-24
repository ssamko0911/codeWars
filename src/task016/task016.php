<?php

declare(strict_types=1);

//https://www.codewars.com/kata/5679aa472b8f57fb8c000047/php

const ZERO_CHARACTER = '0';

function getExpandedForm(int $number): string
{
    $numberAsString =  strval($number);

    $numberExpandedForm = '';

    for ($i = 0; $i < strlen($numberAsString); $i++) {
        if ($numberAsString[$i] !== ZERO_CHARACTER) {
            $numberExpandedForm .= getPlaceDigit($i, $numberAsString);
        }
    }

    return rtrim($numberExpandedForm, ' +');
}

function getPlaceDigit(int $digitIndex, string $number): string
{
    $zeroQuantity = strlen($number) - $digitIndex - 1;

    //TODO: str_repeat -> var
    //TODO: sprintf -> var

    return sprintf('%d + ', $number[$digitIndex] . str_repeat(ZERO_CHARACTER, $zeroQuantity));
}
