<?php

include 'db.php';


if(isset($_POST['insert'])){
    
    $name  = clean($_POST['name']);
    $phone = clean($_POST['phone']);
    $email = clean($_POST['email']);
    
    $query = "INSERT INTO `student` (name,phone,email) VALUES ('".escape($name)."','".escape($phone)."','".escape($email)."') ";
    
    $result = mysqli_query($conn,$query);
    
    if($result){
        
        header('location:../index.php');
    }
    
}


?>