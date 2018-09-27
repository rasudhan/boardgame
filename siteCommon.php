<?php


function menu() {
    
    session_start();
    require_once('ShopCart.php');


            echo '<div class="mdl-layout__header-row portfolio-navigation-row mdl-layout--large-screen-only">
                <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font">
                    <a id="index" class="mdl-navigation__link is-active" href="index.php">Search</a>
                    <a id="contact" class="mdl-navigation__link" href="contact.php">Contact</a>';
                        echo '<a id="cart" class="mdl-navigation__link" href="viewcart.php">Cart</a>';

                    if (!isset($_SESSION['userInfo'])){
                        echo '<a id="loginpage" class="mdl-navigation__link" href="login.php">Log In / Register</a>';
                    }
                    else {
                        echo '<a id="profile" class="mdl-navigation__link" href="updateUser.php">Profile</a>';
                         echo '<a id="orderhistory" class="mdl-navigation__link" href="orderhistory.php">OrderHistory</a>';
                        echo '<a id="logout" class="mdl-navigation__link" href="logout.php">Log Out</a>';
                    }
            echo '</nav>
            </div>
        </header>
        <div class="mdl-layout__drawer mdl-layout--small-screen-only">
            <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font">
                <a id="index" class="mdl-navigation__link is-active" href="index.php">Search</a>
                <a id="contact" class="mdl-navigation__link" href="contact.php">Contact</a>';
                        echo '<a id="cart" class="mdl-navigation__link" href="viewcart.php">Cart</a>';

                if (!isset($_SESSION['userInfo'])){
                    echo '<a id="loginpage" class="mdl-navigation__link" href="login.php">Log In / Register</a>';
                }
                else {
                    echo '<a id="profile" class="mdl-navigation__link" href="updateUser.php">Profile</a>';
                     echo '<a id="orderhistory" class="mdl-navigation__link" href="orderhistory.php">OrderHistory</a>';
                    echo '<a id="logout" class="mdl-navigation__link" href="logout.php">Log Out</a>';
                }
            echo '</nav>
        </div>';
}

function footer() {
                echo '<footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo">For the Love of the Games</div>
                </div>
                <div class="mdl-mini-footer__right-section">
                    <ul class="mdl-mini-footer__link-list">
                        <li><a href="contact.php">Help</a></li>
                       
                    </ul>
                </div>
            </footer>';
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>