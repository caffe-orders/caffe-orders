<?php

class Model_authorize extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model();
    }
    
    public function getUserStatus($key,$id)
    {
        $sql="SELECT * FROM `users` WHERE id = :id AND secret_key = :key";
        $arr = array(
            ":id"=>$id,
            ":key"=>$key
        );
        $query = $this->model->select($sql,$arr);
        
        if($query!=null)
        {
            return $query[0]['status'];
        }
        else
        {
            return 0;
        }
    }
    public function getUser($mail,$pass)
    {
        $sql="SELECT * FROM users WHERE mail=:mail AND pass=:pass";
        $arr = array(
            ":mail"=>$mail,
            ":pass"=>$pass
        );
        $query = $this->model->select($sql,$arr);
        return $query;
    }
    
    public function HeadMenu($head="")
    {
        switch($head)
        {
            case "adminPanel":
                 $HeadMenu = array( 
            "Главная" => URL
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
}