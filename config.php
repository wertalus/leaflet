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
<html>
<head>

	<meta charset="UTF-8">
	<title>Projekt: Systemy informacji przestrzennej</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-ios.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

		<div class="w3-margin-top">
			<h2 style="text-align:center" class="w3-serif"><i>Panel sterowania</i></h2>
		</div>


		<div class="w3-container w3-border w3-margin-top">
			<div style="margin-top: 250px;" class="col-sm-10 w3-border w3-round-large w3-display-middle">

				<div type="button" style="text-align: center;" class="w3-hover-shadow w3-margin-top w3-margin-bottom w3-border w3-round-large nav-link" data-toggle="modal" data-target="#changePswd">
					Zmień hasło   
				</div>
				<?php	
					/*<div type="button" style="text-align: center;" class="w3-hover-shadow w3-margin-top w3-margin-bottom w3-border w3-round-large nav-link" data-toggle="modal" data-target="#changeAvatar">
						Zmień avatar
					</div>*/
				?>
			</div>
			<?php
				if(isset($_SESSION['wrong_pswd'])){
					echo "<p class='w3-center'".$_SESSION['wrong_pswd']."</p>";
					unset($_SESSION['wrong_pswd']);
				}
			?>
		</div>

		<!-- The Modal remove selected record -->
		<div class="modal" id="changePswd">
			<div class="modal-dialog">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						
						
							<div>
								<img src="img_avatar3.png" style="width:60px;margin-top:5px" class="w3-circle">
							</div>
							<div class="w3-border">
								<button style="margin-right:10px;margin-top: 10px;" type="button" class="w3-display-topright close" data-dismiss="modal">&times;</button>
							</div>
						
						<div class="w3-row" style="margin-top: 50px; margin-right: 90px;">
							<h4 class="modal-title">Zmiana hasła</h4>
						</div>
						<hr>
						
					</div>

					<!-- Modal body -->
					<form action="password.php" method="post" >
						<div class="modal-body">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<p class="input-group-text" style="height:30px; width:170px">Wpisz obecne hasło</p>
								</div>
								<input type="password" name="oldPswd" id="oldPswd" class="form-control form-control-sm" ></input>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<p class="input-group-text" style="height:30px; width:170px">Wpisz nowe hasło</p>
								</div>
								<input type="password" name="newPswd1" id="newPswd1" class="form-control form-control-sm" ></input>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<p class="input-group-text" style="height:30px; width:170px">Potwierdź nowe hasło</p>
								</div>
								<input type="password" name="newPswd2" id="newPswd2" class="form-control form-control-sm" ></input>
							</div>
						</div>
						<!-- Modal footer -->
						<div class="modal-footer">
							<button id="pass_change" type="submit" class="btn btn-danger">Zmień</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html> 
​

