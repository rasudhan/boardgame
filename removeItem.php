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
        require_once ('ShopCart.php');
        require_once ('sql/bgsql.php');
        
        $itemNum = $_GET['gameID'];
        
        session_start();
            
        $_SESSION['aCart']->deleteCartItem($itemNum);
       
        
         header('refresh:0; URL=viewcart.php');
         die();
                
        ?>
    </body>
</html>
