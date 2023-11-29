<?php

require("conexionsql.php");
require("assets/js/funciones.php");


?>


<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="assets/style/dashboard.css">
    <link rel="stylesheet" href="assets/style/nav.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <title>Dashboard - Doggy</title>
</head>

<body>

    <?php
    include('nav.php');
    ?>

    <main>

        <div id="box1">
            <div id="box1_2">

                <span id="box1_2_span">
                    <p>Usuario</p>
                </span>
                <div id="box1_2_img">
                    <img id="box1_2_img_userlogo" src="../assets/img/user.png">
                </div>


            </div>

        </div>
        <div id="box2">
            <div id="box3">
                
            </div>
            <div id="box4">
                <div id="box4_1">
                    <div id="box4_1_1"></div>
                    <div id="box4_1_2"></div>
                    <div id="box4_1_3"></div>
                </div>
                <div id="box4_2">
                    <div id="box4_1_1"></div>
                    <div id="box4_1_2"></div>
                    <div id="box4_1_3"></div>
                </div>
            </div>
        </div>
        <div id="box5"></div>
        <div id="box6"></div>
        <div id="box7"></div>

    </main>




</body>