<!--форма редактирования-->
<?php if(!empty($vars['error'])): ?>
    <div class="danger">
        <?php foreach($vars['error'] as $erroor) :?>
            <p><?php echo $erroor; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php if(!empty($vars['messages'])): ?>
    <div class="success">
        <?php foreach($vars['messages'] as $erroor) :?>
            <p><?php echo $erroor; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php if (isset($_POST['delete'])): ?>
    <a href="/admin/news">к другим новостям</a>
<?php else: ?>
    <form action="/adminnews/update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $vars['newsOne']['id'] ?>">
        <input type="text" name="title" value="<?php echo $vars['newsOne']['title'] ?>">
        <textarea name="content" id="" cols="30" rows="10"><?php echo $vars['newsOne']['content'] ?></textarea>
        <input type="text" name="date" value="<?php echo $vars['newsOne']['date'] ?>">
        <input type="submit" value="update">
        <input type="submit" name="delete" value="delete">
        <input type="file" name="fileToUpload" id="fileToUpload">
<!--        <input type="submit" value="Создать">-->
    </form>
<?php endif; ?>