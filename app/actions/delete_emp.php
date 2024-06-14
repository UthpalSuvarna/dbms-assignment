<?php
include '../dbconfig.php';

if (isset($_POST['delete_emp'])) {
    $emp_id = $_POST['emp_id'];

    if (empty($emp_id)) {
        echo "<script>alert('Please fill all fields')</script>";
        echo "<script>window.location.href='../employee.php'</script>";
        exit;
    }

    $check_query = "SELECT * FROM employee WHERE emp_id = '$emp_id'";
    $check_result = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_result) == 0) {
        echo "<script>alert('Employee ID does not exist')</script>";
        echo "<script>window.location.href='../employee.php'</script>";
        exit;
    }

    $query = "DELETE FROM employee WHERE emp_id = '$emp_id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>alert('Employee deleted successfully')</script>";
        echo "<script>window.location.href='../employee.php'</script>";
    } else {
        echo "<script>alert('Failed to delete employee: " . mysqli_error($connection) . "')</script>";
        echo "<script>window.location.href='../employee.php'</script>";
    }
}