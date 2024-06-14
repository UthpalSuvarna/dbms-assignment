<?php
include '../dbconfig.php';

if (isset($_POST['add_emp'])) {
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $salary = $_POST['salary'];
    $dep_id = $_POST['dept_id'];


    if (empty($emp_id) || empty($emp_name) || empty($salary) || empty($dep_id)) {
        echo "<script>alert('Please fill all fields')</script>";
        echo "<script>window.location.href='../employee.php'</script>";
        exit;
    }

    $check_query = "SELECT * FROM employee WHERE emp_id = '$emp_id'";
    $check_result = mysqli_query($connection, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Employee ID already exists')</script>";
        echo "<script>window.location.href='../employee.php'</script>";
        exit;
    }

    $query = "INSERT INTO employee (emp_id, emp_name, salary, dept_id) VALUES ('$emp_id', '$emp_name', '$salary', '$dep_id')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>alert('Employee added successfully')</script>";
        echo "<script>window.location.href='../employee.php'</script>";
    } else {
        echo "<script>alert('Failed to add employee: " . mysqli_error($connection) . "')</script>";
        echo "<script>window.location.href='../employee.php'</script>";
    }
}

mysqli_close($connection);