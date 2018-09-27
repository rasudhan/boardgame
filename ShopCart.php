<?php
/*    Purpose: Online Store
    Author: LV
    Date: January 2017
 */

class shopCart
{
   //Properties

    private $cartItems;

   // Constructor

    public function __construct()
    {
        $this->cartItems = array();
    }

   // adds an item to the $cartItems array

    public function addCartItem($gameID)
    {
        // if the item is not already in the array, add the item to the array

        if (!array_key_exists($gameID, $this->cartItems))
        {
            $this->cartItems[$gameID] = 1;
        }

        // else, increase the quantity for the item by one
        else
        {
            $this->cartItems[$gameID] ++;
        }
    }

    // returns the $cartItems array

    public function getCartItems()
    {
        return $this->cartItems;
    }

    // returns the quantity for a specific item

    public function getQtyByGameID($gameID)
    {
        return $this->cartItems[$gameID];
    }

    // update the quantity for a specific item

    public function updateCartItem($gameID, $orderQty)
    {
        if ((int)$orderQty === 0)
        {
            $this->deleteCartItem($gameID);
        }
        else
        {
            $this->cartItems[$gameID] = (int)$orderQty;
        }
    }

    // delete a specific item from the array

    public function deleteCartItem($gameID)
    {
        unset($this->cartItems[$gameID]);
    }
}

?>
