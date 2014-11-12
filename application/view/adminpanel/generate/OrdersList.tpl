<?php foreach($this->orders as $value)
{
    echo
    "
    пользователь ".$value['userName']." с номером телефона ".$value['userTelephone']." заказал ".$value['table_num']." столик в кафе ".$value['caffe_name']."</br> 
    ";
    if($value['status']==1)
    {
        echo "<a href='".URL."adminpanel/order_true/".$value['id']."'>подтвердить заказ</a>  ";
        echo "<a href='".URL."adminpanel/order_false/".$value['id']."'>отменить заказ</a>";
    }
    else
    {
        echo "Заказ подтвержден";
    }
} 
?>