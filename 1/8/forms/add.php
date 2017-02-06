<?php if (false !== $userData): ?>
<div class="centr" style="height: 20px; margin-bottom: 10px; padding: 5px">
    <div style=" float: right; height: 20px; outline: none; margin-top: 0px;">
        <form action="http://test/1/8/index.php" method="post" enctype="multipart/form-data">
            <input placeholder="Введите имя картинки" type="text", name="imgName" style="width: 730px;">
            <input type="file", name="image">
            <input type="submit">
        </form>
    </div>
</div>
<?php endif ?>