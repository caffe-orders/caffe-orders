<?php

Class Controller_adminpanel extends Controller
{
    public function __construct()
    {
        parent::__construct();        
        $this->mdl = new Model_registration();
        if(Authorize::UserStatus()<5)
        {
            Rerouting::Go_to("authorize");
        }
        unset($this->mdl);
        $this->model = new Model_adminpanel();
        $HeadMenu = $this->model->HeadMenu();
        $this->tpl->set('HeadMenu', $HeadMenu);
        $this->data['HeadMenu'] = $this->tpl->generate('elements/HeadMenu');
    }
    
    public function action_index()
    {           
        $this->data['Content'] = $this->tpl->generate("adminpanel/elements/index");
        $this->view->generate('adminpanel/MainPage.tpl',$this->data);
    }
    
    public function action_updatecaffe($id)
    {
        if(is_numeric($id))
        {
            $query="SELECT * FROM caffe WHERE id = $id";        
            $caffe = $this->model->getCaffe($query);            
            if($caffe!=null)
            {
                foreach ($caffe as $value)
                {
                    $caffe = $value;
                }
                $this->tpl->set("index",$caffe['id']);
                $this->tpl->set("nameCaffe",$caffe['name']);
                $this->tpl->set("addressCaffe",$caffe['address']);
                $this->tpl->set("placesCaffe",$caffe['places']);
                $this->tpl->set("telephoneCaffe",$caffe['telephone']);
                $this->tpl->set("infoCaffe",$caffe['info']);
                $this->tpl->set("aboutCaffe",$caffe['about']);
                if(isset($_POST['name']) && $_POST['address'] && $_POST['places'] && $_POST['telephone'] && $_POST['info'] && $_POST['about'] && is_numeric($_POST['places']) )
                {                      
                    $str="UPDATE caffe SET name = :name,address = :address,places = :places,telephone = :telephone,info = :info,about =:about,img =:img WHERE id=:id";
                    $arr=array(
                    ':id'=> $id,
                    ':name' => CheckLine::Line($_POST['name']),
                    ':address' => CheckLine::Line($_POST['address']),
                    ':places' => CheckLine::Line($_POST['places']),
                    ':telephone' => CheckLine::Line($_POST['telephone']),
                    ':info' => CheckLine::Line($_POST['info']),
                    ':about' => CheckLine::Line($_POST['about']),
                    ':img'=>"img"
                    );
                    $this->tpl->set("nameCaffe",$_POST['name']);
                    $this->tpl->set("addressCaffe",$_POST['address']);
                    $this->tpl->set("placesCaffe",$_POST['places']);
                    $this->tpl->set("telephoneCaffe",$_POST['telephone']);
                    $this->tpl->set("infoCaffe",$_POST['info']);
                    $this->tpl->set("aboutCaffe",$_POST['about']);
                    $this->model->update($str,$arr);
                    $err = "Кафе обновлено, перейдите по <a href=".URL."adminpanel/addPlace/$id>ссылке</a> что бы создать обновить столики, или создайте еще одно кафе.";
                    $this->tpl->set("errorsCaffe",$err);
                    $this->data['Content'] = $this->tpl->generate("adminpanel/elements/updateCaffe");
                    $this->view->generate('adminpanel/MainPage.tpl',$this->data);                
                }
                else
                {         
                     if(isset($_POST['places']) && !is_numeric($_POST['places']))
                    {
                        $this->tpl->set("errorsCaffe","Заполнены не все поля. Поле \"количество столиков\" должно быть числом."); 
                    }
                    $this->data['Content'] = $this->tpl->generate("adminpanel/elements/updateCaffe");
                    $this->view->generate('adminpanel/MainPage.tpl',$this->data);
                }  
            }
        }
        else 
        {                
                $this->data['Content'] = $this->tpl->generate("adminpanel/elements/addCaffe");
                $this->view->generate('adminpanel/MainPage.tpl',$this->data);            
        }
    }


    public function action_addcaffe($status)
    {        
        if($status=="true")
        {
            if($_POST['name'] && $_POST['address'] && $_POST['places'] && $_POST['telephone'] && $_POST['info'] && $_POST['about'] && is_numeric($_POST['places']) )
            {   
                $str="INSERT caffe (name,address,places,telephone,info,about,img) VALUES (:name,:address,:places,:telephone,:info,:about,:img)";
                $arr=array(
                    ':name' => CheckLine::Line($_POST['name']),
                    ':address' => CheckLine::Line($_POST['address']),
                    ':places' => CheckLine::Line($_POST['places']),
                    ':telephone' => CheckLine::Line($_POST['telephone']),
                    ':info' => CheckLine::Line($_POST['info']),
                    ':about' => CheckLine::Line($_POST['about']),
                    ':img' => "img"
                    );
                $index = $this->model->insert($str,$arr);
                $err = "Кафе созданно, перейдите по <a href=".URL."adminpanel/addPlace/$index>ссылке</a> что бы создать столики или создайте еще одно кафе.";
                $this->tpl->set("errorsCaffe",$err);
                $this->data['Content'] = $this->tpl->generate("adminpanel/elements/addCaffe");
                $this->view->generate('adminpanel/MainPage.tpl',$this->data);                
            }
            else
            {
                $this->tpl->set("nameCaffe",$_POST['name']);
                $this->tpl->set("addressCaffe",$_POST['address']);
                $this->tpl->set("placesCaffe",$_POST['places']);
                $this->tpl->set("telephoneCaffe",$_POST['telephone']);
                $this->tpl->set("infoCaffe",$_POST['info']);
                $this->tpl->set("aboutCaffe",$_POST['about']);  
                if(!is_numeric($_POST['places']))
                {
                    $this->tpl->set("errorsCaffe","Заполнены не все поля. Поле \"количество столиков\" должно быть числом."); 
                }
                else
                {
                    $this->tpl->set("errorsCaffe","Заполнены не все поля."); 
                }
                
                $this->data['Content'] = $this->tpl->generate("adminpanel/elements/addCaffe");
                $this->view->generate('adminpanel/MainPage.tpl',$this->data);
            }
        }
        else
        {
            $this->data['Content'] = $this->tpl->generate("adminpanel/elements/addCaffe");
            $this->view->generate('adminpanel/MainPage.tpl',$this->data);
        }
        
    }
    public function action_addplace($id)
    {
        if(is_numeric($id))
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
                if($table!=null && count($table)==$caffe['places'])
                {
                    $tables = array();
                    foreach($table as $val)
                    {
                        $tables[]=$val;
                    }
                    $this->tpl->set("tables",$tables);  
                }
                else
                {                    
                    $this->tpl->set("caffe",$caffe);  
                }
                
                $js ="
                <script type='text/javascript' src=".URL."application/view/js/AddPlace.js></script>";
                $this->data['js'] = $js;
                              
                $this->tpl->set("id",$id);
                $this->data['Content'] = $this->tpl->generate("adminpanel/elements/addPlace");
                $this->view->generate('adminpanel/MainPage.tpl',$this->data);
            }
        }
    }
    
   public function action_add()
   {
       if(isset($_POST['arr']))
       {
           if(isset($_POST['arr'][0]))
           {
               $index = $_POST['arr'][0];
               unset($_POST['arr'][0]);
               //print_r($_POST['arr']);
               foreach($_POST['arr'] as $value)
               {
                   $x = $value["x"]-12;
                   $y = $value["y"]+5;
                   $number = $value["num"];
                   $query="SELECT * FROM tables WHERE caffe_index = $index AND number = $number";        
                   $table = $this->model->getCaffe($query);
                    if($table!=null)
                    {
                        $str="UPDATE tables SET  xPos= :xPos,yPos = :yPos,status = :status WHERE number =:number AND caffe_index=:caffe_index";
                        $arr=array(
                        ':number' => $number,
                        ':caffe_index' => $index,
                        ':xPos' => $x,
                        ':yPos' => $y,
                        ':status' => 0
                        );
                        $this->model->update($str,$arr);
                    }                       
                    else
                    {
                        $str="INSERT tables (number,caffe_index,xPos,yPos,status) VALUES (:number,:caffe_index,:xPos,:yPos,:status)";
                        $arr=array(
                        ':number' => $number,
                        ':caffe_index' => $index,
                        ':xPos' => $x,
                        ':yPos' => $y,
                        ':status' => 0
                        );
                        $this->model->insert($str,$arr);
                    }
               }
           }
       }
       exit();
   }


   public function action_deletecaffe($id)
    {
        $sql1 = "DELETE FROM caffe WHERE id =  :id";
        $sql2 = "DELETE FROM tables WHERE caffe_index =  :id";
        $arr=array(':id' => $id);                 
        $this->model->delete($sql1,$arr);
        $this->model->delete($sql2,$arr);        
        Rerouting::Back();
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
                $this->tpl->set("caffe",$caffe);
                $this->data['Content'] = $this->tpl->generate("adminpanel/elements/ViewOneCaffe");
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
        $this->view->generate('adminpanel/MainPage.tpl',$this->data);
    }
    
    public function action_viewcaffe()
    {
        $query="SELECT * FROM caffe ORDER BY `id` DESC LIMIT 0, 10";        
        $caffe = $this->model->getCaffe($query);
        $this->tpl->set("caffe",$caffe);
        $caffeResult = $this->tpl->generate("adminpanel/generate/CaffeList");
        $this->tpl->set("caffeResult",$caffeResult);
        $this->data['Content'] = $this->tpl->generate("adminpanel/elements/contentViewCaffe");
        $this->data['js'] ="<script type='text/javascript' src='".URL."application/view/js/showCaffe_AP.js'></script>";
        $this->view->generate('adminpanel/MainPage.tpl',$this->data);
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
                echo $this->tpl->generate("adminpanel/generate/CaffeList");                
            }
        }
        exit();
    }
    
    public function action_show_ordered()  //страница со списком заказов
    {        
        $this->data['js'] ="<script type='text/javascript' src='".URL."application/view/js/orders.js'></script>";
        $this->data['Content'] = $this->tpl->generate("adminpanel/elements/show_ordered");
        $this->view->generate('adminpanel/MainPage.tpl',$this->data);
    }
    
    public function action_ordered() //выводит список заказов
    {
        $query="SELECT * FROM orders";        
        $order = $this->model->select($query);
        if($order!=null)
        {
        foreach($order as $value)
        {
            $query="SELECT * FROM users WHERE secret_key =:user_key";  
            $arr = array(":user_key"=>$value['user_key']);
            $user = $this->model->select($query,$arr);
            
            $quer="SELECT * FROM caffe WHERE id =:caffe_index";  
            $array = array(":caffe_index"=>$value['caffe_index']);
            $caffe = $this->model->select($quer,$array);
            
            $str = "SELECT * FROM tables WHERE number=:number AND caffe_index=:caffe_index";
            $arra = array(
                ":number"=>$value['table_num'],
                ":caffe_index"=>$value['caffe_index']);
            $table = $this->model->select($str,$arra); 
            
            $orders[]=array(
                "id"=>$value['id'],
                "userName"=>$user[0]['name'],
                "userTelephone"=>$user[0]['telephone'],
                "table_num"=>$value['table_num'],
                "caffe_name"=>$caffe[0]['name'],
                "status"=>$table[0]['status']
            );
        }
        
        $this->tpl->set("orders",$orders);
        $orderlist = $this->tpl->generate("adminpanel/generate/OrdersList"); 
        echo $orderlist;
        }
        else
        {
            echo "заказов нет";
        }
        exit();
    }
    
    public function action_order_true($id) //подтверждение заказа столика
    {        
        $this->mdl->CheckOrders();
        if(is_numeric($id))
        {
            $str="UPDATE orders SET time=:time  WHERE id=:id";
                        $arr=array(
                        ':id' => $id,
                        ":time"=>  abs(time()+(60*30))
                        );
            $this->model->update($str,$arr);
            $str="SELECT * FROM orders WHERE id=:id";
            $array=array(':id' => $id,);
            $order = $this->model->select($str,$array);
            
            $str="UPDATE tables SET status = :status WHERE number=:number AND caffe_index = :index";
                                $arr=array(
                                ':index' => $order[0]['caffe_index'],
                                ':number' => $order[0]['table_num'],
                                ':status' => 2
                                );
                            $this->model->update($str,$arr);
        }
        Rerouting::Back();
        exit();
    }
    
    public function action_order_false($id) //подтверждение заказа столика
    {   
        if(is_numeric($id))
        {
            $str="UPDATE orders SET time=:time  WHERE id=:id";
                        $arr=array(
                        ':id' => $id,
                        ":time"=>  abs(time())
                        );
            $this->model->update($str,$arr);
            $str="SELECT * FROM orders WHERE id=:id";
            $array=array(':id' => $id,);
            $order = $this->model->select($str,$array);
            
            $str="UPDATE tables SET status = :status WHERE number=:number AND caffe_index = :index";
                                $arr=array(
                                ':index' => $order[0]['caffe_index'],
                                ':number' => $order[0]['table_num'],
                                ':status' => 0
                                );
                            $this->model->update($str,$arr);
        }
        $this->mdl->CheckOrders();
        Rerouting::Back();
        exit();
    }
    
}
