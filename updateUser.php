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
    <title>117 - About</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-pink.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script type="text/javascript">
    jQuery(document).ready(function($) {
        $( "#profile" ).addClass( "is-active" );
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

require_once ("sql/bgsql.php");

require_once ('logincheck.php');

                      
                        if (isset($_SESSION['userInfo'])) {
                            extract($_SESSION['userInfo']);
                            $userDeets = getUserDetailsByID($userPK);
                            extract($userDeets[0]);
                        }
                        
                        $userID = $userPK;
           
?>
<main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width portfolio-contact">
                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Edit User Information</h2>
                    </div>

                        
<form name ="addEditForm" id="addEditForm" action="updateUserA.php" method="post" onsubmit="return checkForm(this)">

    <?php
   
        echo '<input type="hidden" name="userID" value="' . $userID . '" />';
        echo '<input type="hidden" name="userName" value="' . $username . '" />';
        
        
           echo "        
           <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
           <label for='uID'>User Name:</label>
           <input class='mdl-textfield__input' type='text' name='uID' id='uID' maxlength='50' value='$username' readonly>
           </div>
           
           <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
           <label for='password'>Password:</label>
           <input class='mdl-textfield__input' type='password' name='password' id='password' maxlength='50' required value='$password'; />
           </div>
           
<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
           <label for='name'>Name:</label>
           <input class='mdl-textfield__input' type='text' required name='name' id='name' maxlength='50' value='$name'; />
           </div>
           
<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
           <label for='address'>Address:</label>
           <input class='mdl-textfield__input' type='text'  required name='address' id='address' maxlength='50' value='$address'; />
           </div>


<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
           <label for='name'>City:</label>
           <input class='mdl-textfield__input' type='text' name='city' required id='city' maxlength='50' value='$city' />
           </div>


<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
           <label for='state'>State:</label>
           <input class='mdl-textfield__input' type='text' name='state' required id='state' maxlength='50' value='$state'; />
           </div>
           
<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
           <label for='phone'>Phone:</label>
           <input class='mdl-textfield__input' type='text' name='phone' id='phone' required pattern='[0-9]{10}' value= '$phone'; />
           </div>
           
<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
           <label for='zipcode'>Zipcode:</label>
           <input class='mdl-textfield__input' type='text' name='zipcode' id='zipcode' pattern='[0-9]{5}' required value= '$zipcode'; />
           </div>

<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
           <label for='email'>E-mail:</label>
           <input class='mdl-textfield__input' type='text' required name='email' id='email' maxlength='50' value= '$email'; />
           </div>
           
<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
           <label for='creditCard'>Credit Card:</label>
           <input class='mdl-textfield__input' type='text' required name='creditCard' id='creditCard' pattern='[0-9]{16}' value= '$creditCard'; />
           </div>"
           
      ?>
      
      
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
  Update Profile
</button>
       
     
     
     </form>
                </div>
            </div>
</main>
</body>
</html>