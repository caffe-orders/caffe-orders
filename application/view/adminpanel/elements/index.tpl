<div class="memory">
</div>
<script>
    function get_memory()
        {
            $.ajax({
                                /* адрес файла-обработчика запроса */
                                url: 'http://caffe-orders.ru/systeminfo',
                                /* метод отправки данных */            
                                method: 'POST',
                                /* что нужно сделать по факту выполнения запроса */
                                }).done(function(data){                                  
                                       $('.memory').html(data);
                                });
        }
    $(function() {
            get_memory();  
            setInterval('get_memory()',1000);
        });
</script>