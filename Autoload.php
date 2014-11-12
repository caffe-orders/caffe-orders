<?php

function __autoload($className)
{ 
    if (file_exists($className . '.php'))
    { 
       require_once $className . '.php';          
    } 
    if(file_exists(APPPATH.'Configurates/'.$className . '.php'))
    {
        require_once APPPATH.'Configurates/'.$className . '.php'; 
    }
    if(file_exists(APPPATH.'classes/'.$className . '.php'))
    {
        require_once APPPATH.'classes/'.$className . '.php'; 
    }
    if(file_exists(APPPATH.'classes/controller/'.$className . '.php'))
    {
        require_once APPPATH.'classes/controller/'.$className . '.php'; 
    }
    if(file_exists(APPPATH.'classes/model/'.$className . '.php'))
    {
        require_once APPPATH.'classes/model/'.$className . '.php'; 
    }
    if(file_exists(MODPATH.$className . '.php'))
    {
        require_once MODPATH.$className . '.php'; 
    }
    if(file_exists(SYSPATH.$className . '.php'))
    {
        require_once SYSPATH.$className . '.php'; 
    }
    if(file_exists(SYSPATH.'config/'.$className . '.php'))
    {
        require_once SYSPATH.'config/'.$className . '.php'; 
    }
} 