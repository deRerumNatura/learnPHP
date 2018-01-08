<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo !empty($title) ? $title : 'title';?></title>
</head>
<body>
	<?php echo $content; ?>
	
		<article>
			<a href="news/showOne">
				<?php echo $article['title']; ?>
			</a>
		</article>
	
</body>
</html>
