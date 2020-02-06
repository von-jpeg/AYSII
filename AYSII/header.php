<?php
    session_start();
?>
<DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="This is an example of a meta description. This will often show in search results.">
        <meta name="viewport" content="width=device-width", initial-scale=1>
        <title>AYSII</title>
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <header>
            <nav class="nav-header-main">
                <div class="header-logo">
                    
                </div>
            </nav>
                <div class="header-login">
                    <?php 
                        if (isset($_SESSION['userId'])) {
                            echo    '<div id ="log_out_form">
                                        <form action="includes/logout.inc.php" method="post">
                                            <div id="log-out">
                                                <button type="submit" name="logout-submit">Logout</button>
                                            </div>
                                        </form>
                                    </div>';
                        }
                        else {
                            echo '<div id="interface">
                                    <form action="includes/login.inc.php" method="post">
                                        <div id="login-icon"
                                            <h1>Login</h1>
                                        </div>
                                        <br>
                                        <div id="forms">
                                            <input type="text" name="mailuid" placeholder="E-mail/Username">
                                            <input type="password" name="pwd" placeholder="Password">
                                        <div/>
                                        <br>
                                        <button class="submit-button" type="submit" name="login-submit">Login</button>
                                        <br>
                                        <div id="link">
                                            <a href="signup.php" class="header-signup">Sign Up</a>
                                            <br><br>
                                            <a class="about-link" href="about.php">About</a>
                                        </div>
                                    </form>
                                </div>';
                        }
                    ?>   
                    
                </div> 
        </header>

