<?php

use DanHarrin\DateFormatConverter\Format;

if (! function_exists('convert_date_format')) {
    function convert_date_format($format)
    {
        return new Format($format);
    }
}