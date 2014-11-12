<div id='script'>
    <table>
        <tr>
            <td width="1" >
                <div class="Place"> 
                     <?php
                     if($this->tables!=null)
                     {
                        foreach($this->tables as $table)
                        {
                            echo "<div style='position: absolute; left: ".$table['xPos']."px; top: ".$table['yPos']."px;' class='dragElement' value='".$table['number']."'>
                            <img src=".URL."application/view/img/su1.png><br>".$table['number']."
                            </div>
                            ";
                        }
                        ?>
                        <script>
                            $(function() {
                               var x = $(".Place").offset().left;
                               var y =$(".Place").offset().top;
                               $( "div .dragElement" ).each(
                                        function()
                                {
                                    var x1 = $(this).offset().left;
                                    var y1 = $(this).offset().top;                                    
                                    
                                    $(this).offset({top: y+y1, left:x+x1});
                                });
                            });
                        </script>
                        <?php
                     }
                     else
                     {
                        for($i=0;$i<$this->caffe['places'];$i++)
                        {
                            $num = $i+1;
                            echo "<div style='position: absolute;' class='dragElement' value='$num'>
                            <img src=".URL."application/view/img/su1.png><br>$num
                            </div>
                            ";
                        }
                    }
                    ?>
                </div>
            </td>
            <td>
                <div id='Elements'>
                   
                </div>
                <div>
                 <p>
                <input type='button' value='сохранить размещение столов' id='SavePosition' >
                <div class='caffeID' value="<?php echo $this->id;?>">
                </p>
                </div>
            </td>
        </tr> 
    </table>
    <script>
        $(function() {
    $( ".dragElement" ).draggable({
   containment:'parent'
  });
  });
    </script>
</div>