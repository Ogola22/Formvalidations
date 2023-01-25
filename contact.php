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
<body>
<div class="card col-md-4 offset-md-4">
        <h5 style="color: blue; margin-top:80px;">Get In Touch</h5>
      <form action="index.php" method="POST">
         
              <div class="form-group">
                 <label>Firstname</label><br>
                 <input type="email" placeholder="Enter first name" name="email" class="form-control">
              </div>     
              <div class="form-group">
                 <label>Last name</label><br>
                 <input type="password"  placeholder=" Enter last name" name="password" class="form-control">
              </div>
              <div class="form-group">
                 <label>Email</label><br>
                 <input type="password"  placeholder=" Enter email address" name="password" class="form-control">
              </div>
              <div class="btn justify-content-center">
                 <button name="save" class="btn btn-primary">Send message</button>
              </div>
      </form>
</div>
</body>
</body>
</html>