<?php
$pagename = "Home";
include 'includes/includes.inc.php';
?>
<html lang="en">
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
            <h3>CodeFest</h3>
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
            <a href="#overview" class="mdl-layout__tab is-active">Home</a>
            <a href="#features" class="mdl-layout__tab">Huizen</a>
            <a href="#features" class="mdl-layout__tab">Details</a>
            <a href="#features" class="mdl-layout__tab">Technology</a>
            <a href="#features" class="mdl-layout__tab">FAQ</a>
        </div>
    </header>
    <main class="mdl-layout__content">
        <style>
            .demo-card-wide.mdl-card {
                width: 512px;
                margin: auto;
                margin-top: 50px;
                margin-bottom: 50px;
            }
            .demo-card-wide > .mdl-card__title {
                color: black;


            }

        </style>
        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Welcome</h2>
            </div>
            <div class="mdl-card__supporting-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Mauris sagittis pellentesque lacus eleifend lacinia...
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Get Started
                </a>
            </div>

        </div>
        <?php include 'includes/footer.inc.php' ?>
    </main>

<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
