<?php
session_start();

include 'connect.php';

$email = $_POST['email'];

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   $_SESSION['email'] = $email;
   header('Location: set_new_password.php');
} else {
   echo "Email not found";
}

$conn->close();
