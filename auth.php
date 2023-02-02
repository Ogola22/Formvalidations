

<?php
session_start();
include ('dbh.php');
if(isset($_POST['username']) && isset($_POST['pswd'])){
    $username = $_POST['username'];
    $pswd = $_POST['pswd'];

    if(empty($email)){
        header("Location: login.php?error=Email is required");
    }else if(empty($password)){
        header("Location: login.php?error=Password is required";)
    }else{
        $statement = $databaseConnection->prepare("SELECT * FROM login.php WHERE username=?");
        $statement->execute([$username]);

        if($statement->rowCount()===1){
            $user = $statement->fetch();

            $userId = $user['id'];
            $userEmail = $user['username'];
            $userPassword = $user['pswd'];
            //$userFullname = $user['Fullname'];


            if($username === $userEmail){
                if($pswd === $userPassword){
                    $_SESSION['id']= $userId;
                    header("Location: signuptb.php");
                }else{
                    header("Location: login.php?error=Incorrect Username or Password");
                }}else{
                  header("Location: login.php?error=Incorrect Username or Password");
                }
        }else{
            header("Location: login.php?error=Incorrect Username or Password");
        }
    }
}
?>