<?php

class Model_registration extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function UserOrders($key)
    {
        $query="SELECT * FROM orders WHERE user_key=:user_key";
        $array = array(
            ":user_key"=>$key
        );
        return $this->select($query,$array);
    }
    
    public function AddOrder($user_key,$caffe_id,$num)
    {
        $query ="INSERT orders (table_num,caffe_index,user_key,time) VALUES (:table_num,:caffe_index,:user_key,:time)";
        $array=array(
            ":table_num"=>$num,
            ":caffe_index"=>$caffe_id,
            ":user_key"=>$user_key,
            ":time"=>  abs(time()+(60))
        );
        return $this->insert($query,$array);
    }
    
    public function CheckOrders()
    {
        $time = abs(time());
        $query ="SELECT * FROM orders WHERE time<=:time";
        $array=array(":time"=>$time);
        $data = $this->select($query,$array);
        if($data!=null)
        {
            foreach ($data as $value)
            {
                $query="DELETE FROM orders WHERE id =:id";
                $array = array(":id"=>$value['id']);
                $this->delete($query,$array);
                
                $str="UPDATE tables SET status = :status WHERE number=:number AND caffe_index = :index";
                                $arr=array(
                                ':index' => $value['caffe_index'],
                                ':number' => $value['table_num'],
                                ':status' => 0
                                );
                            $this->update($str,$arr);
            }
        }
    }
}