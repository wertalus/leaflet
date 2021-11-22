<?php 
	session_start();

	$registration_form = false;

	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$login=$_POST['login'];
	$password=$_POST['password_1'];
	$password_2=$_POST['password_2'];
	$email=$_POST['email'];

	if(strlen($name)>0 && strlen($surname)>0 && strlen($login)>0 && strlen($password)>0 && strlen($password_2) && strlen($email)>0){
		$registration_form = true;
		unset($_SESSION['missing_details']);

		if(strlen($login)<3 || strlen($login)>20){
			$registration_form = false;
			$_SESSION['e_login'] = '<span style="color:red">Login musi być od 4 do 19 znaków !</span>';
		}

		if($password != $password_2){
			$registration_form = false;
			$_SESSION['e_pswd']='<span style="color:red">Podaj poprawnie oba hasła !</span>';
		}

		$email_sanatize = filter_var($email, FILTER_SANITIZE_EMAIL);

		if((filter_var($email_sanatize,FILTER_VALIDATE_EMAIL)==false) || ($email_sanatize != $email)){
			$registration_form = false;
			$_SESSION['e_email']='<span style="color:red">Podaj poprawnie adres email !</span>';
		}

		if($registration_form==true){
			require_once "connect.php";
			mysqli_report(MYSQLI_REPORT_STRICT);

			try {
				$connection = new mysqli($db_host,$db_user_name,$db_password,$db_name);	

				if($connection->connect_errno!=0){
         
					throw new Exception(mysqli_connect_errno());
	
				}else{
					
					$sql_check="SELECT ID FROM users WHERE email='$email'";
					
					$sql_check_values = $connection->query($sql_check);

					if(!$sql_check_values) throw new Exception($connection->error);

					$num_of_results = $sql_check_values->num_rows;

					if($num_of_results>0){

						$registration_form=false;
						$_SESSION['e_email'] = '<span style="color:red">Konto o tym adresie email istnieje !</span>';
						header('Location: registration.php');
					}

					$sql_check="SELECT ID FROM users WHERE login='$login'";
					
					$sql_check_values = $connection->query($sql_check);

					if(!$sql_check_values) throw new Exception($connection->error);

					$num_of_results = $sql_check_values->num_rows;

					if($num_of_results>0){

						$registration_form=false;
						$_SESSION['e_login'] = '<span style="color:red">Konto o tym loginie istnieje. Wybierz inny login !</span>';
						header('Location: registration.php');
					}
						$password_hash = password_hash($password, PASSWORD_DEFAULT);
				
						$sql="INSERT INTO users VALUES (NULL,'$name','$surname','$login','$password_hash','$email')";

						if($connection->query($sql)){

							$_SESSION['registration_ok'] ='<span style="color:red">Rejestracja przeszła pomyślnie mozesz się zalogować !</span>';
							header('Location: index.php');
						}else{

							throw new Exception($connection->error);
						}
					$connection->close();
				}
			} catch (Exception $e) {

				echo '<span style="color:red">Przepraszamy cos poszło nie tak !</span>';
				echo '<br> Informacja developerska :'.$e;

			}
		}else header('Location: registration.php');

	}else{

		$_SESSION['missing_details']='<span style="color:red">Uzupełnij wszystkie pola !</span>';
		header('Location: registration.php');

	}


?>

