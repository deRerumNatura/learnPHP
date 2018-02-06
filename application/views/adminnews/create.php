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
<?php //dump($_POST); ?>
<form action="/adminnews/create" method="post" enctype="multipart/form-data">
    <input type="text" name="title">
    <textarea name="content" id="" cols="30" rows="10"></textarea>
    <input type="date" name="date">
    <!--        форма отправки файла            -->
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Создать">
    <!--    <input type="submit" value="Upload Image" name="submitImg">-->

</form>

