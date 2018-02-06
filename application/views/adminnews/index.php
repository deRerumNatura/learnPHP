<section>
    <a href="/adminnews/create">Create news</a>
    <p></p>
    <?php foreach ($vars['allNews'] as $val):?>
        <article >
            <a href="/adminnews/update?id=<?php echo $val['id']; ?>">
                <?php echo $val['title']; ?>
            </a>
        </article>
        <img src="" alt="">
    <?php endforeach; ?>
    <?php dump($_SERVER['HTTP_HOST']); ?>
</section>