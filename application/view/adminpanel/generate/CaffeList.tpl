<?php foreach($this->caffe as $value)
{?>
        В кафе "<?php echo $value['name'];?>"
        <?php echo $value['places'];?> 
        столиков.  <a href="<?php echo URL."adminpanel/caffe/$value[id]";?>">  
        Подробнее</a>
<a href="<?php echo URL."adminpanel/updateCaffe/$value[id]";?>">Изменить</a>
<a href="<?php echo URL."adminpanel/addPlace/$value[id]";?>">Расположить столики</a>
<a href="<?php echo URL."adminpanel/deleteCaffe/$value[id]";?>">Удалить</a>
    
<hr>
<?php } ?>