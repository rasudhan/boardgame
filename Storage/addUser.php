
<?php


require_once ("sql/bgsql.php");

// Call the addUser method

if (!userexists($_POST('Username'))) {
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


