<?php
/*
    Purpose: Online Store - Database Functions
    Author: LV
    Date:  January 2017
 */

require_once 'sql/bgsql.php';

function getMerchandiseByName($merchandiseName)
{
    $query = <<<STR
Select merchandisepk, merchandisename, merchandiseprice, imagenamesmall
From merchandise
Where merchandisename like '%$merchandiseName%'
STR;

    return executeQuery($query);
}

function getGameDetails($gamePK)
{
    $query = <<<STR
Select gameID, name, description, price, boxImage
From Game
Where gameID = $gamePK
STR;

    return executeQuery($query);
}

function getGamesInCart($gamePKs)
{
    $query = <<<STR
Select gameID, name, price
From Game
Where gameID in ($gamePKs)
STR;

    return executeQuery($query);
}

function getUser($userLogin, $userPassword)
{
    $query = <<<STR
Select userID, name
From users
Where username = '$userLogin'
and password = '$userPassword'
STR;

return executeQuery($query);
}

function insertOrder($userFK,$amount)
{
    $query = <<<STR
Insert Into [dbo].[Order](userID,orderAmount) 
Values ($userFK,$amount);
Select SCOPE_IDENTITY() As newOrderID;
STR;

    return executeQuery($query);
}

function insertOrderItem($gameOrderFK, $gameFK, $orderQty)
{
    $query = <<<STR
Insert into OrderItem(orderID, gameID, prodQty)
Values ($gameOrderFK, $gameFK, $orderQty)
STR;

    executeQuery($query);
}

function getOrderHistory($userID) {
    
     $query = <<<STR
Select orderID, orderAmount, timestamp
From [dbo].[Order]
Where userID = '$userID'
STR;

return executeQuery($query);
    
}

function deleteOrder($orderID) {
      $query = <<<STR
Delete
From [dbo].[Order]
Where orderID= '$orderID'
STR;

return executeQuery($query);
}

function removeStock($gameID, $copies) {

$query = <<<STR
Update Game
Set stock = stock - $copies
Where gameID = $gameID
STR;

return executeQuery($query);
}

function addStock($gameID, $copies) {
    $query = <<<STR
            Update Game
            Set stock = stock + $copies
            Where gameID = $gameID
STR;
            
    return executeQuery($query);        
}
    
function getOrderInfoByID($orderID) {
    $query = <<<STR
            Select gameID, prodQty
            From OrderItem
            Where orderID = $orderID
STR;
    
    return executeQuery($query);
}


?>