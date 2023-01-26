<?php
include('dbh.php');
include('student_edit.php');

if(isset($_POST['student_delete'])){
    $student_id = $_POST['student_delete'];

    try{
        $query = "DELETE FROM sdetails WHERE id=id";
        $statement =$databaseConnection-> repare($query);
        $data =[
            ':id' =>$id
        ];
        $statement->execute($data);

        $query_execute = $statement->execute($data);

        if($query_execute){
            header('Location:index.php');
        }else{

        }
    }catch(PDOException $err){
        echo $err->getMessage();
    }
}
?>
