<?php

require_once('checkCookies.php');

if($_COOKIE['userRole'] == 'user'){
    header('Location: ./adminmenue.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/adduser-myorders-orders.css">
</head>
<body>

    <header>
        <div >
            <a href="#">Home</a> |
            <a href="#">Products</a> |
            <a href="#">Users</a> |
            <a href="#">Manual orders</a> |
            <a href="#">Checks</a> 
        </div>
        <div class="div1">
            <img src="images/51f6fb256629fc755b8870c801092942.png" alt="userimage">
            <a href="#">Admin</a>
        </div>
    </header>

    
    <div class="container">
        <h1 my-3>Add User</h1>
    </div>
    
    <div class="container">
    <form action="#" method="post">
        
            <div class="row my-3">
                <div class="col-lg-3 "><label for="name">Name :</label></div>
                <div class="col-lg-3"><input type="text" placeholder="enter you name" name="name" required></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Email :</label></div>
                <div class="col-lg-3"><input type="email" placeholder="enter you e-mail" name="email" required></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Password :</label></div>
                <div class="col-lg-3"><input type="password" placeholder="enter you password" name="password" required></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Confirm Password :</label></div>
                <div class="col-lg-3"><input type="password" placeholder="confirm your password" name="repassword" required ></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Room num :</label></div>
                <div class="col-lg-3"><input type="number" placeholder="enter room number" name="RoomNo" min="0" required ></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Ext :</label></div>
                <div class="col-lg-3"><input type="text" placeholder="enter extention" name="ext" required ></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Profile pic :</label></div>
                <div class="col-lg-3">    <input class="col-3" type="file" value="browse" name="image"></div>
            </div>
            <div class="row my-3 text-center ">
                <input class="col-2" type="submit" name="submit">
            </div>
        
    </form>
    </div>

    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/shebl.js.js"></script>
</body>
</html>
  <?php
include "connection.php";   

// $sql = mysqli_query($conn ,"select Name, Email, Password,RoomNo,Ext FROM systemuser") ;


if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $repass = mysqli_real_escape_string($conn, $_POST['repassword']);
    $RoomNo = mysqli_real_escape_string($conn, $_POST['RoomNo']);
    $Ext = mysqli_real_escape_string($conn, $_POST['ext']);
    $pass = Password_hash($password, PASSWORD_BCRYPT);
    $repass = Password_hash($repass, PASSWORD_BCRYPT);

    $emailquery = "select * from systemuser where email ='$email'";
    $query = mysqli_num_rows($conn,$emailquery);
    $emailcount = mysqli_num_rows($query);
    if($emailcount>0){
        echo "email already exists";
    }else{
        if($password === $repass){
            $insertquery = "insert into systemuser(Name, Email, Password,RoomNo, Ext) VALUES ('$name','$email','$password','$RoomNo','$Ext')";
        }
    }
    ;

// }
//     if(empty($_POST['name'])){
//     echo "Please Enter your name";
//     return false;
//     }if(empty($_POST['email'])){
//     echo "Please Enter your Email";
//     return false;
//     }if(empty($_POST['password'])){
//     echo "Please Enter your password";
//     return false;
//     }if(empty($_POST['RoomNo'])){
//     echo "Please Enter your Room no";
//     return false;
//     }if(empty($_POST['ext'])){
//     echo "Please Enter your Room no";
//     return false;
//     // }if (!$name_matches[0]){
//     //     $name_subject = $_POST['name'];
//     // $name_pattern = '/^[a-zA-Z ]*$/';
//     // $pattern=preg_match($name_pattern, $name_subject, $name_matches);
//     // echo "You must supply your name";
//     // return false;
//     }else{
//         echo"Form is recorded";
//         if(mysqli_query($conn ,"insert into systemuser (Name, Email, Password,RoomNo,Ext) VALUES ('$name' , '$email','$pass' ,'$RoomNo','$Ext')")){
//             echo 'sent to data base';
//         };

    }
 ?>

<script>
    $(".logout").click(function () {
            $.post('checkCookies.php',{
                cook: 'delete'
            },function(){
               window.location.replace("login.php");
            });
        })
        </script>

    
    
    
    
   
