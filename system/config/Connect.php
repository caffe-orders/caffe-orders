<?php

class Connect
{
    public  $db;
    private $database_host = 'mysql.caffe-orders.ru';
    private $database_user = 'vh206740_dvd2444';
    private $database_pass = '123456q';
    private $database_db = 'vh206740_startup';
    private $DBtype = "mysql";
    function __construct()
    {
         $dsn =  $this->DBtype.":dbname=" . $this->database_db . ";host=" . $this->database_host;
        try
        {
            $this->db = new PDO($dsn, $this->database_user, $this->database_pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->query("set names utf8");
        } 
        catch (PDOException $e)
        {            
            echo 'Error : '.$e->getMessage();
            exit();            
        }
    }
    
   

}

