<?php
include("configuration.php");
//print_r($_POST);
$products = $_POST["products"];
$conn = new mysqli($servername, $db_username, $db_password, $default_db);
$conn->begin_transaction();

$custSql = "INSERT INTO customer_order (customer_id) VALUES (1)";
$custStmt = $conn->prepare($custSql);
$custStmt->execute();
$orderId = $custStmt->insert_id;

$sql = "INSERT INTO order_info (order_id, product_id) VALUES (?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $orderId, $product);

foreach ($products as $product) {
  $stmt->execute();
}

printf("%d row inserted.\n", $stmt->affected_rows);
$conn->commit();