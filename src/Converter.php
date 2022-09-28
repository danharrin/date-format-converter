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

        $escape = false;
        foreach (str_split($this->format) as $token) {
            if ($escape) {
                $format .= "[{$token}]";
                $escape = false;
                continue;
            }

            if ($token === '\\') {
                $escape = true;
                continue;
            }

            $format .= array_key_exists($token, DATE_FORMAT_STANDARDS) ?
                DATE_FORMAT_STANDARDS[$token][$standard] :
                $token;
        }

        $format = str_replace('][', '', $format);

        return $format;
    }
}
