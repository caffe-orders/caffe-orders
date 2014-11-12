<?php

class Model_adminpanel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getCaffe($str,$arr=null) 
    {
        $array = $this->select($str,$arr);
        $result = array();
        foreach ($array as $val)
        {
            $result[] = $val;
        }
        return $result;
    }
    
    public function HeadMenu($head="adminPanel")
    {
        switch($head)
        {
            case "adminPanel":
                 $HeadMenu = array( 
            "Главная" => URL,
            "Все кафе" => URL."adminpanel/viewCaffe",
            "Показать заказанные столики" => URL."adminpanel/show_Ordered",
            "Добавить кафе" => URL."adminpanel/addCaffe",
            "Выход"=>URL."authorize/exit"
            );
                break;
            default :
                $HeadMenu = array( 
                "Главная" => URL
                );
                break;
        }        
        return $HeadMenu;
    }
    
    public function content($contentType="index")
    {
        switch($contentType)
        {
            case "index":
                $content = "index";
                break;
            case "addCaffe":
                $content = "addCaffe";
                break;
            case "viewCaffe":
                $content = "viewCaffe";
                break;
            default :
                $content = "";
                break;
        }        
        return $content;
    }
}