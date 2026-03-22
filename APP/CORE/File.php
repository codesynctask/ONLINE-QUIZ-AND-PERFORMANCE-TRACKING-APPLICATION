<?php

class File
{
    /* Check if file exists */
    public static function exists(string $path): bool
    {
        return file_exists($path);
    }

    /* Read file content */
    public static function read(string $path): string
    {
        return  file_get_contents($path) ;
    }

    /* Write data to file (overwrite) */
    public static function write(string $path, string $data): bool
    {
        return file_put_contents($path, $data) !== false;
    }

}