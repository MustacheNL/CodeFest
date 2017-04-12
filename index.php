<?php
$pagename = "home";
include 'includes/includes.inc.php';
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
    $uname = strip_tags($_POST['txt_uname_email']);
    $umail = strip_tags($_POST['txt_uname_email']);
    $upass = strip_tags($_POST['txt_password']);

    if($login->doLogin($uname,$umail,$upass))
    {
        $login->redirect('home.php');
    }
    else
    {
        $error = "Wrong Details !";
    }
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
    </header>
    <main class="mdl-layout__content">

        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
            <div class="container">
                <div class="signin-form">

                    <div class="container">


                            <h2 class="form-signin-heading">Log In</h2><hr />

                            <div id="error">
                                <?php
                                if(isset($error))
                                {
                                    ?>
                                    <div class="alert alert-danger">
                                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                            <form action="index.php" method="post">
                                <div class="mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" id="sample1" name="txt_uname_email">
                                    <label class="mdl-textfield__label" for="sample1">Username or E-mail ID</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" id="sample1" name="txt_password">
                                <label class="mdl-textfield__label" for="sample1">Your Password</label>
                                </div>

                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored, btn btn-default" type="submit" name="btn-login">
                                    <i class="glyphicon glyphicon-log-in"></i> Sign In
                                </button>
                            </form>

<!--                            <div class="form-group">-->
<!--                                <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />-->
<!--                                <span id="check-e"></span>-->
<!--                            </div>-->
<!---->
<!--                            <div class="form-group">-->
<!--                                <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />-->
<!--                            </div>-->
<!---->
<!--                            <hr />-->


<!--                            <div class="form-group">-->
<!--                                <button type="submit" name="btn-login" class="btn btn-default">-->
<!--                                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN-->
<!--                                </button>-->
<!--                            </div>-->
                            <br>
                            <br />
                            <label>Don't have account yet! <a href="sign-up.php">Sign Up</a></label>




                    </div>

                </div>
            </div>
        </div>
        <?php include 'includes/footer.inc.php' ?>
    </main>

<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
