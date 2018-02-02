<?php if(!empty($vars['message'])):?>
    <div class="success"><?php echo $vars['message']; ?></div>
<?php endif;?>
<?php if(!empty($vars['error'])): ?>
    <div class="danger">
        <?php foreach($vars['error'] as $erroor) :?>
            <p><?php echo $erroor; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="/adminnews/create" method="post">
    <input type="text" name="title">
    <textarea name="content" id="" cols="30" rows="10"></textarea>
    <input type="date" name="date">
    <input type="submit" value="Создать">
</form>

