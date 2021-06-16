<?php

use Propaganistas\LaravelPhone\PhoneNumber;

if (! function_exists('make_phone_normalized')) {

    /**
     * @param string $rawPhone
     * @return string
     */
    function make_phone_normalized(string $rawPhone): string
    {
        return str_replace('+', '', PhoneNumber::make($rawPhone, 'RU')->formatE164());
    }
}
