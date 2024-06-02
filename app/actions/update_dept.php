<?php
include '../dbconfig.php';

if (isset($_POST['update_dept'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    if (empty($id) || empty($name)) {
        echo "<script>alert('Please fill all fields')</script>";
        echo "<script>window.location.href='../department.php'</script>";
        exit;
    }

    $check_query = "SELECT * FROM department WHERE name = '$name' AND id != '$id'";
    $check_result = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Department name already exists')</script>";
        echo "<script>window.location.href='../department.php'</script>";
        exit;
    }

    $check_query = "SELECT * FROM department WHERE id = '$id'";
    $check_result = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_result) == 0) {
        echo "<script>alert('Department ID does not exist')</script>";
        echo "<script>window.location.href='../department.php'</script>";
        exit;
    }

    $query = "UPDATE department SET name = '$name' WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>alert('Department updated successfully')</script>";
        echo "<script>window.location.href='../department.php'</script>";
    } else {
        echo "<script>alert('Failed to update department: " . mysqli_error($connection) . "')</script>";
        echo "<script>window.location.href='../department.php'</script>";
    }
}
