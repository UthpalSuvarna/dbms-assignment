<?php
include '../dbconfig.php';

if (isset($_POST['delete_dept'])) {
    $id = $_POST['id'];

    if (empty($id)) {
        echo "<script>alert('Please fill all fields')</script>";
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

    $query = "DELETE FROM department WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>alert('Department deleted successfully')</script>";
        echo "<script>window.location.href='../department.php'</script>";
    } else {
        echo "<script>alert('Failed to delete department: " . mysqli_error($connection) . "')</script>";
        echo "<script>window.location.href='../department.php'</script>";
    }
}