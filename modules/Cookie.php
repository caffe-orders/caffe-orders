<?php

class Cookie extends Sessions
{    
    static function Add_Cookie($identificate,$value,$lifetime=36000)
    {
        setcookie($identificate,$value,time()+$lifetime);
    }
    
    static function Set_Cookie($identificate,$value,$lifetime=36000)
    {
        if(isset($_COOKIE[$identificate]))
        {
            $_COOKIE[$identificate]=$value;
        }
    }
    static function Get_Cookie($identificate)
    {
        if(isset($_COOKIE[$identificate]))
        {
            return $_COOKIE[$identificate];
        }
        else
        {
            return false;
        }
    }
    
    static function Delete_Cookie($identificate)
    {
        if(isset($_COOKIE[$identificate]))
        {
            setcookie($identificate, "", 1);
        }        
    }
}