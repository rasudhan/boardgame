<?php
/* 
    Purpose: Online Store
    Author: LV
    Date: January 2017
*/

require_once ('ShopCart.php');

session_start();

///
// if the form element gamePK is set

if (isset($_POST['gamePK']))
{
    // if the session element aCart is not set
       
    if (!isset($_SESSION['aCart']))
    {
        // instantiate a shopCart object

        $_SESSION['aCart'] = new shopCart();
    }
    
        // if the form element merchandiseqty is set (if the user updates the quanity for a product in their shopping cart)

    if (isset($_POST['gameqty']))
    {
        // call the updateCartItem method

        $_SESSION['aCart']->updateCartItem($_POST['gamePK'],$_POST['gameqty']);
    }
    else
    {
        // call the addCartItem method
        $_SESSION['aCart']->addCartItem($_POST['gamePK']);
    }
}

header('location:viewcart.php');
exit();
?>
