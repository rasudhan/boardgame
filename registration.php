<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
    <title>117 - Registration</title>
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
            
        </header>

        <main class="mdl-layout__content">
            <div class="mdl-grid portfolio-max-width portfolio-contact">
                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Register a new user</h2>
                    </div>

                    <div class="mdl-card__supporting-text">
                        <p>
                            Enter your details below to create a new account
                        </p>

                        <form action="addUser.php" class="" method="POST">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" pattern="[A-Z,a-z,]*" type="text" name="Username" required>
                                <label class="mdl-textfield__label" for="Name">User Name...</label>
                                <span class="mdl-textfield__error">Letters only</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" name="Password" required>
                                <label class="mdl-textfield__label" for="password">Password...</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" pattern="[A-Z,a-z, ]*" type="text" name="Name" required>
                                <label class="mdl-textfield__label" for="Name">Name...</label>
                                <span class="mdl-textfield__error">Letters and spaces only</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
                                <input class="mdl-textfield__input" type="text" name="address">
                                <label class="mdl-textfield__label" for="Email">Street Address...</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" >
                                <input class="mdl-textfield__input" type="text" name="City" required>
                                <label class="mdl-textfield__label" for="Email">City...</label>

                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" required>
                                <input class="mdl-textfield__input" type="text" name="State" required>
                                <label class="mdl-textfield__label" for="Email">State...</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="Zipcode" pattern="[0-9]{5}" required>
                                <label class="mdl-textfield__label" for="zipcode">Zip code...</label>
                                <span class="mdl-textfield__error">5 digits only</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="Phone" pattern="[0-9]{10}" required>
                                <label class="mdl-textfield__label" for="Email">Mobile Phone...</label>
                                <span class="mdl-textfield__error">10 digits only</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                <label class="mdl-textfield__label" for="Email">Email...</label>
                                <span class="mdl-textfield__error">Use correct email format (Ex: user@example.com)</span>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" required name="Creditcard" pattern="[0-9]{16}">
                                <label class="mdl-textfield__label" for="cc">Credit Card...</label>
                                <span class="mdl-textfield__error">16 digits only</span>
                            </div>

                            <p>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">
                                    Register
                                </button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            
        </main>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>

</html>

