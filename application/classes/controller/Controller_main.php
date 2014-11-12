<?php

class Controller_main extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_main();   
        $HeadMenu = $this->model->HeadMenu();        
        $this->tpl->set('HeadMenu', $HeadMenu);          
        $this->data['HeadMenu'] = $this->tpl->generate('elements/HeadMenu');
        if($curl = curl_init()) 
        {
        curl_setopt($curl, CURLOPT_URL, 'http://api.caffe-orders.ru/auth/login?email=azaza&password=123');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $bodyData = json_decode(curl_exec($curl), true);
        curl_close($curl);
        }
    }
    function action_index()
    {      
        if($curl = curl_init()) 
        {
        curl_setopt($curl, CURLOPT_URL, 'http://api.caffe-orders.ru/caffes/list?limit=10&offset=0');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $bodyData = json_decode(curl_exec($curl), true);
        curl_close($curl);
        }       
        $caffe = $bodyData['data'];
        $this->tpl->set("caffe",$caffe);
        $caffeList = $this->tpl->generate("main/generate/CaffeList");
        $this->tpl->set("caffeList",$caffeList);
        $this->data['Content'] = $this->tpl->generate("main/elements/ContentViewCaffe");
        $this->view->generate('main/MainPage.tpl',$this->data);
    }
    
    function action_news()
    {
        $this->data['Content'] = $this->model->content("news");
        $this->view->generate('main/MainPage.tpl',$this->data);
    }
    
    function action_about()
    {
        $this->data['Content'] = $this->tpl->generate("main/generate/about");
        $this->view->generate('main/MainPage.tpl',$this->data);
    }
    
    function action_allcaffe($id)
    {
        $query="SELECT * FROM caffe ORDER BY `id` DESC LIMIT 0, 10";        
        $caffe = $this->model->getCaffe($query);
        $this->tpl->set("caffe",$caffe);
        $caffeList = $this->tpl->generate("main/generate/CaffeList");
        $this->tpl->set("caffeList",$caffeList);
        $this->data['Content'] = $this->tpl->generate("main/elements/ContentViewCaffe");
        $this->view->generate('main/MainPage.tpl',$this->data);
    }
    
    public function action_onlineviewcaffe($id)
    {
        
        if(is_numeric($id))
        {
            $query="SELECT * FROM caffe ORDER BY `id` DESC LIMIT $id, 10";        
            $caffes = $this->model->getCaffe($query);
            if($caffes!=null)
            {
                foreach($caffes as $caffe)
                {
                    $result[] = $caffe;
                }
                $this->tpl->set("caffe",$result);
                echo $this->tpl->generate("main/generate/CaffeList");                
            }
        }
        exit();
    }
    
     public function action_caffe($id)
    {
        if($id>=0 && is_numeric($id))
        {
            $query="SELECT * FROM caffe WHERE id = $id";        
            $caffe = $this->model->getCaffe($query);            
            if($caffe!=null)
            {
                foreach ($caffe as $value)
                {
                    $caffe = $value;
                }
                $query="SELECT * FROM tables WHERE caffe_index = $id";        
                $table = $this->model->getCaffe($query); 
                if($table!=null)
                {
                    $tables = array();
                    foreach($table as $val)
                    {
                        $tables[]=$val;
                    }
                    $this->tpl->set("tables",$tables);  
                }
                $this->tpl->set("id",$id);
                $this->tpl->set("caffe",$caffe);                
                $popup = $this->tpl->generate("main/elements/PopUpAuthReg");    
                $this->tpl->set("popup",$popup);
                $this->data['Content'] = $this->tpl->generate("main/elements/ViewOneCaffe");
            }
            else
            {
                $error = "Данного кафе не существует <a href=".URL.">на сайт</a>";
                $this->tpl->set("error",$error);
                $this->data['Content']=$this->tpl->generate("adminpanel/elements/ErrorContent");
            }
        }
        else
        {
            $error = "Не верный запрос. <a href=".URL.">На сайт</a>";
            $this->tpl->set("error",$error);
            $this->data['Content']=$this->tpl->generate("adminpanel/elements/ErrorContent");
        }        
        $this->view->generate('main/MainPage.tpl',$this->data);
    }
}