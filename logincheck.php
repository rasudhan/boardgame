<?php
/*
    Purpose: Online Store
    Author: LV
    Date: January 2017
 */

session_start();

if (!isset($_SESSION['userInfo']))
{
    header('Refresh: 2; URL=login.php?redirect=' . $_SERVER['PHP_SELF']);
    echo '<h2>You are being redirected to the login page...</h2>';
    die();
}
?>
