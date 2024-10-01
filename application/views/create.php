<?php $this->layout('default', ['title' => $title]) ?>
<h2>Create</h2>

<?php echo getFlash('message'); ?>
<form action="/user/store" method="POST" class="box-login">
    <?php echo getCsrf(); ?>
    <fieldset>
        <div class="box-name-and-last-name">
            <div>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo getOld('firstName') ?>">
                <?php echo getFlash('firstName'); ?>
            </div>

            <div>
                <label for="LastName">Last Name:</label>
                <input type="text" id="LastName" name="lastName" value="<?php echo getOld('lastName') ?>">
                <?php echo getFlash('lastName'); ?>
            </div>
        </div>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo getOld('email') ?>">
        <?php echo getFlash('email'); ?>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <?php echo getFlash('password'); ?>

        <button type="submit" class="btn">Submit</button>
        <button type="reset" class="btn btn-red">Reset</button>
    </fieldset>
</form>
