<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo !empty($title) ? $title : 'title';?></title>
	<link href="<?php echo PUBLIC_PATH ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo PUBLIC_PATH ?>/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo PUBLIC_PATH ?>/css/prettyPhoto.css" rel="stylesheet">
  <link href="<?php echo PUBLIC_PATH ?>/css/price-range.css" rel="stylesheet">
  <link href="<?php echo PUBLIC_PATH ?>/css/animate.css" rel="stylesheet">
  <link href="<?php echo PUBLIC_PATH ?>/css/main.css" rel="stylesheet">
  <link href="<?php echo PUBLIC_PATH ?>/css/responsive.css" rel="stylesheet">
</head>
<body>
	<?php  include VIEWS_PATH.'/partials/header.php'; ?> 
	<?php echo $content; ?>
	<?php  include VIEWS_PATH.'/partials/footer.php'; ?>



