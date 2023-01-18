<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{
    public static function user()
    {
        $log = new Logger('user');
        $log->pushHandler(new StreamHandler(storage_path('logs/user.log'), Logger::INFO));

        return $log;
    }
}
