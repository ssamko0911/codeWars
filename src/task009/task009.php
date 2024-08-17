<?php

declare(strict_types=1);

//https://www.codewars.com/kata/56af1a20509ce5b9b000001e/train/php

function travel(string $address, string $zipcode): string
{
    $resultString = "$zipcode:/";

    $addressList = explode(',', $address);
    $addressNumbers = [];
    $addressStrings = [];

    foreach ($addressList as $address) {
        if (strpos($address, $zipcode) && strlen($zipcode) === 8) {
            $address = str_replace($zipcode, '', $address);

            $number = explode(' ', trim($address))[0];
            $addressNumbers[] = $number;
            $addressStrings[] = trim(substr($address, strlen($number)));
        }
    }

    if (empty($addressNumbers)) {
        return $resultString;
    }

    return rtrim($resultString, '/').implode(',', $addressStrings).'/'.implode(',', $addressNumbers);
}
