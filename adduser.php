<?php

require_once('checkCookies.php');

if($_COOKIE['userRole'] == 'user'){
    header('Location: ./adminmenue.php');
}



?>
<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   



    

    <style>
        body {
            /* min-height: 100vh; */
            /* background: rgba(0, 0, 0, 0.5);; */
            margin-right: 1%;
            font-family: "Kaushan Script", cursive !important;
            /* font-family: "Lato", Arial, sans-serif; */
            margin-bottom: 5%;
            height: fit-content;
        }

        .price {
            background-color: rgba(42, 41, 41, 0.762);
            display: flex;
            /* float: right; */
            left: 40%;
            width: fit-content;
            color: white;
            border-radius: 50%;
            border: #fbb448 2px solid;
            font-family: "Kaushan Script", cursive;
            font-weight: bold;
            text-align: center;
            padding: 5%;
        }

        .carousel-caption {
            display: flex;
            justify-content: center;
        }

        .cat {
            text-align: center;
            color: black;
            text-decoration: none;
        }

        .cat :hover {
            color: #fbb448;
            zoom: 95%;
        }

        .pic {
            width: 130px;
            height: 130px;
        }

        table {
            width: 100%;
        }

        .progress {
            height: 10px;
        }
    </style>


</head>

<body>
    <!-- nav -->
    <nav class="nav nav-tabs" style="background-color: rgba(42, 41, 41, 0.762);width: 100%;">
        <a href="index.php" class="nav-item nav-link "  style="color: #fbb448;">Home</a>
        <a href="allproducts.php" class="nav-item nav-link "  style="color: #fbb448;">Products</a>
        <a href="allusers.php" class="nav-item nav-link  active"  >Users</a>
        <a href="AdminOrders.php" class="nav-item nav-link "  style="color: #fbb448;">Manual Order</a>
        <a href="checks.php" class="nav-item nav-link " style="color: #fbb448;">Checks</a>
        <!-- <a href="#" class="nav-item nav-link " style="float: right;"><img src="" > Admin</a> -->
    </nav>
    <!-- header -->
    <div class="container-fluid d-block py-4" style="text-align: center;">
        <h1 class="cursive-font" style='font-family: "Kaushan Script", cursive !important; color:#fbb448 ;'>
            <img src=logo_size.jpg> Add User <img src=logo_size.jpg>
        </h1>
    </div>

    
    <div class="container-fluid d-inlie-block " >

    <form action="" name="form" method="POST" style="margin-left:37%;">
        
            <div class="row my-3">
                <div class="col-lg-3 "><label for="name">Name :</label></div>
                <div class="col-lg-3"><input type="text" placeholder="enter you name" name="name" value="<?php echo $_POST['name']; ?>" >
             
            </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Email :</label></div>
                <div class="col-lg-3"><input type="email" placeholder="enter you e-mail" name="email" value="<?php echo $_POST['email']; ?>"  ></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Password :</label></div>
                <div class="col-lg-3"><input type="password" placeholder="enter you password" name="Password" value="<?php echo $_POST['password']; ?>"  ></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Confirm Password :</label></div>
                <div class="col-lg-3"><input type="password" placeholder="confirm your password" name="repassword"  ></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Room No. :</label></div>
                <div class="col-lg-3"><input type="number" placeholder="enter room number" name="RoomNo" min="0"  ></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Ext :</label></div>
                <div class="col-lg-3"><input type="text" placeholder="enter extention" name="Ext"  ></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Profile pic :</label></div>
                <div class="col-lg-3">    <input class="col-3" type="file" value="browse" name="PicName"></div>
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

    
    
    
    
   
