
<?php 
foreach($this->caffe as $item)
{
    $wifi = ((int)$item['wifi']) ? 'wi-fi' : '';
echo '
<div class="b-caffe-list-item">
  <div class="b-caffe-list-item_header">
    <div class="caffe-list-item_header__title">' . $item['name'] . '</div>
    <div class="caffe-list-item_header__have-wifi">' . $wifi . '</div>
  </div>
  <div class="caffe-list-item_short-descr">' . $item['short_info'] . '</div>
  <div class="caffe-list-item_footer">
    <a href="#" class="caffe-list-item_footer__to-full-descr-btn">Подробнее</a>
  </div>
</div>';
}
?>