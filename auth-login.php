<?php
include_once("configuration.php");

$username = $_POST["username"];
$password = $_POST["password"];

$db = new mysqli($servername, $db_username, $db_password, $default_db);
$sql = "SELECT * FROM account_login WHERE username = ? AND password = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param('ss', $username, $password);
$stmt->bind_result($id, $user, $pass);

$stmt->execute();


// if false - error
// if null - no data (no user found)
// if true - user found
if ($stmt->fetch()) {
  // user found - set cookie and go to homepage
  setcookie("userId", $id);
  header("location: ."); // redirect
} else {
  // no user found - back to login
  header("location: login.php"); // redirect
}

?>