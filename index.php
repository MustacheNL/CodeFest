<?php
$pagename = "Home";
include 'includes/includes.inc.php';

if (isset($_POST['login'])) {
    echo 'login';
} else if (isset($_POST['register'])) {
    echo 'register';
} else {
    //no button pressed
}
?>
<html lang="en">
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
            <h3>@Home</h3>
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
            <a href="#overview" class="mdl-layout__tab is-active">Home</a>
            <a href="dashboard/dashboard.php" class="mdl-layout__tab">Huizen</a>
            <a href="#features" class="mdl-layout__tab">Details</a>
            <a href="#features" class="mdl-layout__tab">Technology</a>
            <a href="#features" class="mdl-layout__tab">FAQ</a>
        </div>
    </header>
    <main class="mdl-layout__content">

        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
            <div class="container">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">login</h2>
                </div>
                <form method="post" action="#">
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="text" id="username" />
                        <label class="mdl-textfield__label" for="username">Username</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="password" id="userpass" />
                        <label class="mdl-textfield__label" for="userpass">Password</label>
                    </div>
                    <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="float:right">
                        <input type="submit" name="login" value="login">
                    </button>
                    <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="float:left">
                        <input type="submit" name="register" value="register">
                    </button>
                </form>
            </div> 
        </div>
        <?php include 'includes/footer.inc.php' ?>
    </main>
   
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
