<?php 

    session_start();
    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    $login=$_SESSION['login'];

    try {
        $connection = new mysqli($db_host,$db_user_name,$db_password,$db_name);	

        if($connection->connect_errno!=0){
 
            throw new Exception(mysqli_connect_errno());

        }else{

            $sql ="SELECT * FROM users WHERE login='$login'";

            $find_login = $connection->query($sql);

            if(!$find_login) throw new Exception($connection->error);

			$num_of_results = $find_login->num_rows;
            $row = $find_login->fetch_assoc();
            
            $ID= $row['ID'];

            if($num_of_results>0){
               
                $old_pswd = $_POST['oldPswd'];
                if(password_verify($old_pswd,$row['pswd'])){

                    $new_pswd1 = $_POST['newPswd1'];
                    $new_pswd2 = $_POST['newPswd2'];
                    
                    if($new_pswd1==$new_pswd2){
                        
                        $password_hash = password_hash($new_pswd1, PASSWORD_DEFAULT);
                        $sql_update = "UPDATE users SET pswd ='$password_hash' WHERE ID = '$ID'";
                        if($connection->query($sql_update)){
                            $_SESSION['wrong_pswd']='<span style="color:red">Hasło uaktualniono pomyślnie !</span>';
                            header('Location: config.php');
                        }else{

                            throw new Exception($connection->error);
                        }
                    
                    }else{
                        $_SESSION['wrong_pswd']='<span style="color:red">Nowe hasła nie pasują do siebie !</span>';
                        header('Location: config.php');
                    }
                    
                }else{

                    $_SESSION['wrong_pswd']='<span style="color:red">Stare hasło jest niepoprawne !</span>';
                    header('Location: config.php');
                }
            }
        }
    }catch (Exception $e){
        echo '<span style="color:red">Przepraszamy cos poszło nie tak !</span>';
        echo '<br> Informacja developerska :'.$e;
    }
?>
