<?php

namespace DanHarrin\DateFormatConverter;

class Converter
{
    public $format;

    public function __construct($format)
    {
        $this->format = $format;
    }

    public function to($standard)
    {
        $format = '';

        foreach (str_split($this->format) as $token) {
            $format .= array_key_exists($token, DATE_FORMAT_STANDARDS) ?
                DATE_FORMAT_STANDARDS[$token][$standard] :
                $token;
        }

        return $format;
    }
}