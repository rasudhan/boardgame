<?php

require_once ("sql/bgsql.php");

// if $_POST has a filmpk element, call the update method

        $password = $_POST['password'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $phone = $_POST['phone'];
        $zipcode = $_POST['zipcode'];
        $email = $_POST['email'];
        $creditCard = $_POST['creditCard'];
        $userID = $_POST['userID'];
        $userName = $_POST['userName'];
        
        //echo "User : $userID, $userName, $password, $name, $address, $city, $state, $phone, $zipcode, $email, $creditCard <br />";
        
        updateUser($userID, $userName, $password, $name, $address, $city, $state, $phone, $zipcode, $email, $creditCard);
        
        echo "Update in progress...";
        
            header('refresh:1; URL=index.php');
            die();



exit;
?>
