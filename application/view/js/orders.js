
            orders(); 
            setInterval('orders()',5000);
            
           function orders(){
            $.ajax({
            /* адрес файла-обработчика запроса */
            url: 'http://caffe-orders.ru/adminpanel/ordered/',
            /* метод отправки данных */
            method: 'POST',            
            /* что нужно сделать по факту выполнения запроса */
            }).done(function(data){
            $(".viewOrdered").html(data);
            });
        }   



