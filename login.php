<?php 

    session_start();
    require_once ("connect.php");

    $connection = @new mysqli($db_host,$db_user_name,$db_password,$db_name); 

    if($connection->connect_errno!=0){
         
        echo "Error".$connection->connect_errno;
        
    }
    else
    {
        $sql="SELECT * FROM users WHERE login='%s'";

        $login = htmlentities($_POST['login'],ENT_QUOTES,"UTF-8");
        $password=$_POST['password'];
        if($results_of_sql= @$connection->query(
            sprintf($sql,mysqli_real_escape_string($connection,$login)))){

            $number_of_recived_users = $results_of_sql->num_rows;

            if($number_of_recived_users>0){

                $row = $results_of_sql->fetch_assoc();

                if(password_verify($password,$row['pswd'])){

                    $_SESSION['loged_in']=true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['login'] = $row['login'];
                    
                    unset($_SESSION['wrong_login_pswd']);
                    
                    $results_of_sql->free_result();

                    header('Location: mainApp.php');
                } else {
                    $_SESSION['wrong_login_pswd']='<span style="color:red">Nieprawidłowy login lub hasło !</span>';
                    header('Location: logowanie.php');
                }
            }else{
                $_SESSION['wrong_login_pswd']='<span style="color:red">Nieprawidłowy login lub hasło !</span>';
                header('Location: logowanie.php');
            }    
        }
        $connection->close(); 
    }



?>