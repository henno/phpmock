<?php
/**
 * Created by PhpStorm.
 * User: henno
 * Date: 30/10/2018
 * Time: 12:35
 */

class HTTP
{
    static function get($url)
    {
        return json_decode(file_get_contents($url));
    }
}