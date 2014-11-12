<?php

class Authorize
{  
    static function Start($key,$id)
    {
        Sessions::Delete_session("key");
        Sessions::Delete_session("id");
        Sessions::Add_session("key", $key);
        Sessions::Add_session("id", $id);
            
        Cookie::Add_Cookie("key", $key);
        Cookie::Add_Cookie("id", $id);
    }
    static function UserStatus()
    {
        $MODEL = new Model_authorize();
        
        $session_key = Sessions::Get_Session("key");
        $session_id = Sessions::Get_Session("id");
        
        $cookie_key = Cookie::Get_Cookie("key");
        $cookie_id = Cookie::Get_Cookie("id");
        if($session_key!="" && $session_id!="")
        {
            $status = $MODEL->getUserStatus($session_key,$session_id);
            if($status!=null)
            {
                return $status;
            }
            else
            {
                return 0;
            }
        }
        elseif ($cookie_key!=""  && $cookie_id!="") 
        {      
            $status = $MODEL->getUserStatus($cookie_key,$cookie_id);
            if($status!=null)
            {
                Sessions::Add_session("key", $cookie_key);
                Sessions::Add_session("id", $cookie_id);
                return $status;
            }
        }
        else
        {            
            return 0;
        }
    }
    
    static function Close_authorize()
    {
        session_destroy();
        Cookie::Delete_Cookie("key");
        Cookie::Delete_Cookie("id");
    }

}
