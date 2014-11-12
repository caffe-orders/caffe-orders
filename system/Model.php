<?php

class Model extends Connect
{   
    function __construct()
    {
        //Cоединяюсь с БД
        parent::__construct();

        //$this->connect = new Connect();
    }
    
    public function insert($str,$array)
    {  
        $sth = $this->db->prepare($str);
        $sth->execute($array);
        return $this->db->lastInsertId();
    }
    
    public function select($str,$array=null)
    {
        $sth = $this->db->prepare($str);
        $sth->execute($array);
        return $sth->fetchAll();
    }
    
    public function delete($str,$array)
    {
        $sth = $this->db->prepare($str);
        $sth->execute($array);
    }
    
    public function update($str,$array)
    {
        $sth = $this->db->prepare($str);
        $sth->execute($array);
    }    
}

