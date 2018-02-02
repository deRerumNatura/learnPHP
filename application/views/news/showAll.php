<section>
<?php foreach ($vars as $key => $val):?>
		<article >
			<a href="/news/showOne?id=<?php echo $val['id']; ?>">
				<?php echo $val['title']; ?>
			</a>
		</article>
	<?php endforeach; ?>
</section>