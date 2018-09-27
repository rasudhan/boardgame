<?php
/*
    Purpose: Demo6 - Sql methods to access and update the RWStudios Database
    Author: LV
    Date: February 2017
    Uses: dbConnExec.php
 */

require_once 'dbConnExec.php';

function addUser($Username, $Password, $Name, $address, $City, $State, $Zipcode,$Phone,$Email,$Card)
{
    // escape single quotes within the string (e.g., "Schindler's List" is escaped as "Schindler''s List" 
    
//    $movieTitle = str_replace('\'', '\'\'', trim($movieTitle));
//    $pitchText = str_replace('\'', '\'\'', trim($pitchText));
//    $summary = str_replace('\'', '\'\'',trim($summary));
//    $imageName = trim($imageName);
//    
    $query = <<<STR
Insert Into users(username,password,name,address,city,state,phone,zipcode,email,creditCard)
Values('$Username','$Password','$Name','$address','$City','$State','$Phone','$Zipcode','$Email','$Card')
STR;

    executeQuery($query);
}


function checkValidUser($theusername,$thepassword)
{
    $query = <<<STR
Select username, password
From users 
Where username = '$theusername' 
            And password = '$thepassword'
STR;

    return executeQuery($query);
}

function getGameList()
{
    $query = <<<STR
Select gameID, name, description, boxImage
From dbo.Game
Order by gameID
STR;
    
    return executeQuery($query);
}

function searchGameList($Title, $Players, $Mechanic) {

    $whereAdd = "Where 0=0";
    
    if ($Title != "") {
        $whereAdd .= " And name like '%$Title%'";
    }
    
    if ($Players != "" And is_numeric($Players)) {
        $whereAdd .= " And minPlayers <= $Players And maxPlayers >= $Players";
    }
    
    if ($Mechanic !="" And is_numeric($Mechanic)) {
        $whereAdd .= " And mechID = $Mechanic";
    }
        
    $query = <<<STR
        Select Game.gameID, name, description, boxImage, GameMechanic.mechID
        From dbo.Game
            INNER JOIN GameMechanic ON Game.gameID = GameMechanic.gameID
        $whereAdd
        Order by gameID
STR;
        
   return executeQuery($query);
   
}

function getGameDetailsByID($gamePK)
{
   $query = <<<STR
Select name, description, price, stock, minTime, maxTime, minPlayers, maxPlayers, boxImage
From Game
Where gameID = $gamePK
STR;
    
    return executeQuery($query);
}


function deleteMovie($filmPK)
{
    $query = <<<STR
Delete
From film
Where filmpk = $filmPK
STR;

    executeQuery($query);
}

function GetMechanics()
{
       $query = <<<STR
Select mechID, name
From dbo.Mechanic
STR;

    return executeQuery($query); 
}

function updateUser($userID, $userName, $password, $name, $address, $city, $state, $phone, $zipcode, $email, $creditCard)
{
    $query = <<<STR
Update users
Set password = '$password', name = '$name', address = '$address', city ='$city', state = '$state', phone = '$phone', zipcode = '$zipcode', email = '$email', creditCard = '$creditCard'
Where userID = $userID
STR;

    executeQuery($query);
}

function getUserDetailsByID($userID)
{
   $query = <<<STR
Select username, password, name, address, city, state, phone, zipcode, email, creditCard
From users
Where userID = $userID
STR;
    
    return executeQuery($query);
}

function getUserDetailsByUserName($userName)
{
   $query = <<<STR
Select userID
From users
Where username = '$userName'
STR;
    
    return executeQuery($query);
}

function userExists($userName) {
    $query = <<<STR
Select userID, address
From users
Where username = '$userName'
STR;
    
    $results = executeQuery($query);
    
    if (empty($results)) {
        return false;
    }
    return true;
}

?>
