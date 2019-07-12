<?php
session_start();
$name = "";
$location = "";
$update = false;
$id = 0;

require 'config/db.php';

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $conn->query("INSERT INTO data (name, location) VALUES('$name','$location')") or die($conn->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    
    header('location: index.php');
    exit();
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM data WHERE id=$id") or die($conn->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header('location: index.php');
    exit();
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM data WHERE id=$id") or die($conn->error());
    
    if($result->num_rows == 1 ){
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $location = $row['location'];
    }
}


if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];

    $conn->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($conn->error());
    
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    
    header('location: index.php');
    exit();
}