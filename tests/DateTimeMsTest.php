<?php

namespace Tests;

use Krocos\DateTimeMs\DateTimeMs;

class DateTimeMsTest extends \PHPUnit_Framework_TestCase
{
    public function testConverting()
    {
        // Получаем таймштамп из времени с миллисекундами
        $dt = new \DateTime('2017-01-01 15:15:12.056545', new \DateTimeZone('UTC'));
        $mstimestamp = DateTimeMs::dateTimeToMsTimestamp($dt);
        // Проверяем, что получился правильный милли-таймштамп
        $this->assertEquals(1483283712057, $mstimestamp);
        // Конвертируем этот милли-тиаймштамп обратно в \DateTime объект
        $dtConverted = DateTimeMs::msTimestampToDateTime($mstimestamp);
        // Должен получиться ожидаемый объект
        $this->assertEquals(new \DateTime('2017-01-01 15:15:12.057000', new \DateTimeZone('UTC')), $dtConverted);
    }

    public function testCreating()
    {
        $microseconds = (int)DateTimeMs::newDateTimeMs()->format('u');
        $this->assertGreaterThanOrEqual(0, $microseconds);
    }
}
