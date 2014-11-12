<?php

class Sessions
{
    static function Add_session($identificate,$value)
    {
        try 
        {
            if(!isset($_SESSION[$identificate]))
            {
                $_SESSION[$identificate]=$value;
            }
        } 
        catch (Exception $ex)
        {
            $ex = "Сессия не инициализируется";
            throw $ex;
        }
    }
    
    static function Set_session($identificate,$value)
    {
        try 
        {
            if(isset($_SESSION[$identificate]))
            {
                $_SESSION[$identificate]=$value;
            }
        } 
        catch (Exception $ex)
        {
            $ex = "Сессия не инициализируется";
            throw $ex;
        }
    }
    
    static function Get_Session($identificate)
    {
        if(isset($_SESSION[$identificate]))
        {
            return $_SESSION[$identificate];
        }
        else
        {
            return false;
        }
    }
    
    static function Delete_session($identificate)
    {
        Sessions::Set_session($identificate,'');
    }
}