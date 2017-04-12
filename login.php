<?php include 'includes/includes.inc.php'; ?>
<header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
    <div class="mdl-layout--large-screen-only mdl-layout__header-row">
    </div>
    <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        <h3>CodeFest</h3>
    </div>
    <div class="mdl-layout--large-screen-only mdl-layout__header-row">
    </div>
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
        <a href="#overview" class="mdl-layout__tab is-active">Overview</a>
        <a href="#features" class="mdl-layout__tab">Features</a>
        <a href="#features" class="mdl-layout__tab">Details</a>
        <a href="#features" class="mdl-layout__tab">Technology</a>
        <a href="#features" class="mdl-layout__tab">FAQ</a>
        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" id="add">
            <i class="material-icons" role="presentation">add</i>
            <span class="visuallyhidden">Add</span>
        </button>
    </div>
</header>

<body>
    <div class="form">
        <ul class="tab-group">
            <li class="tab active"><a href="#signup">Sign Up</a></li>
            <li class="tab"><a href="#login">Log In</a></li>
        </ul>

        <div class="tab-content">
            <div id="signup">
                <h1>Sign Up for Free</h1>

                <form action="/" method="post">
                    <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                First Name<span class="req">*</span>
                            </label>
                            <input type="text" required autocomplete="off" />
                        </div>

                        <div class="field-wrap">
                            <label>
                                Last Name<span class="req">*</span>
                            </label>
                            <input type="text"required autocomplete="off"/>
                        </div>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email"required autocomplete="off"/>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Set A Password<span class="req">*</span>
                        </label>
                        <input type="password"required autocomplete="off"/>
                    </div>

                    <button type="submit" class="button button-block"/>Get Started</button>

                </form>

            </div>

            <div id="login">
                <h1>Welcome Back!</h1>

                <form action="/" method="post">

                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email"required autocomplete="off"/>
                    </div>

                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*</span>
                        </label>
                        <input type="password"required autocomplete="off"/>
                    </div>

                    <p class="forgot"><a href="#">Forgot Password?</a></p>

                    <button class="button button-block"/>Log In</button>

                </form>

            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->
</body>
