<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A portfolio template that uses Material Design Lite.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-pink.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script type="text/javascript">
    jQuery(document).ready(function($) {
        $( "#orderhistory" ).addClass( "is-active" );
         $( "#index" ).removeClass( "is-active" );
    });

        </script>
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
             
             require_once('siteCommon.php');
             menu();
            ?>
        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">
      <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Order History</h2>
                    </div>
<?php
/*
    Purpose: Online Store
    Author: LV
    Date: January 2017
 */ 
session_start();
require_once ('ShopCart.php');

require_once('logincheck.php');

require_once ('shopsql.php');

$userID = $_SESSION['userInfo']['userPK'];
$contactName = $_SESSION['userInfo']['firstname'];


$pastOrders = getOrderHistory($userID);
$cartItems = count($pastOrders);

$output = <<<HTML
<section>
<h2 style="text-align: center">Hi $contactName, You have $cartItems orders(s) in the past</h2>
<br><h4>Orders can be cancelled within 24 hours</h4>
<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
    <tr>
        <th>Order ID</th>
        <th>Order Amount</th>
        <th>Timestamp</th>
        <th>Want to Cancel?</th>
    </tr>
HTML;

foreach ($pastOrders as $aItem)
{
    extract($aItem);
    $output .= <<<HTML
    <tr>
        <td>
            $orderID
        </td>
        <td style="text-align: left; font-style: normal">
            $$orderAmount
        </td>
        <td style="text-align: left">
            $timestamp
        </td>
            <td style="text-align: right">
       
       
HTML;
//echo strtotime($timestamp);

   
 if(time() - strtotime($timestamp) < 86400) 
    $output.= <<<HTML
            <a href="cancelorder.php?orderID=$orderID">Cancel</a>
        </td>
    </tr>
HTML;
else 
     $output.= <<<HTML
            Your order cannot be cancelled!
        </td>
    </tr>
HTML;


}//end of for loop



$output .= <<<HTML
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
            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo">Simple portfolio website</div>
                </div>
                <div class="mdl-mini-footer__right-section">
                    <ul class="mdl-mini-footer__link-list">
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Privacy & Terms</a></li>
                    </ul>
                </div>
            </footer>
        </main>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>

</html>



