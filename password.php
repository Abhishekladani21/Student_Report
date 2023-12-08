<?php
// Fixed username and password (replace these with your own values)
$fixedUsername = 'admin';
$fixedPassword = '123';

// Retrieve user input
$userInputUsername = $_POST['username'];
$userInputPassword = $_POST['password'];

// Check if the input matches the fixed username and password
if ($userInputUsername === $fixedUsername && $userInputPassword === $fixedPassword) {
    header('Location: index.php');
} else {
    // Failed login
    echo "<script>alert('Invalid username or password. Please try again.');
    </script>";     
}
echo "<script>window.location.href = 'login.php';</script>";
?>