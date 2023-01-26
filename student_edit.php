<?php
include('dbh.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap-4.6.2-dist/css/bootstrap.min.css">
</head>
<?php

if (isset($_GET['id'])){
    $student_id = $_GET['id'];

    $query = "SELECT * FROM sdetails WHERE id=:id LIMIT 1";
    $statement = $databaseConnection->prepare($query);
    $data = [':id' => $student_id];
    $statement->execute($data);

    $result = $statement->fetch(PDO::FETCH_ASSOC);
}
?>
<body>
<div class="col-md-4 offset-md-4">
<h5 class="headings">Enter student details</h5>
<form action="crud.php" method="POST">
    <input type="hidden" name="student_id" value="<?=$result['id'];?>">

    <div class="form-group">
        <input type="text" name="firstname" placeholder="Enter firstname" class="form-control" value="<?=$result['firstname']; ?>">
        
        </div>

        <div class="form-group">
        <input type="text" name="lastname" placeholder="Enter lastname" class="form-control" value="<?=$result['lastname']; ?>">
        
        </div>

        <div class="form-group">
        <input type="text" name="email" placeholder="Enter email" class="form-control" value="<?=$result['email']; ?>">
        
        </div>

        <div class="form-group">
        <input type="text" name="course" placeholder="Enter course" class="form-control" value="<?=$result['course']; ?>">
   
        </div>
        <button name="update_student" class="btn btn-primary">Update Details</button>
    </form>
    </div>
</body>
</html>