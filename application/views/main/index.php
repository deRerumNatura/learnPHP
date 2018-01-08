<p>main page content</p>
	<?php foreach ($vars as $article):?>
		<article>
			<a href="news/showOne?id=<?php echo $article['id']; ?>">
				<?php echo $article['title']; ?>
			</a>
		</article>
	<?php endforeach; ?>
	<br>
	<a href="news/showAll">Show All</a>