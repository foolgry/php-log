<?php


class log1
{
    private static $dir = "./log/";

    public static function writeLog($data)
    {
        $prefix = date("Y-m-d H:i:s") . ' ';
        $content = $prefix . var_export($data, true) . PHP_EOL;
        $file_name = self::$dir . date("Y-m-d") . ".log";
        file_put_contents($file_name, $content, FILE_APPEND);
    }
}