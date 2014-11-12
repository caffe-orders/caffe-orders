
 <div class="Place"> 
                     <?php
                     echo $this->popup;
                     if($this->tables!=null)
                     {
                        foreach($this->tables as $table)
                        {
                            echo "<div style='position: absolute; left: ".$table['xPos']."px; top: ".$table['yPos']."px;' class='dragElement' number='".$table['number']."' status='0'>
                            <img src=".URL."application/view/img/su1.png><br>".$table['number']."
                            </div>
                            ";
                        }
                        echo "<div class='index' value='$this->id'></div>";
                        ?>
                        <script>
                            $(function() {
                                
                                $(".Place").width(500);
                                $(".Place").height(300);
                               // PopUpHide(); 
                                
                                change_position(); 
                                set_status();  
                                setInterval('set_status()',3000);
                                
                                $(".dragElement").click(function(){
                                    
                                    var id = $(".index").attr("value");
                                    var tblNum = $(this).attr("number");
                                $.ajax({
                                /* адрес файла-обработчика запроса */
                                url: 'http://caffe-orders.ru/registrate/caffeRegistry/'+id,
                                /* метод отправки данных */            
                                method: 'POST',
                                data:{"number":tblNum},
                                /* что нужно сделать по факту выполнения запроса */
                                }).done(function(data){
                                    if(data!="authorize_false")
                                    {
                                        if(data=="true")
                                        {
                                            alert("Спасибо за реристрацию столика, скоро с вами свяжется оператор.");
                                        }
                                        if(data=="false")
                                        {
                                            alert("Извините, но этот столик уже заняли");
                                        }
                                        if(data=="order_limit")
                                        {
                                            alert("Извините, но вы уже забранировали 1 столик");
                                        }
                                    }
                                    else
                                    {
                                        popupShow();
                                    }    
                                    set_status();
                                });
                                });
                            });               
                            
                            function popupShow()
                            {    
                                $('.popup .close_order, .overlay').click(function (){
                                    $('.popup, .overlay').css({'opacity':'0', 'visibility':'hidden'});
                                });
                                $('.popup, .overlay').css({'opacity':'1', 'visibility':'visible'});
                            }
                            function popupHide()
                            {
                                $('.popup, .overlay').css({'opacity':'0', 'visibility':'hidden'});
                            }
                            function set_status()
                            {                                
                                var id = $(".index").attr("value");
                                $.ajax({
                                /* адрес файла-обработчика запроса */
                                url: 'http://caffe-orders.ru/registrate/caffe/'+id,
                                /* метод отправки данных */            
                                method: 'POST',
            
                                /* что нужно сделать по факту выполнения запроса */
                                }).done(function(data){
                                if(data.length>0)
                                {
                                    data = jQuery.parseJSON(data);
                                    $( "div .dragElement" ).each(
                                        function()
                                        {                                   
                                            var number = $(this).attr("number"); 
                                            var status = data[number].status;
                                            if($(this).attr("status")!= status)
                                            {
                                                $(this).attr("status",status);
                                                if(status==0)
                                                {
                                                    $(this).show();
                                                    $(this).fadeTo(1000,1);
                                                }
                                                if(status==1)
                                                {
                                                    $(this).fadeTo(2000,0.4);
                                                }
                                                if(status==2)
                                                {
                                                    $(this).animate({ opacity: "hide" }, "slow");
                                                }
                                            }
                                        }
                                    );
                                }
                                });
                                
                            }
                            
                            function change_position()
                            {
                               var x = $(".Place").offset().left;
                               var y = $(".Place").offset().top;
                               $( "div .dragElement" ).each(
                                        function()
                                {
                                    var x1 = $(this).offset().left;
                                    var y1 = $(this).offset().top;                                    
                                    
                                    $(this).offset({top: y+y1, left:x+x1});
                                }
                                );
                            }
                        </script>
                        
                        <?php
                        
                     }
                    ?>
                </div>
<table>
    <tr>
        <td>Название</td>
        <td><?php echo $this->caffe['name'];?></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><?php echo $this->caffe['address'];?></td>
    </tr>
    <tr>
        <td>Количество столиков</td>
        <td><?php echo $this->caffe['places'];?></td>
    </tr>
    <tr>
        <td>Телефон</td>
        <td><?php echo $this->caffe['telephone'];?></td>
    </tr>
    <tr>
        <td>Информация о кафе</td>
        <td><?php echo $this->caffe['info'];?></td>
    </tr>
    <tr>
        <td>Дополнительная информация</td>
        <td><?php echo $this->caffe['about'];?></td>
    </tr>
</table>
