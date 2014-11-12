<div class="overlay" title="окно"></div>
<div class="popup">
<div class="close_order">x</div>


		Вам необходимо авторизоваться для входа в этот раздел!
    <form method="post" action="<?php echo URL.'authorize/auth';?>">
    <input name="mail" class="mailInput" type="email"><br>
    <input name="pass" class="passInput" type="password"><br>
    <input type="button" class="authButton" value="Войти"><br>
    </form>
    <div class="errors"></div>
    или пройдите простую <a href="<?php echo URL."reg";?>">регистрацию.</a>    
    <script>
        $(".authButton").click(function(){
                                    
                                var mail = $(".mailInput").val();
                                var pass = $(".passInput").val();
                                $.ajax({
                                /* адрес файла-обработчика запроса */
                                url: 'http://caffe-orders.ru/authorize/jqueryAuth',
                                /* метод отправки данных */            
                                method: 'POST',
                                data:{"mail":mail,
                                "pass":pass},
                                /* что нужно сделать по факту выполнения запроса */
                                }).done(function(data){
                                    
                                    if(data=="auth_true")
                                    {
                                        location.reload(); 
                                    }
                                    else
                                    {
                                        $(".errors").html("Данные введены не корректно");
                                    }
                                });
                                });
    </script>    

</div>