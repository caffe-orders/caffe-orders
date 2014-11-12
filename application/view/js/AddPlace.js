$(document).ready(function() {
    $(".Place").width(500);
    $(".Place").height(300);

$(function() {
            $("#SavePosition").click(function(){
            var id = $(".caffeID").attr("value");
            var add = $( "div .dragElement" );            
            var arr = {};
            arr[0] = id;
            add.each(
                    function(){       
                        if($(this).attr("value")>0){
                        var y = $(this).offset().top - $(".Place").offset().top;
                        var x = $(this).offset().left - $(".Place").offset().left;
                        //alert(x);
                        arr[$(this).attr("value")] = 
                        {
                            "x": x,
                            "y": y,
                            "num":$(this).attr("value")
                        }
                        
                        }         
                    }
                    );    
            $.ajax({
            /* адрес файла-обработчика запроса */
            url: 'http://caffe-orders.ru/adminpanel/add/',
            /* метод отправки данных */            
            method: 'POST',
            data: {"arr" : arr},
            
            /* что нужно сделать по факту выполнения запроса */
            }).done(function(data){
                if(data != null)
                {
                    //alert(data);
                    alert("Save position - true");
                }
                else
                {
                    alert("Save position - false");
                }
            });
        });        
    });
});