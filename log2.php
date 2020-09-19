<?php


class log2
{
    private static $dir = "./log/";
    const LEVEL_INFO = 'info';
    const LEVEL_DEBUG = 'debug';
    const LEVEL_ERROR = 'error';
    const LEVEL_WARN = 'warn';


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
        $prefix = date("Y-m-d H:i:s") . " [$level] ";
        $content = $prefix . var_export($data, true) . PHP_EOL;
        $file_name = self::$dir . date("Y-m-d") . ".log";
        file_put_contents($file_name, $content, FILE_APPEND);
    }
}