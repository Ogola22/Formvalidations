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
$firstname=$lastname=$email=$course='';
$errors=array('firstname'=>'','lastname'=>'','email'=>'','course'=>'');
if(isset($_POST['save'])){
    //checking for firstname validation
    if(empty($_POST['firstname'])){
        $errors['firstname']='firstname cannot be empty<br/>';
    }else{
        $firstname=$_POST['firstname'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$firstname)){
            $errors['firstname']='firstname must be letters and spaces only';
        }

    }
     //checking for lastname validation
     if(empty($_POST['lastname'])){
        $errors['lastname'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ]='lastname cannot be empty<br/>';
    }else{
        $lastname=$_POST['lastname'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$lastname)){
            $errors['lastname']='lastname must be letters and spaces only';
        }

    }
     //checking for course validation
     if(empty($_POST['course'])){
        $errors['course']='coursename cannot be empty<br/>';
    }else{
        $course=$_POST['course'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$course)){
            $errors['course']='course must be letters and spaces only';
        }

    }
     //checking for email validation
     if(empty($_POST['email'])){
        $errors['email']='email cannot be empty<br/>';
    }else{
        $email=$_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email']='email must be a valid address';
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
        try
        {
            $query = "INSERT INTO sdetails(firstname, lastname, email, course) VALUES(:firstname, :lastname, :email, :course)";
            $query_run = $databaseConnection -> prepare($query);
            $data =[
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":email" => $email,
                ":course" => $course,
            ];
            $query_execute = $query_run -> execute($data);
            if($query_execute){
                echo '<script> alert("Data added successfully")</script>';
            }else{
                echo '<script> alert("Data NOT added")</script>';
            }
            
        }catch(PDOException $err){
            echo $err -> getMessage();
        }
    
    }
}
?>
<body>
    <div class="col-md-4 offset-md-4 flex-fill">
        <h5 style="color: blue; margin-top: 30px; ">Enter Details</h5>
      <form action="index.php" method="POST">
         
              <div class="form-group">
                 <label>Firstname</label><br>
                 <input type="text" placeholder=" enter firstname" name="firstname" class="form-control"
                 value="<?php echo htmlspecialchars($firstname);?>"><br>
                 <div class='text-danger'><?php echo $errors['firstname']?></div>

              </div>     
              <div class="form-group">
                 <label>Lastname</label><br>
                 <input type="text"  placeholder=" enter lastname" name="lastname" class="form-control"
                 value="<?php echo $lastname?>"><br>
                 <div class='text-danger'><?php echo $errors['lastname']?></div>

              </div>
              <div class="form-group">
                 <label>Email</label><br>
                 <input type="text" placeholder=" enter your email here " name="email"  class="form-control"
                 value="<?php echo $email?>"><br>
                 <div class='text-danger'><?php echo $errors['email']?></div>
              </div>
              <div class="form-group">
                 <label>Course</label><br>
                 <input type="text"  placeholder=" enter firstname"name="course"  class="form-control"
                 value="<?php echo $course?>"><br>
                 <div class='text-danger'><?php echo $errors['course']?></div>
              </div>

              <button name="save" class="btn btn-primary">Save details</button>
      </form>
    </div>
</body>
<?php include("footer.php")?>
</html>
