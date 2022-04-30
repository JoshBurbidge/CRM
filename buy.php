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

// $custSql = "INSERT INTO customer_order (customer_id) VALUES (?)";
// $custStmt = $conn->prepare($custSql);
// // print_r($custStmt);
// $custStmt->bind_param('s', $custId);
// $custStmt->execute();
// $orderId = $custStmt->insert_id;

$sql = "INSERT INTO order_info (product_id, customer_id, orderMethod_id, quantity) VALUES (?,?, 3, 1)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $product, $custId);

foreach ($products as $product) {
  $stmt->execute();
}

// printf("%d row inserted.\n", $stmt->affected_rows);
$conn->commit();
$conn->close();

header('location: shop.php');