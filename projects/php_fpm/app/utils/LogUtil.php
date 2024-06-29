<?php
// PHP8.3
declare(strict_types=1);

class LogUtil
{
    // https://datatracker.ietf.org/doc/html/rfc5424
    // https://www.php-fig.org/psr/psr-3/
    public const EMERGENCY = 0;
    public const ALERT = 1;
    public const CRITICAL = 2;
    public const ERROR = 3;
    public const WARNING = 4;
    public const NOTICE = 5;
    public const INFORMATIONAL = 6;
    public const DEBUG = 7;

    private static int $logLevel = LogUtil::DEBUG;

    public static function initialize(int $logLevel)
    {
        LogUtil::$logLevel = $logLevel;
    }

    public static function error(string $message)
    {
        if (LogUtil::ERROR <= LogUtil::$logLevel) {
            error_log('ERROR|' . $message);
        }
    }

    public static function warn(string $message)
    {
        if (LogUtil::WARNING <= LogUtil::$logLevel) {
            error_log('WARN |' . $message);
        }
    }

    public static function info(string $message)
    {
        if (LogUtil::INFORMATIONAL <= LogUtil::$logLevel) {
            error_log('INFO |' . $message);
        }
    }

    public static function debug(string $message)
    {
        if (LogUtil::DEBUG <= LogUtil::$logLevel) {
            error_log('DEBUG|' . $message);
        }
    }
}
