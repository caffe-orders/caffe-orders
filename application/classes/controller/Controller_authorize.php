<?php

class Controller_authorize extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_authorize();
        if(Authorize::UserStatus()!=0)        //возвращает 0 если пользователь не авторизован        
        {
            Rerouting::Go_to("");           //вернет на домашнюю стр
        }
        $HeadMenu = $this->model->HeadMenu();
        $this->tpl->set('HeadMenu', $HeadMenu);
        $this->data['HeadMenu'] = $this->tpl->generate('elements/HeadMenu');        
    }
    
    public function action_index()
    {        
            $this->data['Content'] = $this->tpl->generate("Authorize/elements/authorize_form");
            $this->view->generate('Authorize/MainPage.tpl',$this->data);        
    }
    
    public function action_exit()
    {        
            Authorize::Close_authorize();
            Rerouting::Back();       
    }
    
    public function action_auth()
    {
        if(isset($_POST['mail']) && isset($_POST['pass']))  
        {
            $mail = $_POST['mail'];
            $pass = $_POST['pass'];
            $res = $this->model->getUser($mail,$pass);
            if($res!=null)
            {
                $user=array();
                foreach($res as $val)
                {
                    $user = $val;
                }
                $key = md5($mail.$pass);
                
                Authorize::Start($key, $user['id']);
            }
        }
        
        if(Authorize::UserStatus()!=0)
            {
                Rerouting::Back();
            }
            else
            {
                Rerouting::Go_to("Authorize");
            }
        exit();        
    }
    
    public function action_jqueryauth()
    {
        if(isset($_POST['mail']) && isset($_POST['pass']))  
        {
            $mail = $_POST['mail'];
            $pass = $_POST['pass'];
            $res = $this->model->getUser($mail,$pass);
            if($res!=null)
            {
                $user=array();
                foreach($res as $val)
                {
                    $user = $val;
                }
                $key = md5($mail.$pass);
                
                Authorize::Start($key, $user['id']);
            }
        }
        
        if(Authorize::UserStatus()!=0)
            {
                echo"auth_true";
            }
        exit();
    }
}

