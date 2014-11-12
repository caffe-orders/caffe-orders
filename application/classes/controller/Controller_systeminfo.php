<?php

class Controller_systeminfo extends Controller
{
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function action_index()
    {
        
        $today[1] = date("H:i:s");
        echo("Текущее время: $today[1].");
        exit();
    }
}