<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A portfolio template that uses Material Design Lite.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>117 - Place Order</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-pink.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header mdl-layout__header--waterfall portfolio-header">
            <div class="mdl-layout__header-row portfolio-logo-row">
                <span class="mdl-layout__title">
                    <div class="portfolio-logo"></div>
                    <span class="mdl-layout__title">For the Love of the Games</span>
                </span>
            </div>
             <?php
             require_once ('ShopCart.php');
             require_once('siteCommon.php');
             menu();
            ?>
        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
      <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Cart</h2>
                    </div>
<?php



session_start();

// if the session variable is not set or is empty display appropriate message; otherwise display the items

if (!isset($_SESSION['aCart']) || count($_SESSION['aCart']->getCartItems()) === 0)
{
    header('Refresh: 5; URL=index.php');
    echo '<h2>You shopping cart is empty <br /> You will be redirected to our store in 5 seconds.</h2>';
    echo '<h2>If you are not redirected, please <a href="index.php">Click here to visit our Store</a>.</h2>';
    die();
}

require_once('logincheck.php');

require_once ('shopsql.php');

// call the insertOrder method; get the orderPK of the newly added order


$orderIDResult = insertOrder($_SESSION['userInfo']['userPK'],$_COOKIE['OAMOUNT']);

extract($orderIDResult);

$newOrderID = $orderIDResult[0]['newOrderID'];


// for each item in the shopping cart, 
// insert a row into the merchandiseorderitems table

foreach($_SESSION['aCart']->getCartItems() as $aKey => $aValue)
{
    
    insertOrderItem($newOrderID, $aKey, $aValue);

    // delete the item from the cart
    
    removeStock($aKey, $aValue);
    
    $_SESSION['aCart']->deleteCartItem($aKey);
}


$output = <<<ABC
<section>
<h4 style="text-align: center">Thank you for your order<br>Order Reference #$newOrderID</h4>
<p style="text-align: center">
    <a href="index.php">[Back to our store]</a>
</p>
</section>
ABC;
setcookie("OAMOUNT","",time()-3600);
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


