<section>
    <a href="/adminnews/create">Create news</a>
    <p></p>
    <?php foreach ($vars['allNews'] as $val):?>
        <article >
            <a href="/adminnews/update?id=<?php echo $val['id']; ?>">
                <?php echo $val['title']; ?>
            </a>
        </article>
    <?php endforeach; ?>
</section>