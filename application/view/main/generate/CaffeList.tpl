<?php foreach($this->caffe as $value)
{?>
<div class="b-cafe-prew-item" style="background: url(http://caffe-orders.ru/application/view/css/i/prew-cafe-bg-sample.png);">
            <div class="b-cafe-prew-item_cafe-name"><?php echo $value['name'];?></div>
            <div class="b-cafe-prew-item_descr-wrap">
                <div class="prew-item-descr_content">
                    <div class="descr_content-text">
                            <?php echo $value['info'];?>
                        </div>
                    <div class="descr_content-footer">
                        <a class="to-full-cafe-info-btn" href=<?php echo URL."main/caffe/$value[id]";?>>Перейти</a>
                    </div>
                </div>
                <div class="prew-item-descr_gallery">
                    <img class="gallery_item" src="http://caffe-orders.ru/application/view/css/i/cafe-gall-img.png">
                    <img class="gallery_item" src="http://caffe-orders.ru/application/view/css/i/cafe-gall-img.png">
                    <img class="gallery_item" src="http://caffe-orders.ru/application/view/css/i/cafe-gall-img.png">
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
<?php } ?>