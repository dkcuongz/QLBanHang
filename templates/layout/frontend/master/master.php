<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
      <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $title; ?></title>
      <?= $this->Html->meta('icon') ?>
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
      <?= $this->Html->css(['../frontend/css/bootstrap.min', '../frontend/css/font-awesome.min', '../frontend/css/responsive', '../frontend/css/owl.carousel', '../frontend/style']) ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <?= $this->fetch('meta') ?>
      <?= $this->fetch('css') ?>
      <?= $this->fetch('script') ?>
  </head>
  <body>

    <?php include('header.php') ?>
    <!-- End mainmenu area -->
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
    <?php include('footer.php') ?>
 <!-- End footer bottom area -->

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <?= $this->Html->script(['../frontend/js/owl.carousel.min', '../frontend/js/jquery.sticky', '../frontend/js/jquery.easing.1.3.min', '../frontend/js/main', '../frontend/js/bxslider.min', '../frontend/js/script.slider']) ?>

  </body>
</html>
