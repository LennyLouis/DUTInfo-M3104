<?php session_start(); ?>
<body class="text-center">

<main class="form-signin">
    <form method="post" action="controller/login.controller.php">
        <img class="mb-4" src="assets/img/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <?php if(isset($_SESSION['login-error'])){
            if($_SESSION['login-error']!="") { ?>
        <div class="checkbox mb-3" style="color:#dc3545;">
            <?= $_SESSION['login-error'] ?>
        </div>
        <?php }} ?>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="JohnDoe91" name="username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
</main>
</body>
<?php $_SESSION['login-error']=""; ?>