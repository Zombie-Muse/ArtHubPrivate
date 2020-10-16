<?php require('views/guitarShopHeader.php'); ?>
<main>
    <section>
        <h1>Admin Login</h1>
        <div id="content">
            <h2>Under Construction</h2>
        </div>
        <form action="." method="post">
        <input type="hidden" name="ctlr" value="admin">
        <input type="hidden" name="action" value="listProducts">
        <label>Username:</label>
        <input type="text" name="username">
        <label>&nbsp;Password:</label>
        <input type="password" name="password">
        <br><br>
        <input type="submit" value="Login as Administrator">
    </form>
    </section>
</main>
<?php
require('views/guitarShopFooter.php');
