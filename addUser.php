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


require_once ("sql/bgsql.php");

// Call the addUser method
echo "Submitting form...<br />";

$userName = $_POST['Username'];
echo "$userName <br />";

if (userExists($userName)) {
    echo "Username exists already.<br /> Redirecting...";
    $goto = $_SERVER['HTTP_REFERER'];
    header("refresh: 2; URL='$goto'");
    die();
}

echo "Adding user..";

addUser($_POST['Username'], $_POST['Password'], $_POST['Name'],
     $_POST['address'], $_POST['City'], $_POST['State'], $_POST['Zipcode'], $_POST['Phone'], $_POST['Email'], $_POST['Creditcard']);

            header('refresh: 1; URL=login.php');
            die();
            
?>
    </body>
</html>
