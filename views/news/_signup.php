<?php if (false): ?>
<table id="login">
    <tr><td>Приветствую, <?php //echo $_COOKIE['name']; ?></td>
    </tr>
</table>
<?php else:  ?>
<form name="auth" action="/auth/login" method="post">
    <div>
        <table id="login">
            <tr>
                <td><span>Войти:</span></td>
                <td><input type="text" name="login" placeholder="Логин" required="required"></td>
                <td><input type="password" name="password" placeholder="Пароль" required="required"></td>
                <td><input type="submit" name="auth" value="Ok"></td>
            </tr>
        </table>
    </div>
</form>
<?php endif; ?>