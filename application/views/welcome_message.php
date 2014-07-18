<!DOCTYPE html>
<html lang="zh-cn">
<head>
   <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="keywords" content="">
   <meta name="author" content="">

   <title>OreoFramework</title>

   <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
   
   <style>
body {
  min-height: 2000px;
  padding-top: 70px;
}
	</style>
   
   <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  	
  	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="<?php echo base_url('assets/js/ie-emulation-modes-warning.js') ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js') ?>"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   <script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>index.php";
   </script>
   
</head>

  <body>

     <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">OreoFramework</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">Blog</a></li>
            <li><a href="#contact">About</a></li>
            <li><a href="#contact">Feedback</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Oreo</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action1</a></li>
                <li class="divider"></li>
                <li><a href="#">Action2</a></li>
                <li class="divider"></li>
                <li><a href="#">Action3</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Oreo Web Framework</h1>
        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
        <p>To see the difference between static and fixed top navbars, just scroll.</p>
        <p>
          <a class="btn btn-lg btn-primary" href="#" role="button">Have fun &raquo;</a>
        </p>
      </div>

    </div> <!-- /container -->
  </body>
</html>
