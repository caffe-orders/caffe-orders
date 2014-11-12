<?php


class Controller_registrate extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_registration();
    }
    
    public function action_index()
    {
        Rerouting::Go_to("reg");
        exit();
    }
    
    public function action_caffe($id)
    {       
        $this->model->CheckOrders();
        if(is_numeric($id))
        {
            $query="SELECT * FROM tables WHERE caffe_index = $id";
            $array = $this->model->select($query,null);
            $tablesInfo = array();
            $i=1;
            foreach ($array as $val)
            {
                //$tablesInfo[$i]['xPos'] = $val['xPos'];
                //$tablesInfo[$i]['yPos'] = $val['yPos'];
                $tablesInfo[$i]=array(
                    "number" => $val['number'],
                    "status" => $val['status']
                );
                $i++;
            }
            echo json_encode($tablesInfo);
        }
        exit();
    }
    
    public function action_cafferegistry($id)
    {          
        if(Authorize::UserStatus()!=0)
        {
            if(isset($_POST['number']) && is_numeric($_POST['number']))
            {
                $num = $_POST['number'];
                $query="SELECT * FROM tables WHERE caffe_index = $id AND number = $num";
                $array = $this->model->select($query,null);
                
                if($array[0]['status']==0)
                {
                    $key = $_SESSION['key'];
                    if($key!="")
                    {
                        $orders = $this->model->UserOrders($key);
                        if($orders==null)
                        {
                            $this->model->addOrder($key,$id,$num);
                            $str="UPDATE tables SET status = :status WHERE number=:number AND caffe_index = :index";
                                $arr=array(
                                ':index'=> $id,
                                ':number' => $num,
                                ':status' => 1
                                );
                            $this->model->update($str,$arr);
                            echo "true";
                        }
                        else
                        {
                            echo "order_limit";
                        }
                    }
                }
                else
                {
                    $key = $_SESSION['key'];
                    $str="UPDATE tables SET status = :status WHERE number=:number AND caffe_index = :index";
                        $arr=array(
                        ':index'=> $id,
                        ':number' => $num,
                        ':status' => 0
                        );
                        $query = "DELETE FROM orders WHERE user_key = :key";
                        $array= array(":key"=>$key);
                        
                        $this->model->update($str,$arr);                    
                        $this->model->delete($query,$array);
                    echo "false";
                }
            }
        }
        else
        {
            echo "authorize_false";
        }
        exit();
    }
}