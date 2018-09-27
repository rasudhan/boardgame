<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A portfolio template that uses Material Design Lite.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>MDL-Static Website</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-pink.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
        <?php
        require_once('siteCommon.php');
        require_once ('ShopCart.php');
        echo '<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header mdl-layout__header--waterfall portfolio-header">
            <div class="mdl-layout__header-row portfolio-logo-row">
                <span class="mdl-layout__title">
                    <div class="portfolio-logo"></div>
                    <span class="mdl-layout__title">For the Love of the Games</span>
                </span>
            </div>';
        menu();
        ?>
        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
      <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Cart</h2>
                    </div>
         
<?php
/*
    Purpose: Online Store
    Author: LV
    Date: January 2017
 */ 



session_start();

// if the session variable is not set or is empty display appropriate message; otherwise display the items

if (!isset($_SESSION['aCart']) || count($_SESSION['aCart']->getCartItems()) === 0)
{
    header('Refresh: 5; URL=index.php');
    echo '<h2>You shopping cart is empty <br /> You will be redirected to our store in 5 seconds.</h2>';
    echo '<h2>If you are not redirected, please <a href="shopsearch.php">Click here to visit our Store</a>.</h2>';
    die();
}

require_once('logincheck.php');

require_once ('shopsql.php');

// get a list of gameIDs for the cart items

$gameIDs = join(array_keys($_SESSION['aCart']->getCartItems()),',');
//print_r($gameIDs);
//get game details for the items in the cart

$cartList = getGamesInCart($gameIDs);

// get a count of the number of items in the cart

$cartItems = count($cartList);

$contactName = $_SESSION['userInfo']['firstname'];

$output = <<<HTML
<section>
<h2 style="text-align: center">Hi $contactName, You have $cartItems product(s) in your cart</h2>

<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
    <tr>
        <th>Item Name</th>
        <th>Item Quantity</th>
        <th>Unit Price</th>
        <th>Extended price</th>
    </tr>
HTML;

foreach ($cartList as $aItem)
{
    extract($aItem);
    $gameQty = $_SESSION['aCart']->getQtyByGameID($gameID);
    $extendedPrice = $gameQty * $price;
    $totalPrice += $extendedPrice;
    $formattedExtendedPrice = number_format($extendedPrice, 2);
    $formattedPrice = number_format($price, 2);
    $output .= <<<HTML
    <tr>
        <td>
            $name
        </td>
        <td style="text-align: right; font-style: normal">
            $gameQty
        </td>
        <td style="text-align: right">
            $$formattedPrice
        </td>
        <td style="text-align: right">
            $$formattedExtendedPrice
        </td>
    </tr>
HTML;
}
$formattedTotalPrice = number_format($totalPrice,2);
setcookie("OAMOUNT",$formattedTotalPrice,time()+86400);

$output .= <<<HTML
    <tr>
        <td colspan="2" style="text-align: center">
            <b>Your order total is: $$formattedTotalPrice</b>
        </td>
        <td colspan="2" style="text-align: center">
        <form action="placeorder.php" method="post">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
  Place Order
</button> 
        </form>
        </td>
    </tr>
</table>
<p style="text-align: center">
    <a href="index.php">[Continue shopping]</a>
</p>
</section>
HTML;

// display the output

echo $output;


?>

                    </div>
                </div>
            </div>
            <?php
            footer();
            ?>
        </main>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>

</html>



