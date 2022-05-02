<?php
include("configuration.php");
// print_r($_POST);
$products = $_POST["products"];
$conn = new mysqli($servername, $db_username, $db_password, $default_db);
$conn->begin_transaction();

$id = "SELECT customer_id FROM `customer` WHERE account_id = ?";
$idStmt = $conn->prepare($id);
$idStmt->bind_param('i', $accountId);
$accountId = $_COOKIE["userId"];
// echo "accountid: " . $accountId;

$idStmt->bind_result($custId);
$idStmt->execute();
$idStmt->fetch();
// echo "custid: " . $custId;

# need to call fetch again even though there's only 1 result
# otherwise next $conn->prepare() will fail.
$idStmt->fetch();


$track = "INSERT INTO tracking (tracking_number) values (?)";
$trackStmt = $conn->prepare($track);
$rand = rand(1,999999);

$trackStmt->bind_param('s', $rand);
$trackStmt->execute();
$trackId = $trackStmt->insert_id;


$sql = "INSERT INTO order_info (product_id, customer_id, orderMethod_id, units_orders, tracking_id) VALUES (?,?, 3, 1, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $product, $custId, $trackId);

$prod = "SELECT product_name from product where product_id = ?";
$prodStmt = $conn->prepare($prod);
$prodStmt->bind_param('s', $product);
$prodStmt->bind_result($name);
//$prodStmt->execute();

$prodNames = [];

foreach ($products as $product) {
  $stmt->execute();
}

foreach ($products as $product) {
  $prodStmt->execute();
  while($prodStmt->fetch()) {
      array_push($prodNames, $name);
  }
}
print_r($prodNames);


// printf("%d row inserted.\n", $stmt->affected_rows);
$conn->commit();
session_start();
$_SESSION['flash_message'] = "Success! You have purchased ".implode(', ', $prodNames);
$conn->close();

header('location: .');