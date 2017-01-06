<?php

namespace Krocos\DateTimeMs;

class DateTimeMs
{
    /**
     * Converts a millisecond timestamp to \DateTime object.
     *
     * @param int $msTimestamp
     *
     * @return \DateTime
     */
    public static function msTimestampToDateTime(int $msTimestamp): \DateTime
    {
        $msTimestamp = $msTimestamp / 1000;
        $milliseconds = round(($msTimestamp - floor($msTimestamp)) * 1000, 0, PHP_ROUND_HALF_UP);
        if ($milliseconds < 100) {
            $milliseconds = str_pad((string) $milliseconds, 3, '0', STR_PAD_LEFT);
        }

        return new \DateTime(date('Y-m-d H:i:s.'.$milliseconds, $msTimestamp), new \DateTimeZone('UTC'));
    }

    /**
     * Converts \DateTime object to a millisecond timestamp.
     *
     * @param \DateTime $dateTime
     *
     * @return int
     */
    public static function dateTimeToMsTimestamp(\DateTime $dateTime): int
    {
        return (int)(round((float) ($dateTime->getTimestamp().'.'.$dateTime->format('u')), 3, PHP_ROUND_HALF_UP) * 1000);
    }

    /**
     * Creates new \DateTime object with milliseconds.
     *
     * @return \DateTime
     */
    public static function newDateTimeMs(): \DateTime
    {
        [$microseconds, $timestamp] = explode(' ', microtime());
        $msTimestamp = round((float) $timestamp + (float) $microseconds, 3, PHP_ROUND_HALF_UP) * 1000;

        return self::msTimestampToDateTime($msTimestamp);
    }
}
