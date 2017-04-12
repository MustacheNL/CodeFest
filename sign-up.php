<?php
$pagename = "Sign In";
include "includes/header.inc.php";
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
    $user->redirect('uIndex.php');
}

if(isset($_POST['btn-signup']))
{
    $uname = strip_tags($_POST['txt_uname']);
    $umail = strip_tags($_POST['txt_umail']);
    $upass = strip_tags($_POST['txt_upass']);

    if($uname=="")	{
        $error[] = "provide username !";
    }
    else if($umail=="")	{
        $error[] = "provide email id !";
    }
    else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
        $error[] = 'Please enter a valid email address !';
    }
    else if($upass=="")	{
        $error[] = "provide password !";
    }
    else if(strlen($upass) < 6){
        $error[] = "Password must be atleast 6 characters";
    }
    else
    {
        try
        {
            $stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['user_name']==$uname) {
                $error[] = "sorry username already taken !";
            }
            else if($row['user_email']==$umail) {
                $error[] = "sorry email id already taken !";
            }
            else
            {
                if($user->register($uname,$umail,$upass)){
                    $user->redirect('sign-up.php?joined');
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
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

                        <form action="sign-up.php" method="post" class="form-signin">
                        <h2 class="form-signin-heading">Sign Up</h2><hr />


                            <?php
                            if(isset($error))
                            {
                                foreach($error as $error)
                                {
                                    ?>
                                    <div class="alert alert-danger">
                                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                                    </div>
                                    <?php
                                }
                            }
                            else if(isset($_GET['joined']))
                            {
                                ?>
                                <div class="alert alert-info">
                                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                                </div>
                                <?php
                            }
                            ?>



                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" id="sample1" name="txt_uname" value="<?php if(isset($error)){echo $uname;}?>" >
                                <label class="mdl-textfield__label" for="sample1">Enter Username</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" id="sample1" name="txt_umail" value="<?php if(isset($error)){echo $umail;}?>" >
                                <label class="mdl-textfield__label" for="sample1">Enter E-Mail</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="password" id="sample1" name="txt_upass" >
                                <label class="mdl-textfield__label" for="sample1">Enter Password</label>
                            </div>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored,  btn-primary" type="submit" name="btn-signup">
                                <i class="glyphicon glyphicon-open-file"></i> Sign Up
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
                        <label>I have an account! <a href="index.php">Sign In</a></label>




                    </div>

                </div>
            </div>
        </div>
        <?php include 'includes/footer.inc.php' ?>
    </main>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>

<!---->
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">-->
<!--<html xmlns="http://www.w3.org/1999/xhtml">-->
<!---->
<!--<!--<head>-->-->
<!--<!--    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->-->
<!--<!--    <title>Coding Cage : Sign up</title>-->-->
<!--<!--    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">-->-->
<!--<!--    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">-->-->
<!--<!--    <link rel="stylesheet" href="style.css" type="text/css"  />-->-->
<!--<!--</head>-->-->
<!--<body>-->
<!---->
<!--<div class="signin-form">-->
<!---->
<!--    <div class="container">-->
<!---->
<!--        <form method="post" class="form-signin">-->
<!--            <h2 class="form-signin-heading">Sign up.</h2><hr />-->
<!--            --><?php
//            if(isset($error))
//            {
//                foreach($error as $error)
//                {
//                    ?>
<!--                    <div class="alert alert-danger">-->
<!--                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; --><?php //echo $error; ?>
<!--                    </div>-->
<!--                    --><?php
//                }
//            }
//            else if(isset($_GET['joined']))
//            {
//                ?>
<!--                <div class="alert alert-info">-->
<!--                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here-->
<!--                </div>-->
<!--                --><?php
//            }
//            ?>
<!---->
<!--            <form action="#">-->
<!--                <div class="mdl-textfield mdl-js-textfield">-->
<!--                    <input class="mdl-textfield__input" type="text" id="sample1" name="txt_uname" value="--><?php //if(isset($error)){echo $uname;}?><!--">-->
<!--                    <label class="mdl-textfield__label" for="sample1">Enter Username</label>-->
<!--                </div> <br>-->
<!--                <div class="mdl-textfield mdl-js-textfield">-->
<!--                    <input class="mdl-textfield__input" type="text" id="sample1" name="txt_umail" value="--><?php //if(isset($error)){echo $umail;}?><!--">-->
<!--                    <label class="mdl-textfield__label" for="sample1">Your Password</label>-->
<!--                </div> <br>-->
<!--                <div class="mdl-textfield mdl-js-textfield">-->
<!--                    <input class="mdl-textfield__input" type="text" id="sample1" name="txt_upass">-->
<!--                    <label class="mdl-textfield__label" for="sample1">Your Password</label>-->
<!--                </div> <br>-->
<!--            </form>-->
<!---->
<!--            <div class="form-group">-->
<!--                <input type="text" class="form-control" name="txt_uname" placeholder="Enter Username" value="--><?php //if(isset($error)){echo $uname;}?><!--" />-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID" value="--><?php //if(isset($error)){echo $umail;}?><!--" />-->
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />-->
<!--            </div>-->
<!--            <div class="clearfix"></div><hr />-->
<!--            <div class="form-group">-->
<!--                <button type="submit" class="btn btn-primary" name="btn-signup">-->
<!--                    <i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP-->
<!--                </button>-->
<!--            </div>-->
<!--            <br />-->
<!--            <label>have an account ! <a href="index.php">Sign In</a></label>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--</div>-->
<!---->
<!--</body>-->
<!--</html>-->