<?php

class Controller
{
    public $model;
    public $view;
    public $data;
    public $tpl;
    public $id;
    function __construct()
    {
        $this->view = new View();
        $this->tpl = new Tpl();
    }   
    
    
}