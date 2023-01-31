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
$Email=$Paswd='';
$errors=array('Email'=>'','Paswd'=>'');
if(isset($_POST['sign'])){
    //checking for username validation
    if(empty($_POST['Email'])){
        $errors['Email']='Email cannot be empty<br/>';
    }else{
        $Email=$_POST['Email'];
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            $errors['Email']='Email must be a valid address';
        }

    }
     //checking for password validation
     if(empty($_POST['Paswd'])){
        $errors['password'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ]='lastname cannot be empty<br/>';
    }else{
        $Paswd=$_POST['Paswd'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$Paswd)){
            $errors['password']='password must be letters and spaces only';
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
            $query = "INSERT INTO signuptb(Email, Paswd) VALUES(:Email, :Paswd);";
            $query_run = $databaseConnection -> prepare($query);
            $data =[
                ":Email" => $Email,
                ":Paswd" => password_hash($Paswd, PASSWORD_BCRYPT)
                
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
        <h5 style="color: blue; margin-top:80px;">SIGN UP here</h5>
      <form action="signup.php" method="POST">
         
              <div class="form-group">
                 <label>Username</label><br>
                 <input type="email" placeholder="Enter username" name="email" class="form-control"
                 value="<?php echo htmlspecialchars($Email);?>"><br>
                 <div class='text-danger'><?php echo $errors['Email']?>
                </div>

              </div>     
              <div class="form-group">
                 <label>Password</label><br>
                 <input type="password"  placeholder=" Enter password" name="password" class="form-control"
                 value="<?php echo $Paswd?>"><br>
                 <div class='text-danger'><?php echo $errors['Paswd']?></div>

              </div>
              <button name="sign" class="btn btn-primary">Sign up</button>
      </form>
</div>
</body>
<?php include("footer.php")?>
</html>