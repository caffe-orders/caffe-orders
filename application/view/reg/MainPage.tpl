<!DOCTUPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="style/i/favicon.ico" />
  <link rel = "stylesheet" href = "style/style.css" />
  <meta http-equiv = "content-type" content = "text/html; charset = utf-8" />
  <meta name = "description" content = "Clain Atomi portfolio theme!" />
  <link rel="stylesheet" href="<?php echo URL.'application/view/';?>css/style.css">
  <script type="text/javascript" src="<?php echo URL.'application/view/js/jquery-2.1.1.min.js';?>"></script>
  <script type="text/javascript" src="<?php echo URL.'application/view/js/showCaffe.js';?>"></script>
  <title>MiniCMS Index Page</title>
</head>
<body class="wrapper">
<div class="b-body">
    <header class="b-header">
        <a href="/" class="b-header_logo"></a>
        <nav class="b-header_nav">
            <?php echo $this->HeadMenu?>
        </nav>
        <div style="clear: both;"></div>
    </header>
    <div class="b-content-wrap">
                                <?php echo $this->Content;?>
    </div>
    <div class="b-h-footer"></div>
    <div style="clear: both;"></div>
</div>
<div class="b-footer">
    <p class="footer_copyright">2014</p>
</div>
</body>
</html>