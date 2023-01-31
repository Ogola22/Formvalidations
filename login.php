<?php include("dbh.php")?>
<?php include("header.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="./bootstrap-4.6.2-dist/css/bootstrap.min.css ">
   
</head>
<?php
$uaername=$pswd='';
$errors=array('username'=>'','pswd'=>'');
if(isset($_POST['save'])){
    //checking for username validation
    if(empty($_POST['username'])){
        $errors['username']='username cannot be empty<br/>';
    }else{
        $username=$_POST['username'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['username']='username must be a valid address';
        }

    }
     //checking for password validation
     if(empty($_POST['pswd'])){
        $errors['pswd'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ]='lastname cannot be empty<br/>';
    }else{
        $pswd=$_POST['pswd'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$pswd)){
            $errors['pswd']='password must be letters and spaces only';
        }

    }
    if(array_filter($errors)){
        //echo 'There are Errors in the form';
    }else{
        //echo 'No errors in the form';
        /*$statement = $databaseConnection ->prepare(
            "INSERT INTO details(firstname,lastname,email,course)
            VALUES($firstname,$lastname,$email,$course)");
            $statement ->execute();
        ) */
    }

try
        {
            $query = "INSERT INTO login(username, pswd) VALUES(:username, :pswd);";
            $query_run = $databaseConnection -> prepare($query);
            $data =[
                ":username" => $username,
                ":psswd" => password_hash($pswd, PASSWORD_BCRYPT)
                
            ];
            $query_execute = $query_run -> execute($data);
            if($query_execute){
                echo '<script> alert("Signup successful")</script>';
            }else{
                echo '<script> alert("Something went wrong, please try again..")</script>';
            }
            
        }catch(PDOException $err){
            echo $err -> getMessage();
        }
}
?>
<body>
<div class="col-md-4 offset-md-4">
        <h5 style="color: blue; margin-top:80px;">Login Here</h5>
      <form action="login.php" method="POST">
         
              <div class="form-group">
                 <label>Username</label><br>
                 <input type="email" placeholder="Enter username" name="email" class="form-control"
                 value="<?php echo htmlspecialchars($username);?>"><br>
                 <div class='text-danger'><?php echo $errors['username']?>
                </div>

              </div>     
              <div class="form-group">
                 <label>Password</label><br>
                 <input type="password"  placeholder=" Enter password" name="password" class="form-control"
                 value="<?php echo $pswd?>"><br>
                 <div class='text-danger'><?php echo $errors['pswd']?></div>

              </div>
              <button name="save" class="btn btn-primary">Login</button>
      </form>
</div>
</body>
<?php include("footer.php")?>
</html>