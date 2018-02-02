<!--форма редактирования-->
<?php if(!empty($vars['errors'])): ?>
    <div class="success">
        <p><?php echo $vars['errors']; ?></p>
    </div>
<?php endif; ?>
<?php if(isset($_POST['delete'])): ?>
    <a href="/admin/news">к другим новостям</a>
<?php else: ?>
<form action="/adminnews/update" method="post">
    <input type="hidden" name="id" value="<?php echo $vars['newsOne']['id']?>">
    <input type="text" name="title" value="<?php echo $vars['newsOne']['title']?>">
    <textarea name="content" id="" cols="30" rows="10"><?php echo $vars['newsOne']['content']?></textarea>
    <input type="text" name="date" value="<?php echo $vars['newsOne']['date']?>">
    <input type="submit" value="update">
    <input type="submit" name="delete" value="delete">
</form>
<?php endif; ?>