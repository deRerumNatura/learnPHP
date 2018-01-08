<?php foreach ($vars['news_content'] as $news) : ?>
	<div><?php echo $news['id'];//['id'] ?></div>
	<div><?php echo $news['title'] ?></div>
	<div><?php echo $news['content'] ?></div>
<?php endforeach; ?>