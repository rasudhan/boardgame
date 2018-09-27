<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A portfolio template that uses Material Design Lite.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>117 - Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-pink.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script type="text/javascript">
    jQuery(document).ready(function($) {
        $( "#loginpage" ).addClass( "is-active" );
         $( "#index" ).removeClass( "is-active" );
    });

        </script>
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header mdl-layout__header--waterfall portfolio-header">
            <div class="mdl-layout__header-row portfolio-logo-row">
                <span class="mdl-layout__title">
                    <div class="portfolio-logo"></div>
                    <span class="mdl-layout__title">For the Love of the Games</span>
                </span>
            </div>

                        <?php
            require_once('siteCommon.php');
            menu();
            ?>
            
        </header>


        
        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width portfolio-contact">
                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Login</h2>
                    </div>

                    <div class="mdl-card__supporting-text">
                        <p>
                            Enter login information below
                        </p>

            <?php

session_start();

require_once("shopsql.php");

// Set local variables to $_POST array elements (loginID and loginPassword) or empty strings

$userLogin = (isset($_POST['loginID'])) ? trim($_POST['loginID']) : '';
$userPassword = (isset($_POST['loginPassword'])) ? trim($_POST['loginPassword']) : '';
   
$redirect = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] : 'index.php';

// if the form was submitted

if (isset($_POST['login']))
{
    //Call getUser method to check credentials

    $userList = getUser($userLogin, $userPassword);

    if (count($userList)===1) //If credentials check out
    {
        extract($userList[0]);

        // assign user info to an array

        $userInfo = array('userPK'=>$userID, 'firstname'=>$name);
      
        // assign the array to a session element

        $_SESSION['userInfo'] = $userInfo;

        // redirect the user

        header('location:' . $redirect);
        die();
    }

    else // Otherwise, display error message
    {
        $error = 'Invalid login credentials<br />Please try again.';
    }
}


echo "<section>";
// if error variable was set, display it

if (isset($error))
{
    echo '<div id="error">' . $error . '</div>';
}
?>


                 <form name="loginform" action="login.php" method="POST" class="">
                      <input type="hidden" name ="redirect" value ="<?php echo $redirect ?>" />
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" pattern="[A-Z,a-z,]*" type="text" name="loginID">
                                <label class="mdl-textfield__label" for="Name">User Name...</label>
                                <span class="mdl-textfield__error">Letters only</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" name="loginPassword">
                                <label class="mdl-textfield__label" for="password">Password...</label>
                            </div>

                            <p>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="login">
                                    Login
                                </button>
                            </p>

                            
                        </form>
                        <form action="registration.php">
                            <p>
                                If you don't have an account, please register a new account
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">
                                    Register
                                </button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            footer();
            ?>
            
        </main>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>

</html>
