<html lang="en">
<?php $pagename = "Dashboard";
include 'includes/includes.inc.php';
require_once("session.php");
require_once("class.user.php");
$auth_user = new USER();
$user_id = $_SESSION['user_session'];
$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);


?>
<head>
    <link rel="stylesheet" href="css/styles-dashboard.css">
    <link rel="shortcut icon" href="images/favicon.ico">
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".content1").hide();
            $(".content2").hide();
            $(".content3").hide();

            $("#content1").click(function(){
                $(".content1").show();
                $(".content2").hide();
                $(".content3").hide();
            });
            $("#content2").click(function(){
                $(".content2").show();
                $(".content1").hide();
                $(".content3").hide();
            });
            $("#content3").click(function(){
                $(".content3").show();
                $(".content2").hide();
                $(".content1").hide();
            });
        });
    </script>
</head>
<body>
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">@Home</span>
            <div class="mdl-layout-spacer"></div>
        </div>
    </header>
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <img src="images/user.jpg" class="demo-avatar">
            <div class="demo-avatar-dropdown">
                <span><?php echo $userRow['user_email']; ?></span>
                <div class="mdl-layout-spacer"></div>
                <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons" role="presentation">arrow_drop_down</i>
                    <span class="visuallyhidden">Accounts</span>
                </button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                    <li class="mdl-menu__item" id="Register">Add account...</li>
                    <li class="mdl-menu__item">Delete account...</li>
                    <a href="logout.php?logout=true" style="text-decoration: none;"><li class="mdl-menu__item">Log out...</li></a>
                </ul>
            </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <a class="mdl-navigation__link" id="content1" href="#">Betalingen huur</a>
            <a class="mdl-navigation__link" id="content2" href="#">Exporteren</a>
            <a class="mdl-navigation__link" id="content3" href="#">Statistieken</a>
            <div class="mdl-layout-spacer"></div>
        </nav>
    </div>
    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <div class="content1" style="width: 100%">
                <table class="mdl-data-table mdl-js-data-table">
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">name</th>
                        <th class="mdl-data-table__cell--non-numeric">email</th>
                    </tr>
                <?php
                $obj = new Database();
                $stmt = $obj->dbConnection()->prepare("SELECT * FROM users");
                $stmt->execute();
                $results=$stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($results as $row): ?>

                    <tr>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $row['user_name']; ?></td>
                        <td class="mdl-data-table__cell--non-numeric"><?php echo $row['user_email']; ?></td>

                    </tr>
                <?php endforeach; ?>
                </table>

            </div>

            <div class="content2" style="width: 100%">
                <p>content2</p>
            </div>

            <div class="content3" style="width: 100%">
                <p>content3</p>
            </div>

        </div>
    </main>

