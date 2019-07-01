<?php

namespace Whise;

final class DateEncoder
{
    public static function encode(\DateTime $date): ?string
    {
        if ($date < new \DateTime('1753-01-01 00:00:00') || $date > new \DateTime('9999-12-31 23:59:59')) {
            return null;
        }
        $timestamp = $date->getTimestamp() * 1000;
        $timezone = $date->getTimezone();
        $offset = $timezone ? round($timezone->getOffset($date) / 3600) : 0;
        return '/Date(' . $timestamp . ($offset ? sprintf('%+03d00', $offset) : '') . ')/';
    }
}
