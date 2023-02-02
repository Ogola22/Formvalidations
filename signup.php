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
if(isset($_POST['save'])){
    
    //checking for email validation
    if(empty($_POST['Email'])){
        $errors['Email']='Email cannot be empty<br/>';
    }else{
        $Email=$_POST['Email'];
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            $errors['Email']='email must be a valid address';
        }
    }
    //checking for password validation
    if(empty($_POST['Paswd'])){
        $errors['Paswd']='Password cannot be empty<br/>';
    }else{
        $Paswd=$_POST['Paswd'];
        $uppercase = preg_match('@[A-Z]@', $Paswd);
$lowercase = preg_match('@[a-z]@', $Paswd);
$number    = preg_match('@[0-9]@', $Paswd);
$specialChars = preg_match('@[^\w]@', $Paswd);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($Paswd) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}else{
    echo 'Strong password.';
}
    }
    if(array_filter($errors)){
        //echo 'there are errors in the form';
    }else{
        //echo 'no errors in the form';
        /*$statement = $databaseConnection ->prepare(
            "INSERT INTO sample(firstname, lastname, email, course)
            VALUES ($firstname, $lastname, $email, $course)");
            $statement ->execute();*/
            try
            {
                $query = "INSERT INTO signupth (Email, Paswd) VALUES (:email,:password)";
                $query_run = $databaseConnection ->prepare($query);
                $data = [
                    ':email' => $Email,
                    ':password' => $Paswd,
                ];
                $query_execute = $query_run-> execute($data);
                if($query_execute){
                    echo '<script> alert("Data added Successfully")</script>';
                }else{
                    echo '<script> alert("Data NOT added Successfully")</script>';
                }
            }catch(PDOException $err){
                echo $err->getmessage();
            }
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
                 value="<?php echo $Email?>"><br>
                 <div class='text-danger'><?php echo $errors['Email']?>
                </div>

              </div>     
              <div class="form-group">
                 <label>Password</label><br>
                 <input type="password"  placeholder=" Enter password" name="password" class="form-control"
                 value="<?php echo $Paswd?>"><br>
                 <div class='text-danger'><?php echo $errors['Paswd']?></div>

              </div>
              <button name="save" class="btn btn-primary">Sign up</button>
      </form>
</div>
</body>
<?php include("footer.php")?>
</html>