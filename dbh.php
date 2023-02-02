<?php
//database connection using PDO
$host='localhost';
$database='students';
$username='root';
$password='';

$dsn="mysql:host=$host;dbname=$database;";
try {
    $databaseConnection=new PDO($dsn,$username,$password);
    $databaseConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo'<script> alert("connection to the database has  been successful")</script>';
    

}catch (PDOException $err) {
    echo 'database FAILED to connect'.$err->getMessage();
}
?>