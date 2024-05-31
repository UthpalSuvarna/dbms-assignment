<?php
session_start();
include '../dbconfig.php';

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE name='$name' AND password='$password'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query Failed');
    } else {
        $row = mysqli_num_rows($result);
        if ($row == 1) {
            $_SESSION['name'] = $name;
            header('location:../department.php');
        } else {
            header('location:../login.php?message=Invalid login');
        }
    }
}