<!--    <main class="mdl-layout__content mdl-color--grey-100">-->
<!--        <div class="mdl-grid demo-content">-->
<!--            <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">-->
<!--                <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">-->
<!--                    <use xlink:href="#piechart" mask="url(#piemask)" />-->
<!--                    <text x="0.5" y="0.5" font-family="Roboto" font-size="0.3" fill="#888" text-anchor="middle" dy="0.1">82<tspan font-size="0.2" dy="-0.07">%</tspan></text>-->
<!--                </svg>-->
<!--                <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">-->
<!--                    <use xlink:href="#piechart" mask="url(#piemask)" />-->
<!--                    <text x="0.5" y="0.5" font-family="Roboto" font-size="0.3" fill="#888" text-anchor="middle" dy="0.1">82<tspan dy="-0.07" font-size="0.2">%</tspan></text>-->
<!--                </svg>-->
<!--                <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">-->
<!--                    <use xlink:href="#piechart" mask="url(#piemask)" />-->
<!--                    <text x="0.5" y="0.5" font-family="Roboto" font-size="0.3" fill="#888" text-anchor="middle" dy="0.1">82<tspan dy="-0.07" font-size="0.2">%</tspan></text>-->
<!--                </svg>-->
<!--                <svg fill="currentColor" width="200px" height="200px" viewBox="0 0 1 1" class="demo-chart mdl-cell mdl-cell--4-col mdl-cell--3-col-desktop">-->
<!--                    <use xlink:href="#piechart" mask="url(#piemask)" />-->
<!--                    <text x="0.5" y="0.5" font-family="Roboto" font-size="0.3" fill="#888" text-anchor="middle" dy="0.1">82<tspan dy="-0.07" font-size="0.2">%</tspan></text>-->
<!--                </svg>-->
<!--            </div>-->
<!--            <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">-->
<!--                <svg fill="currentColor" viewBox="0 0 500 250" class="demo-graph">-->
<!--                    <use xlink:href="#chart" />-->
<!--                </svg>-->
<!--                <svg fill="currentColor" viewBox="0 0 500 250" class="demo-graph">-->
<!--                    <use xlink:href="#chart" />-->
<!--                </svg>-->
<!--            </div>-->
<!--            <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">-->
<!--                <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">-->
<!--                    <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">-->
<!--                        <h2 class="mdl-card__title-text">Updates</h2>-->
<!--                    </div>-->
<!--                    <div class="mdl-card__supporting-text mdl-color-text--grey-600">-->
<!--                        Non dolore elit adipisicing ea reprehenderit consectetur culpa.-->
<!--                    </div>-->
<!--                    <div class="mdl-card__actions mdl-card--border">-->
<!--                        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Read More</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="demo-separator mdl-cell--1-col"></div>-->
<!--                <div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">-->
<!--                    <div class="mdl-card__supporting-text mdl-color-text--blue-grey-50">-->
<!--                        <h3>View options</h3>-->
<!--                        <ul>-->
<!--                            <li>-->
<!--                                <label for="chkbox1" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">-->
<!--                                    <input type="checkbox" id="chkbox1" class="mdl-checkbox__input">-->
<!--                                    <span class="mdl-checkbox__label">Click per object</span>-->
<!--                                </label>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <label for="chkbox2" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">-->
<!--                                    <input type="checkbox" id="chkbox2" class="mdl-checkbox__input">-->
<!--                                    <span class="mdl-checkbox__label">Views per object</span>-->
<!--                                </label>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <label for="chkbox3" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">-->
<!--                                    <input type="checkbox" id="chkbox3" class="mdl-checkbox__input">-->
<!--                                    <span class="mdl-checkbox__label">Objects selected</span>-->
<!--                                </label>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <label for="chkbox4" class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">-->
<!--                                    <input type="checkbox" id="chkbox4" class="mdl-checkbox__input">-->
<!--                                    <span class="mdl-checkbox__label">Objects viewed</span>-->
<!--                                </label>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="mdl-card__actions mdl-card--border">-->
<!--                        <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--blue-grey-50">Change location</a>-->
<!--                        <div class="mdl-layout-spacer"></div>-->
<!--                        <i class="material-icons">location_on</i>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </main>-->
</div>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
    <defs>
        <mask id="piemask" maskContentUnits="objectBoundingBox">
            <circle cx=0.5 cy=0.5 r=0.49 fill="white" />
            <circle cx=0.5 cy=0.5 r=0.40 fill="black" />
        </mask>
        <g id="piechart">
            <circle cx=0.5 cy=0.5 r=0.5 />
            <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
        </g>
    </defs>
</svg>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250" style="position: fixed; left: -1000px; height: -1000px;">
    <defs>
        <g id="chart">
            <g id="Gridlines">
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="27.3" x2="468.3" y2="27.3" />
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="66.7" x2="468.3" y2="66.7" />
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="105.3" x2="468.3" y2="105.3" />
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="144.7" x2="468.3" y2="144.7" />
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="184.3" x2="468.3" y2="184.3" />
            </g>
            <g id="Numbers">
                <text transform="matrix(1 0 0 1 485 29.3333)" fill="#888888" font-family="'Roboto'" font-size="9">500</text>
                <text transform="matrix(1 0 0 1 485 69)" fill="#888888" font-family="'Roboto'" font-size="9">400</text>
                <text transform="matrix(1 0 0 1 485 109.3333)" fill="#888888" font-family="'Roboto'" font-size="9">300</text>
                <text transform="matrix(1 0 0 1 485 149)" fill="#888888" font-family="'Roboto'" font-size="9">200</text>
                <text transform="matrix(1 0 0 1 485 188.3333)" fill="#888888" font-family="'Roboto'" font-size="9">100</text>
                <text transform="matrix(1 0 0 1 0 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">1</text>
                <text transform="matrix(1 0 0 1 78 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">2</text>
                <text transform="matrix(1 0 0 1 154.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">3</text>
                <text transform="matrix(1 0 0 1 232.1667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">4</text>
                <text transform="matrix(1 0 0 1 309 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">5</text>
                <text transform="matrix(1 0 0 1 386.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">6</text>
                <text transform="matrix(1 0 0 1 464.3333 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">7</text>
            </g>
            <g id="Layer_5">
                <polygon opacity="0.36" stroke-miterlimit="10" points="0,223.3 48,138.5 154.7,169 211,88.5
              294.5,80.5 380,165.2 437,75.5 469.5,223.3 	"/>
            </g>
            <g id="Layer_4">
                <polygon stroke-miterlimit="10" points="469.3,222.7 1,222.7 48.7,166.7 155.7,188.3 212,132.7
              296.7,128 380.7,184.3 436.7,125 	"/>
            </g>
        </g>
    </defs>
</svg>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>
