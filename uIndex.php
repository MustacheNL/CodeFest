<?php


require_once("session.php");

require_once("class.user.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

$pagename = "Home";
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
            <a href="dashboard/dashboard.php" class="mdl-layout__tab">Huizen</a>
            <a href="#features" class="mdl-layout__tab">Mijn kamer</a>
            <a href="#features" class="mdl-layout__tab">Mijn Account</a>
            <div class="mdl-layout-spacer"></div>
            <a href="logout.php?logout=true" class="mdl-layout__tab" style="color: red;">Uitloggen</a>



        </div>
    </header>
    <main class="mdl-layout__content">

        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Test</h2>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--4-col">4</div>
            <div class="mdl-cell mdl-cell--4-col">4</div>
        </div>
        <?php include 'includes/footer.inc.php' ?>
    </main>

    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
