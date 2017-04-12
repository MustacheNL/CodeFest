<?php


require_once("session.php");

require_once("class.user.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$pagename = "Settings";
include "includes/header.inc.php";

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
            <a href="dashboard.php" class="mdl-layout__tab">Huizen</a>
            <a href="#features" class="mdl-layout__tab">Mijn kamer</a>
            <a href="#features" class="mdl-layout__tab">Mijn Account</a>
            <div class="mdl-layout-spacer"></div>
            <a href="logout.php?logout=true" class="mdl-layout__tab" style="color: red;">Log out</a>
        </div>
    </header>
    <main class="mdl-layout__content" style="margin: auto;">
        <span class="mdl-chip mdl-chip--contact">
            <span class="mdl-chip__contact mdl-color--red mdl-color-text--white">!</span>
            <span class="mdl-chip__text" style="text-align: center">Caution: You did not fill in your school information and data yet. Please do that as fast as possible! Click <a href='uSettings.php'>here</a> to do it.</span>
        </span>
        <main class="mdl-layout__content mdl-color--grey-100" style="display: block;">
            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
                Here must come some shit.
            </div>
        </main>
    </main>
    <?php include 'includes/footer.inc.php' ?>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
