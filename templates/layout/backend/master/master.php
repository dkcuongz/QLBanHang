<!DOCTYPE html>
<html>

<head>
<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    <?php echo $title; ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', '../backend/css/bootstrap.min', '../backend/css/styles', '../backend/Awesome/css/all']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
	<!-- header -->
	<?php include('header.php') ?>
	<!-- header -->
	<!-- sidebar left-->
	<?php include('sidebar.php') ?>
    <!--/. end sidebar left-->
    <?= $this->fetch('content') ?>
	<!-- javascript -->
	<?= $this->Html->script(['../backend/js/jquery-1.11.1.min', '../backend/js/bootstrap.min', '../backend/js/chart.min','../backend/js/lumino.glyphs']) ?>

</body>

</html>
