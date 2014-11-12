<?php

class Controller_reg extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_reg();
        if(Authorize::UserStatus()!=0)
        {
            Rerouting::Go_to("");
        }
    }
    
    public function action_index()
    {
        $err="";
        if(isset($_POST['mail'])&&$_POST['mail']!="" && $_POST['pass']!="" && $_POST['telephone']!="" && $_POST['name']!="" && $_POST['lastname']!="")
        {
            $mail = $_POST['mail'];
            $pass = $_POST['pass'];
            $telephone = $_POST['telephone'];
            $name = $_POST['name'];
            $lastname =$_POST['lastname'];
            
            $loginFree = $this->model->Freelogin($mail);
            if($loginFree!=null)
            {
                $err +="Извините, но данные email уже знят</br>";
            }
            $telephoneFree = $this->model->FreeNumber($telephone);
            
            if($telephoneFree!=null)
            {
                $err +="Извините, но данные телефон уже зарегистрирован другим пользователем.Если этот телефон пренадлежит вам, обратитесь в <a href='".URL."support'>службу поддержки</a></br>";
            }
            if($err=="")
            {
                $key = md5($mail.$pass);
                $arr = array(
                ":mail"=>$mail,
                ":pass"=>$pass,
                ":telephone"=>$telephone,
                ":name"=>$name,
                ":lastname"=>$lastname,
                ":secret_key"=>$key,
                ":status"=>1
                );            
                $this->model->Registrate($arr);
                $err = "Вы зарегистрированны!Можете <a href='".URL."authorize'>авторизоваться</a>";
            }
        }
        $this->tpl->set("error",$err);
        $this->data['Content'] = $this->tpl->generate("reg/elements/registration_form");
        $this->view->generate('reg/MainPage.tpl',$this->data);
    }
}