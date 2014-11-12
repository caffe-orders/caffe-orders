
<div class="container" >
   
    <div class="column1">
        <FORM method="post" action="<?php echo URL.'adminpanel/updateCaffe/'.$this->index;?>">
 
            <INPUT NAME="name" value='<?php echo $this->nameCaffe;?>'> Введите название кафе:<br/>

            <INPUT NAME="address" value='<?php echo $this->addressCaffe;?>'> Введите адрес: <br/>

            <INPUT NAME="places" value='<?php echo $this->placesCaffe;?>'> Введите количество столиков:<br/>
 
            <INPUT NAME="telephone" value='<?php echo $this->telephoneCaffe;?>'> Введите телефон для связи:<br/>
 
            <INPUT NAME="info" value='<?php echo $this->infoCaffe;?>'> Введите полная информация:<br/>
 
            <INPUT NAME="about" value='<?php echo $this->aboutCaffe;?>'> Введите долнительная информация:<br/>
            <br/>
            <input type='submit' value='Обновить'>
            <br/><?php echo $this->errorsCaffe;?>
        </FORM>
    </div>
</div>