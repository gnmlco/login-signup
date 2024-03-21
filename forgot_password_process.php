<?php
session_start();

include 'connect.php';

$new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
$email = $_SESSION['email'];

$sql = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
if ($conn->query($sql) === TRUE) {
   echo "Password updated successfully.";

   unset($_SESSION['email']);
} else {
   echo "Error updating password: " . $conn->error;
}

$conn->close();
