<?php

class Model_main extends Model
{
    public function __()
    {
        parent::__construct();
    }
    
    public function HeadMenu($head="main")
    {
        if(Authorize::UserStatus()!=0)
        {
            $head ="mainAuth";
        }
        switch($head)
        {
            case "main":
                $HeadMenu = array( 
                "Главная" => URL,
                //"Новости" => URL."main/news",
                "О нас" => URL."main/about",                
                "Список кафе"=>URL."main/allCaffe",
                "Админ панель" => URL."adminpanel"
                );
                break;
            case "mainAuth":
                $HeadMenu = array( 
                "Главная" => URL,
                //"Новости" => URL."main/news",
                "О нас" => URL."main/about",                
                "Список кафе"=>URL."main/allCaffe",
                "Выйти"=>URL."authorize/exit",
                "Админ панель" => URL."adminpanel"
                );
                break;
            default :
                $HeadMenu = array( 
                "Главная" => URL,
                "Новости" => URL."main/news",
                "О нас" => URL."main/about"
                );
                break;
        }        
        return $HeadMenu;
    }
    
    public function getCaffe($str,$arr=null) 
    {
        return $array = $this->select($str,$arr);
        
    }
    
    public function content($contentType)
    {
        switch($contentType)
        {
            case "index":
                $content = "index";
                break;
            case "about":
                $content = "about";
                break;
            case "news":
                $content = "news";
                break;
            case "allCaffe":
                $content = "allCaffe";
                break;
            default :
                $content = "";
                break;
        }        
        return $content;
    }
}