<ul class="menu_list">
    <li><a href="/">Home</a></li>
    <li><a href="/login">Login</a></li>
    <li><a href="/user/create">Create User</a></li>
</ul>
<div id="status_login">
    welcome
    <?php if (logged(LOGGED)): ?>
        <?php echo user(LOGGED)->firstName; ?>
        | <a href="/logout" class="btn-logout">Log Out</a>
    <?php else: ?>
        <?php echo 'guest' ?>
    <?php endif; ?>
</div>