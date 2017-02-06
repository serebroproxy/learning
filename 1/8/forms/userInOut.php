<div class="centr" style="height: auto; margin-bottom: 10px; padding: 1px; padding-left: 12px;">
<form action="http://test/1/8/index.php" method="post">
    <?php if (false !== $userData): ?>
        <h2>Здравствуйте <?php echo $userData?>!</h2>
        <p>Вы успешно вошли на сайт!</p>
        <p><input type="submit" value="выйти" name="ex" /></p>
    <?php else: ?>
        <p>Введите login:</p>
        <input type="text" name="login" />
        <p>Введите пароль:</p>
        <input type="password" name="pass" />
        <p><input type="submit" value="войти" /></p>
    <?php endif ?>
</form>
</div>