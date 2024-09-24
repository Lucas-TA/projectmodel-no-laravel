<?php $this->layout('default', ['title' => $title]) ?>
<h2> LOGIN </h2>

<?php echo getFlash('message') ?>
<?php if (!logged(LOGGED)) : ?>
<form action="/login" method="POST" class="box-login">
    <fieldset>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="lucasteixeira.ta@gmail.com">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <button type="submit" class="btn">Submit</button>
    </fieldset>
</form>
<?php else: ?>
    <h2>Already logged in</h2>
<?php endif; ?>
