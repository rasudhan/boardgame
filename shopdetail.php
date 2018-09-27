<?php
/*
    Purpose: Online Store
    Author: LV
    Date: January 2017
 */

$listPage = 'index.php';

// If gamePK is not passed with page request, redirect to Store Search Page
// Else, assign the URL parameter to a variable

if (!isset($_GET['gamePK']) || !is_numeric($_GET['gamePK']))
{
    header('Location:' . $listPage);
    exit();
}
else
{
    $gamePK = (int) $_GET['gamePK'];
}

// include the functions library

require_once ('shopsql.php');

// Call the getMerchandiseDetails method

$merchList = getMerchandiseDetails($gamePK);

// If the number of records is not 1, redirect to Store Search Page

if (count($merchList) != 1)
{
   header('Location:' . $listPage);
   exit();
}

// extract the elements of the array

extract($merchList[0]);

// format the price field

$formattedPrice = number_format($merchandiseprice, 2,'.',',');

require_once ('../siteCommon.php');

displayPageHeader("Product Details");

$output = <<<ABC
<section>
<div>
<a href="viewcart.php">View Cart</a>
</div>
<h2 style="text-align: center">$merchandisename</h2>
<form action="updatecart.php" method = "post">
<input type="hidden" name="gamePK" value =$gamePK />
ABC;

// include img tag if an image exists for the film

if ($imagenamelarge !='')
{
    $output .= <<<DEF
<div style="text-align:center">
    <img src = "images/$imagenamelarge" />
</div>
DEF;
}

$output .= <<<GHI
<dl>
    <dt>Description:</dt>
        <dd>$merchandisedescription</dd>
    <dt>Price:</dt>
        <dd>\$$formattedPrice</dd>
    <dt>From the film:</dt>
        <dd>$movietitle</dd> <br />
    <dt><input name = "submit" type="submit" value="Add to Cart" /></dt>
</dl>

<p style="text-align: center">
        <a href="$listPage">[Back to Search Page]</a>
</p>
</form>
</section>
GHI;

echo $output;

displayPageFooter();
?>
