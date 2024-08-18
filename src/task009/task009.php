<?php

declare(strict_types=1);

//https://www.codewars.com/kata/56af1a20509ce5b9b000001e/train/php

function travel(string $address, string $zipcode): string
{
    define("ZIP_CODE_LENGTH", 8);
    $result = "$zipcode:/";

    $addressList = explode(',', $address);
    $streetNumbers = [];
    $streetNames = [];

    foreach ($addressList as $address) {
        if (strpos($address, $zipcode) && strlen($zipcode) === ZIP_CODE_LENGTH) {
            $address = str_replace($zipcode, '', $address);
            $streetNumber = preg_replace("/[^0-9]/", '', $address);
            $streetNumbers[] = $streetNumber;
            $streetName = trim(str_replace($streetNumber, '', $address));
            $streetNames[] = $streetName;
        }
    }

    if (empty($streetNumbers)) {
        return $result;
    }

    $streetNumbersToString = implode(',', $streetNumbers);
    $streetNamesToString = implode(',', $streetNames);

    return rtrim($result, '/') . $streetNamesToString . '/'. $streetNumbersToString;
}
