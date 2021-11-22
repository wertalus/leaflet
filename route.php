<?php
    session_start();
    if(!isset($_SESSION['loged_in'])){
        $_SESSION['anonymous']='<span style="color:red">Musisz się zalogować !</span>';
        header('Location: index.php');
        exit();
    }
    if((isset($_SESSION['loged_in']))&& ($_SESSION['loged_in']==true)){ 
        $login_logut = 'logout.php';
    } else $login_logut = 'logowanie.php';
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="UTF-8">
	<title>Projekt: Systemy informacji przestrzennej</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
    

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@0.7.7/dist/leaflet-src.js"></script>
    <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-map.js?key=zviu6aGFhuQKQzFgYjoHUO3DUXVPEGlO"></script>
    <script src="https://www.mapquestapi.com/sdk/leaflet/v2.2/mq-routing.js?key=zviu6aGFhuQKQzFgYjoHUO3DUXVPEGlO"></script>
   

    <style>
        #map {height:700px; width:100%}
    </style>
</head>
<body>
<div class="w3-container">
    <header>
        <div  class="w3-bar w3-card-4 w3-padding-16 w3-margin-top">
            <div class="w3-cell-row">
                <div class="w3-container w3-cell" style="width:10%">
                    <a href="index.php" class="w3-bar-item w3-left w3-button w3-hover-white w3-round w3-hover-shadow  w3-large"><i class="fa fa-home"></i></a>
                </div>
                <div style="width:2%" class="w3-container w3-cell"><img style="width:60px; height:60px" src="img_avatar3.png" class="w3-circle"></div>
                <div class="w3-container w3-cell" style="width:10%;text-align: center;">
                    <?php
                        session_start();
                        echo "<center class='w3-margin-top'>";
                        echo "Witaj ".$_SESSION['login']." !";
                        echo "</center>";
                    ?>	
                </div>
                <div class="w3-container w3-cell" style="width:80%;text-align: center;">
                    <img src="img/logo2.png" style="width: 50px; height:50px;margin-right: 50px; "><h3 style='vertical-align:middle; display:inline;'>Projekt z przedmiotu : Systemy informacji przestrzennej</h3></img>
                </div>
                <div class="w3-container w3-cell"style="width:5%">
                    <a href="config.php" class="w3-bar-item w3-button w3-hover-white w3-round w3-hover-shadow w3-right w3-large"><i class="fa fa-cog"></i></a>
                </div>
                <div class="w3-container w3-cell"style="width:5%">
                    <a href="email.php" class="w3-bar-item w3-button w3-hover-white w3-round w3-hover-shadow w3-right w3-large"><i class="fa fa-envelope"></i></a>
                </div>
                <div class="w3-container w3-cell" style="width:5%">
                    <a href="<?= $login_logut ?>" class="w3-bar-item w3-button w3-hover-white w3-round w3-hover-shadow w3-right w3-large">
                    <i class="fa fa-sign-in"></i></a>
                </div>			 
            </div>
        </div>
    </header>

    <div class="w3-container" style="vertical-align:middle; display: inline"> 
        <span style="font-size: 24px;">Wyszukaj trasę :</span>
        <input style="width: 300px; height: 40px;" id="startPoint" type="text" class="w3-round w3-margin-left w3-border w3-hover-shadow w3-hover-shadow" placeholder="Z"></input>
        <input style="width: 300px; height: 40px;" id="endPoint" type="text" class="w3-round w3-margin-left w3-border w3-hover-shadow w3-hover-shadow" placeholder="Do"></input>
        <button style="background-color: transparent;width: 300px; height: 40px;" id="search2" class="w3-round w3-margin-left w3-border w3-hover-shadow w3-hover-shadow">Wyszukaj trasę</button>
    </div>

    <div id="map"></div>
    <footer class="w3-border w3-bottom">
        Autor: Daniel Pater : <a href="mailto:s182626@student.edu.pg.pl">s182626@student.edu.pg.pl</a>
    </footer>
</div>

<script src="main2.js"></script>

</body>
</html>

​


​

