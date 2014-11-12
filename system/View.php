<?php

class View
{
    private $data;
    public function generate($main_page,$data=null)
    {  
        $this->data = $data;
        if(file_exists(APPPATH.'view/'.$main_page))
        {
            include_once (APPPATH.'view/'.$main_page);            
        }
        else
        {
            echo "Page not found";
        }
    }    
    
    public function __get($name)
    {
        if (isset($this->data[$name]))
        {
            return $this->data[$name];
        }
        else 
        {
            return "";            
        }        
    }    
}
