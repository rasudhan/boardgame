<?php
/* 
    Purpose: Demo6 - CRUD Operations
    Author: LV
    Date: February 2017
*/

 include_once ("shopsql.php");

if ((isset($_GET['orderID'])) && (is_numeric($_GET['orderID'])))
{
    $results = getOrderInfoByID($_GET['orderID']);
    
    
    foreach ($results as $game) {
        extract($game);
        addStock($gameID, $prodQty);
    }
    
    deleteOrder((int)$_GET['orderID']);
}

header("Location: orderhistory.php");
exit;

?>
