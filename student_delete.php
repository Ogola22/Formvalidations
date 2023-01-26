<?php
include('dbh.php');

if(isset($_POST['student_delete'])){
    $student_id = $_POST['student_delete'];

    try{
        $query = "DELETE FROM sdetails WHERE id=id";
        $statement =$databaseConnection->prepare($query);
        $data =[
            ':id' =>$$student_id
        ];
        $statement->execute($data);

        $query_execute = $statement->execute($data);

        if($query_execute){
            header('Location:students.php');
        }else{

        }
    }catch(PDOException $err){
        echo $err->getMessage();
    }
}
?>
