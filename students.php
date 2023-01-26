<?php
include("dbh.php");
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>


    <div class="container">
        <h1 class="headings">All Students Details</h1>
        <table class="table table-hover table-bordered table sm" style="background-color: rgb(227, 242, 253, 0.7);">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Course</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
            $query = "SELECT * FROM sdetails";
            $statement = $databaseConnection ->prepare($query);
            $statement ->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                foreach($result as $row){
                    ?>
            <tr>
                <td><?=$row['firstname'];?></td>
                <td><?=$row['lastname'];?></td>
                <td><?=$row['email'];?></td>
                <td><?=$row['course'];?></td>
                <td>
                    <a href="student_edit.php?id=<?=$row['id']; ?>" class="btn btn-primary" name="Edit_students">Edit</a>
                </td>
                 <td> 
                    <form action="crud.php" method="POST">
                        <button value="<?=$row['id']; ?>" class="btn btn-danger btn-sm" name="student_delete">Delete</button>
                    </form>
                </td> 
            </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</body>
<?php include('footer.php');?>
</html>