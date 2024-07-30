<div class="container-fluid d-flex align-items-center justify-content-center vh-100">
    <div class="wrapper fadeInDown">

    <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($errors as $error) : ?>
                        <p><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
                <h2>Admin</h2>
            </div>

            <!-- Login Form -->
            <form method="POST" action="">
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="login">
                <input type="text" id="password" class="fadeIn third" name="password" placeholder="senha">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>


         

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
</div>
</div>