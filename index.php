<!doctype html>
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
    <title>Team117 Storefront</title>
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
            
        <form name="search" id="search" method="post" action="index.php">
            <div class="searcherbox">
            <div class="searcher">
            <label for="Title">Title:</label>
            <input type="text" name="Title" id="Title">
            </div>
            
            <div class="searcher">
            <label for="Players">Player Count:</label>
            <input type='number' name="Players" id="Players" min="1" max="20">
            </div>
           
            <div class="searcher">
            <label for="MechanicPK">Mechanic: </label>
          
            
            <?php
            require_once("sql/bgsql.php");
            $mechanics = GetMechanics();
            
           //echo "<pre>";
            //print_r($mechanics);
            //echo "</pre>";
            
            
            echo "<select name='MechanicPK' id='Mechanic'>";
            echo '<option value=""></option>';
            
                
              foreach ($mechanics as $aMechanic)
              {
                  extract($aMechanic); //extract the array elements
                  echo '<option value="' . $mechID . '">' . $name . '</option>';
              }
              
          ?>
            </select>
            </div>
                
                <div class="searcher">
                    <input name="search" type="submit" value="Search" />
                </div>
                
            </div>
            
            <br />
 
        </form>

        <br /> <br />
        
        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width">

                <?php
                dbConnect();
                
                //$gameList = GetGameList();
                $Title = $_POST['Title'];
                $Players = $_POST['Players'];
                $Mechanic = $_POST['MechanicPK'];
                //echo "<br /> <br /> <p>$Title - $Players - $Mechanic";
                $gameList = searchGameList($Title, $Players, $Mechanic);
                //$gameFK = 1;
                echo "<br />";
                
                $prevID = 0;
                foreach($gameList as $game) {
                    extract($game);
                    if ($gameID != $prevID) {
                    echo '<div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">';
                    echo '<div class="mdl-card__media">';
                    echo "<a href='gamepage.php?gamePK=$gameID'>";
                    echo "<img class='article-image' src='$boxImage' border='0' alt=''></a>";
                    echo '</div>';
                    echo '<div class="mdl-card__title">';
                    echo '    <h2 class="mdl-card__title-text">' . $name . '</h2>';
                    echo '</div>';
                    echo '<div class="mdl-card__supporting-text">';
                    echo $description;
                    echo '</div>';
                    echo '<div class="mdl-card__actions mdl-card--border">';
                    echo "<a class='mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent' href='gamepage.php?gamePK=$gameID'>Learn more</a>";
                    //$gameFK ++;
                    echo '</div>';
                echo '</div>';
                    }
                $prevID = $gameID;
                }
                
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
