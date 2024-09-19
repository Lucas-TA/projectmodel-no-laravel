<h2>Create</h2>
<form action="/user/store" method="POST" class="box-login">
    <fieldset>
        <div class="box-name-and-last-name">
            <div>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName">
                <?php echo getFlash('firstName'); ?>
            </div>

            <div>
                <label for="LastName">Last Name:</label>
                <input type="text" id="LastName" name="lastName">
                <?php echo getFlash('lastName'); ?>
            </div>
        </div>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <?php echo getFlash('email'); ?>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <?php echo getFlash('password'); ?>

        <button type="submit" class="btn">Submit</button>
        <button type="reset" class="btn btn-red">Reset</button>
    </fieldset>
</form>
