<?php 
	session_start();
?>
<!DOCTYPE html>
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
	
</head>

<body>

<div class="w3-container">
	<header>
		<div class="w3-bar w3-card-4 w3-padding-16 w3-margin-top">
			<div class="w3-cell-row">
				<div class="w3-container w3-cell" style="width:10%">
					<a href="index.php" class="w3-bar-item w3-left w3-button w3-hover-white w3-round w3-hover-shadow  w3-large"><i class="fa fa-home"></i></a>
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
					<a href="logowanie.php" class="w3-bar-item w3-button w3-hover-white w3-round w3-hover-shadow w3-right w3-large">
					<i class="fa fa-sign-in"></i></a>
				</div>			 
			</div>
		</div>
	</header>
	<div class="w3container">
		<form action="login.php" method="post" style="width:300px" class="w3-container w3-display-middle w3-round-large w3-card-4 w3-light-grey w3-text-indigo">
			
			<div class="w3-row w3-section">
			  <div class="w3-col w3-center" style="width:50px"><img src="img_avatar3.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"></div>
				<div class="w3-rest">
					<h2 class="w3-center w3-margin-left w3-margin-top ">Logowanie</h2>
				</div>
			</div>

				  <input style="outline:0px" onfocus="this.placeholder=''" onblur="this.placeholder = 'Login'" class="w3-input w3-border w3-round w3-card-4" name="login" type="text" placeholder="Login">

				  <input style="outline:0px" onfocus="this.placeholder=''" onblur="this.placeholder = 'Hasło'" class="w3-input w3-border w3-round w3-card-4 w3-margin-top" name="password" type="password" placeholder="Hasło">

				  <button type="submit" class="w3-button w3-card-4 w3-block w3-section w3-round-large w3-blue w3-ripple w3-padding ">Zaloguj</button>
				  
				  <?php 
					if(isset($_SESSION['wrong_login_pswd'])) echo "<p class='w3-center'".$_SESSION['wrong_login_pswd']."</p>";
				  ?>
		</form>


	</div>
		<footer class="w3-border w3-bottom">
			Autor: Daniel Pater : <a href="mailto:s182626@student.edu.pg.pl">s182626@student.edu.pg.pl</a>
		</footer>
</div>
</body>
</html> 