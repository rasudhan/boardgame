﻿<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
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

                <?php
                require_once("sql/bgsql.php");
                
                dbConnect();
                
                if (!isset($_GET['gamePK'])|| !is_numeric($_GET['gamePK']))
                {
                    header('Location:index.php');
                    exit();
                }
                else
                {
                    $gamePK = (int) $_GET['gamePK'];
                }
                
                $game = getGameDetailsByID($gamePK);
                
                extract($game[0]);

                /*echo "<article>";
                echo "<h1>$name</h1><br/>";
                echo "<img src=$boxImage width=35% height=35%>";
                echo "$description <br/> <br/>";
                echo "</article>";
                echo "<aside>Players: $minPlayers - $maxPlayers <br/>";
                echo "Time: $minTime - $maxTime <br/>";
                echo "Price: $price <br/>";
                echo "Stock: $stock <br/>";
                echo "</aside>";
                */
                  
                    echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">';
                    echo '<div class="mdl-card__media">';
                    echo '<img class="article-image" src=' . $boxImage . ' border="0" alt="">';
                    echo '</div>';
                    echo '<div class="mdl-card__title">';
                    echo '    <h2 class="mdl-card__title-text">' . $name . '</h2>';
                    echo '</div>';
                    echo '<div class="mdl-card__supporting-text">';
                    echo $description;
                    echo '</div>';
                echo '</div>';
                
                    echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">';
                    echo '<div class="mdl-card__supporting-text">';
                    echo "<h3 align='center' style='background-color:powderblue;'>Players</h3><h4 align='center' style='background-color:powderblue;'>$minPlayers - $maxPlayers</h4>";
                    echo "<h3 align='center' style='background-color:yellow;'>Time</h3><h4 align='center' style='background-color:yellow;'>$minTime - $maxTime</h4>";
                    echo '</div>';                    
                echo '</div>';

                                    echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">';
                    echo '<div class="mdl-card__supporting-text">';
                    echo "<h3 align='center' style='background-color:lightgreen;'>Price</h3><h4 align='center' style='background-color:lightgreen;'>$price</h4>";
                    echo "<h4 align='center' style='background-color:black; color:white;'>Stock</h4><h4 align='center' style='background-color:black; color:white;'>$stock</h4>";
                    echo '</div>'; 
                    echo '<div class="mdl-card__actions mdl-card--border">';
                    
                      echo '<form action="updatecart.php" method = "post">';
                      $output .= <<<GHI
                     <input type="hidden" name="gamePK" value = $gamePK>
GHI;
                      echo $output;
                     echo '<!-- Accent-colored raised button -->
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                              Add to Cart
                            </button>';
                     
                    //echo "<a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent' href='gamepage.php?gamePK=$gameFK'>Add to Cart</a>";
                    echo '</form>';
                    echo '</div>';
                echo '</div>';
                
                ?>
                
            </div>
            
            <?php
            footer();
            ?>
        </main>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>

</html>