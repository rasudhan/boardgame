<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();

// the cookie that holds the session id is destroyed

if (isset($_COOKIE[session_name()]))
{
    setcookie(session_name(),"",time()-3600); //destroy the session cookie on the client
}

$_SESSION = array(); // unset or remove all data from the $_SESSION array
session_destroy(); //erase session data from the disk
session_write_close(); // make sure the changes are committed

header('Refresh: 2; URL=index.php');

echo '<h2>Thank you for Logging out.  You will now be redirected to our home page.</h2>';

die();
        ?>
    </body>
</html>
