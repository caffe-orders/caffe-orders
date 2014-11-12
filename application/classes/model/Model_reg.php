<?php

class Model_reg extends Model
{
    public function __construct()
    {
        parent::__construct();
    }   
    
    public function FreeLogin($login)
    {
        $query ="SELECT * FROM users WHERE mail=:login";
        $arr = array(
            ":login"=>$login
        );
        $result = $this->select($query,$arr);
        return $result;
    }
    
    public function FreeNumber($number)
    {
        $query ="SELECT * FROM users WHERE telephone = :number";
        $arr=array(":number"=>$number);
        $result = $this->select($query,$arr);
        return $result;
    }
    
    public function Registrate($array)
    {
        $query = "INSERT users (mail,pass,telephone,name,lastname,secret_key,status) VALUES (:mail,:pass,:telephone,:name,:lastname,:secret_key,:status)";
        return $this->insert($query,$array);
    }
}

