<?php
use Illuminate\Support\Carbon;

if (!function_exists('wib')) {
    /**
     * Convert UTC time to Asia/Jakarta timezone
     *
     * @param string|null $datetime Waktu dalam UTC (atau null untuk waktu sekarang)
     * @param string $format Format output (default: 'Y-m-d H:i:s')
     * @return string
     */
    function wib($datetime = null, $format = 'Y-m-d H:i:s')
    {
        $datetime = $datetime ?? now();
        return Carbon::parse($datetime, 'UTC')->setTimezone('Asia/Jakarta')->format($format);
    }
}

if (!function_exists('readableDate')) {
    /**
     * Convert datetime to a readable format like "Nov 30, 2024"
     *
     * @param string|null $datetime Waktu dalam UTC atau lainnya (null untuk waktu sekarang)
     * @param string $timezone Zona waktu (default: Asia/Jakarta)
     * @return string
     */
    function readableDate($datetime = null, $timezone = 'Asia/Jakarta')
    {
        $datetime = $datetime ?? now();
        return Carbon::parse($datetime, 'UTC')->setTimezone($timezone)->format('M d, Y');
    }
}

function img($path, $img)
{
    return url('public/images/'.$path.$img);
}
