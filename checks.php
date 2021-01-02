<!DOCTYPE html>
<html>

<head>
    <title>Checks</title>
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
    <script>
        // view and hide
        $(function () {
            $('tr.parent td span.btn')
                .on("click", function () {
                    var idOfParent = $(this).parents('tr').attr('id');
                    $('tr.child-' + idOfParent).toggle('fast');
                });
            $('tr[class^=child-]').hide().children('td');
            
        });

    

        // add and minus
        // $(function () {
        //     $('tr.parent td span.btn')
        //         .on("click", function () {
        //             var idOfParent = $(this).parents('tr').attr('id');
        //             $('tr.child-' + idOfParent).toggle('fast');
        //         });
        //     $('tr[class^=child-]').hide().children('td');
        // });

    </script>

</head>

<body>
    <!-- nav -->
    <nav class="nav nav-tabs" style="background-color: rgba(42, 41, 41, 0.762);width: 100%;">
    <a href="AdminOrders.php" class="nav-item nav-link "  style="color: #fbb448;">Home</a>
    <a href="Viewproducts.php" class="nav-item nav-link "  style="color: #fbb448;">Products</a>
        <a href="allusers.php" class="nav-item nav-link "  style="color: #fbb448;">Users</a>
        <a href="adminmenue.php" class="nav-item nav-link  "  style="color: #fbb448;">Manual Order</a>
        <a href="checks.php" class="nav-item nav-link active"style="color: #fbb448;" >Checks</a>
        <!-- <a href="#" class="nav-item nav-link " style="float: right;"><img src="" > Admin</a> -->
    </nav>
    <div class="container-fluid d-block py-4" style="text-align: center;">
        <h1 class="cursive-font" style='font-family: "Kaushan Script", cursive !important; color:#fbb448 ;'>
            <img src=logo_size.jpg> Checks <img src=logo_size.jpg>
        </h1>
    </div>

<?php
$dsn="mysql:dbname=cafetria;dbhost=127.0.0.1;dbport=3306";
Define("DB_USER","root");
Define("DB_PASS","");
$db= new PDO($dsn,DB_USER,DB_PASS);
if($db){

    // echo "connected";
    $selQry="select *from systemuser ";
  
    $stmt=$db->prepare($selQry);
    $res=$stmt->execute();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
              
  echo     "<form  action='checks.php' method='POST' enctype='multipart/form-data'>
  <table class='col-8' style='left: 20%;'> 
        <tr>
      <td>
          <h4 style='display: inline-block;'>From :</h4>
      </td>
      <td>
          <input type='date' name='from'>
      </td>
      <td>
          <h4 style='display: inline-block;'>To :</h4>
      </td>
      <td>
          <input type='date' name='to'>
      </td>
  </tr>
 <tr>
      <td>
          <h4 style='display: inline-block;'>Users :</h4>
      </td> <td><select style='width: 45.5%;' name ='user'>
      <option>All users</optionn>
     
      ";
            
      
      foreach($rows as $row){
      
                
                    
       echo "<option >".$row['Name']."</option>";
      }

                   
                
      
  echo"</select></td><td>
  <button type='submit' name='submit'>submit</button></td></tr></table></form>";
}
if (isset($_POST["submit"]))
{$user=$_POST["user"];
$from=$_POST["from"];
$to=$_POST["to"];}
?>
 


 
<?php

// $dsn="mysql:dbname=cafetria;dbhost=127.0.0.1;dbport=3306";
// Define("DB_USER","root");
// Define("DB_PASS","");
// $db= new PDO($dsn,DB_USER,DB_PASS);
if (isset($_POST["submit"])){
if($db){
    if($user=='All users'){
        $selQr="SELECT`order-product`.Quantity ,products.price ,products.Pname,Orders.OrderDate,systemuser.Name from `order-product`, products, Orders,systemuser WHERE Orders.OID=`order-product`.OID and `order-product`.PID=products.PID and Orders.UserId=systemuser.UID and OrderDate between '$from' and '$to'";
        
        $stmt=$db->prepare($selQr);
        $res=$stmt->execute();
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach ($rows as $row){ 
                echo " <table class='table col-6' style='text-align: left ;left: 25%; margin-top: 2%;'>
                <tbody>
                    <tr style='background-color: rgba(42, 41, 41, 0.762); color: #fbb448; text-align: center;'>
                        <td style='width: 60%;'>
                            <h4>Name</h4>
                        </td>
                        <td style='width:40% ;'>
                            <h4>Total Amount</h4>
                        </td>
                    </tr>
                    <tr class='parent' id='1'>
                   
                <td ><span class='btn btn-default'>+</span>".$row['Name']." </td> 
                <td style='text-align: center;'><span class='btn btn-default'>+</span>".$row['Quantity']."</td>
             
               </tr>
               <tr class='child-1'>
                <table class='table col-5' style='text-align: left ;left: 30%; margin-top: 2%;'>
                <tr class='child-1'  style='background-color: rgba(42, 41, 41, 0.762); color: #fbb448; text-align: center;'>
                   <td>Order Date</td>
                   <td>Amount</td>
               </tr>
              <tr class='child-1'>
                   <td>".$row['OrderDate']."</td>
                   <td>".$row['price']."</td>
              
           
           ";
                       
               
              }
         echo " </tr></table></tr></tbody></table>";
        
        
            
        


    }
else{
    
$selQr="SELECT`order-product`.Quantity ,products.price ,Orders.OrderDate from `order-product`, products, Orders,systemuser WHERE Name='$user'and Orders.OID=`order-product`.OID and `order-product`.PID=products.PID and Orders.UserId=systemuser.UID and OrderDate between '$from' and '$to' ";

$stmt=$db->prepare($selQr);
$res=$stmt->execute();
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($rows as $row){ 
        echo " <table class='table col-6' style='text-align: left ;left: 25%; margin-top: 2%;'>
        <tbody>
            <tr style='background-color: rgba(42, 41, 41, 0.762); color: #fbb448; text-align: center;'>
                <td style='width: 60%;'>
                    <h4>Name</h4>
                </td>
                <td style='width:40% ;'>
                    <h4>Total Amount</h4>
                </td>
            </tr>
            <tr class='parent' id='1'>
           
        <td ><span class='btn btn-default'>+</span>".$user." </td> 
        <td style='text-align: center;'><span class='btn btn-default'>+</span>".$row['Quantity']."</td>
     
       </tr>
       <tr class='child-1'>
        <table class='table col-5' style='text-align: left ;left: 30%; margin-top: 2%;'>
        <tr class='child-1'  style='background-color: rgba(42, 41, 41, 0.762); color: #fbb448; text-align: center;'>
           <td>Order Date</td>
           <td>Amount</td>
       </tr>
      <tr class='child-1'>
           <td>".$row['OrderDate']."</td>
           <td>".$row['price']."</td>
      
   
   ";
               
       
      }
 echo " </tr></table></tr></tbody></table>";

}


 


    

    }
}

 ?>

