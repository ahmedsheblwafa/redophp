<?php require_once("config.php") ; 

?>
<?php


$productid = $_POST['productid'];
$productQuantity = $_POST['quantity'];

$selectquery = "INSERT INTO orders (OrderDate, Status, UserId) VALUES (now(),'pending',(SELECT UID FROM systemuser where Name='ahmed'))" ;
$statement = $db->prepare($selectquery);
$statement->execute();



for($i=0 ; $i<count($productid); $i++){
    $selectquery = "INSERT INTO `order-product` (OID, PID, Quantity) VALUES (LAST_INSERT_ID(),?, ?)" ;
$statement = $db->prepare($selectquery);
$statement->execute([$productid[$i],$productQuantity[$i]]);
}
header("Location: ./newuserhome.php"); 
// foreach ($_POST['myorders'] as $myorders){

//     $prouct->fillordertable();

// }
?>