<?php
include '../dbconfig.php';

if (isset($_POST['add_dept'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    if (empty($id) || empty($name)) {
        echo "<script>alert('Please fill all fields')</script>";
        echo "<script>window.location.href='../department.php'</script>";
        exit;
    }

    $check_query = "SELECT * FROM department WHERE id = '$id'";
    $check_result = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Department ID already exists')</script>";
        echo "<script>window.location.href='../department.php'</script>";
        exit;
    }

    $query = "INSERT INTO department (id, name) VALUES ('$id', '$name')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>alert('Department added successfully')</script>";
        echo "<script>window.location.href='../department.php'</script>";
    } else {
        echo "<script>alert('Failed to add department: " . mysqli_error($connection) . "')</script>";
        echo "<script>window.location.href='../department.php'</script>";
    }
}

mysqli_close($connection);