# DateTimeMs

Helps with conversions of JS-timestamps to \DateTime objects and to save a date and a time to database with microseconds (PHP and PostgreSQL (rof example) use microseconds internal, not milliseconds).

## Creating

Creating \DateTime object with milliseconds:
```php
use Krocos\DateTimeMs\DateTimeMs;

$dateTimeWithMilliseconds = DateTimeMs::newDateTimeMs();
```

## Converting

Converting to millisecond timestamp:
```php
use Krocos\DateTimeMs\DateTimeMs;

$msTimestamp = DateTimeMs::dateTimeToMsTimestamp($datetimeObject)
```

Converting from a millisecond timestamp to \DateTime object with milliseconds:
```php
use Krocos\DateTimeMs\DateTimeMs;

$msDatetime = DateTimeMs::msTimestampToDateTime($msTimestamp);
```
