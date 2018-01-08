<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo !empty($title) ? $title : 'title';?></title>
</head>
<body>
	<?php echo $content; ?>
	<?php foreach ($vars as $article['title']):?>
		<article>
			<a href="news/showOne">
				<?php echo $article['title']; ?>
				<!-- <?php echo is_array($article) ?> -->
			</a>
		</article>
	<?php endforeach; ?>
	<br>
	<a href="news/showAll">Show All</a>
</body>
</html>
