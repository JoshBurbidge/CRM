<?php
include_once("configuration.php");

$username = $_POST["username"];
$password = $_POST["password"];

$db = new mysqli($servername, $db_username, $db_password, $default_db);
$sql = "SELECT * FROM account_login WHERE username = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->bind_result($id, $cust, $email, $user, $pass);

$stmt->execute();
// $stmt->fetch();
// echo "fetch: " . $id;

if ($stmt->fetch()) {
  // username already taken
  
  header("location: register.php"); // redirect
} else {
  // no user found - create account
  echo "creating account";
  $insert = "INSERT INTO account_login (username, `password`) VALUES (?, ?)";
  $insert_stmt = $db->prepare($insert);
  $insert_stmt->bind_param('ss', $username, $password);
  $stmt->bind_result($id, $cust, $email, $user, $pass);

  $insert_stmt->execute();

  // echo "rows: " . $insert_stmt->affected_rows;
  // log in user and go to homepage
  setcookie("userId", $insert_stmt->insert_id);
  header("location: ."); // redirect
}

?>