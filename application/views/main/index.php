
<section>
	<?php foreach ($vars as $article):?>
			<a href="news/showOne?id=<?php echo $article['id']; ?>">
				<?php echo $article['title']; ?>
			</a>
	<?php endforeach; ?>
</section>
<section >
	<a href="news/showAll">Show All</a>
</section>
	