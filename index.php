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
                <div class="signin-form">

                    <div class="container">
                        <form class="form-signin" method="post" id="login-form">

                            <h2 class="form-signin-heading">Log In to WebApp.</h2><hr />

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

                            <div class="form-group">
                                <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
                                <span id="check-e"></span>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
                            </div>

                            <hr />

                            <div class="form-group">
                                <button type="submit" name="btn-login" class="btn btn-default">
                                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
                                </button>
                            </div>
                            <br />
                            <label>Don't have account yet ! <a href="sign-up.php">Sign Up</a></label>
                        </form>



                    </div>

                </div>
            </div>
        </div>
        <?php include 'includes/footer.inc.php' ?>
    </main>

<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
