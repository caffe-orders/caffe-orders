<!DOCTUPE html>
<html>
  <head>
    <link rel="shortcut icon" href="<?php echo URL.'application/view/';?>styles/i/favicon.ico" />
    <link rel = "stylesheet" href = "<?php echo URL.'application/view/';?>styles/global_template.css" />
    <link rel = "stylesheet" href = "<?php echo URL.'application/view/';?>styles/body_template.css" />
    <meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
    <meta name="description" content="<?php echo $templateData['description']; ?>" />    
  <script type="text/javascript" src="<?php echo URL.'application/view/js/jquery-2.1.1.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo URL.'application/view/js/showCaffe.js';?>"></script>
    <title><?php echo $templateData['title']; ?></title>
  </head>
  <body>
    <div class="b-wrap">
      <aside class="b-left-nav">
        <a href="/" class="b-left-nav_logo-img"></a>
      </aside>
      <div class="b-content-body">
        <div class="b-page-name"></div>
        <?php echo $this->Content;?>
      </div>
      <div class="b-hide-footer"></div>
    </div>
    <footer class="b-footer">
      <p>2014 @caffe-orders.ru</p>
    </footer>
  </body>
</html>
