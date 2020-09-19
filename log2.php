<?php


class log2
{
    const LEVEL_INFO = 'info';
    const LEVEL_DEBUG = 'debug';
    const LEVEL_ERROR = 'error';
    const LEVEL_WARN = 'warn';

    //日志文件目录
    const DIR = __DIR__ . './log/';
    //日志记录级别
    const WRITE_LEVEL = 'info';


    public static function info($data)
    {
        self::write($data, self::LEVEL_INFO);
    }

    public static function debug($data)
    {
        self::write($data, self::LEVEL_DEBUG);
    }

    public static function error($data)
    {
        self::write($data, self::LEVEL_ERROR);
    }

    public static function warn($data)
    {
        self::write($data, self::LEVEL_WARN);
    }

    public static function write($data, $level)
    {
        if (self::isWrite($level)) {
            $prefix = date("Y-m-d H:i:s") . " [$level] ";
            $content = $prefix . var_export($data, true) . PHP_EOL;
            $file_name = self::DIR . date("Y-m-d") . ".log";
            file_put_contents($file_name, $content, FILE_APPEND);
        }
    }

    private static function isWrite($level)
    {
        return self::compareLevel($level) >= 0;
    }

    private static function compareLevel($level)
    {
        $debug = 1;
        $info = 2;
        $warn = 3;
        $error = 4;

        $writeLevel = self::WRITE_LEVEL;
        return $$level - $$writeLevel;
    }
}