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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pl.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
		
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

			<form id="contact" method ="post" action="mailto:wertalus@gmail.com" style="width:550px; margin-top:50px" class="w3-container w3-display-middle w3-round-large w3-card-4 w3-light-grey w3-text-indigo">
				
				<div style="height:100px;" class="w3-container w3-padding w3-card-2 w3-white w3-round-large w3-margin-top">	
					<div style="display:inline"><img src="img_avatar3.png" style="width:95px; height:80px" class="w3-padding w3-circle"></div>
					<div style="display:inline;"> 
							<p style="display:inline; margin-left: 80px; font-size:20px; color:red;">Formularz kontaktowy</p>
					</div>
				</div>

				<select name="subject" class="custom-select w3-margin-top">
						<option class="select" selected> Wybierz temat </option>
						<option class="problems"> Problemy techniczne </option>
						<option class="password">Resetowanie hasła</option>
						<option class="ideas">Propozycje usprawnień</option>
				</select>
					<div id="div_urlop" class="w3-container">			
						<div class="form-group w3-margin-top">
							<label for="comment">Wiadomość:</label>
							<textarea style="height:60px" class="form-control" rows="5" id="comment"></textarea>
						</div>
					</div>
				<button type="submit" id="submit_button"style="outline:0px" class="w3-button w3-card-4 w3-block w3-section w3-round-large w3-blue w3-ripple w3-padding ">Wyślij</button>				  
			</form>
			<footer class="w3-border w3-bottom">
				Autor: Daniel Pater : <a href="mailto:s182626@student.edu.pg.pl">s182626@student.edu.pg.pl</a>
			</footer>
	</div>	
</body>
</html> 