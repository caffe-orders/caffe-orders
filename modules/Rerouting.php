<?php

class Rerouting
{
    static function Go_to($path)
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('Location:'.$host.$path);
    }
    
    static function Back()
    {
        if($_SERVER['HTTP_REFERER']!=="" && $_SERVER['HTTP_REFERER']!=null)
        {
            $host = $_SERVER['HTTP_REFERER'];
        }
        else 
        {
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        }
        header('Location:'.$host);
    }
}