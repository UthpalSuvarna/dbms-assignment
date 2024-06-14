<?php
include '../dbconfig.php';

if (isset($_POST['update_emp'])) {
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $salary = $_POST['salary'];
    $dept_id = $_POST['dept_id'];

    // Check if emp_id is provided
    if (empty($emp_id)) {
        echo "<script>alert('Employee ID is required')</script>";
        echo "<script>window.location.href='../employee.php'</script>";
        exit;
    }

    // Check if employee exists
    $check_query = "SELECT * FROM employee WHERE emp_id = '$emp_id'";
    $check_result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_result) == 0) {
        echo "<script>alert('Employee ID does not exist')</script>";
        echo "<script>window.location.href='../employee.php'</script>";
        exit;
    }

    // Build the update query based on provided fields
    $update_fields = [];
    if (!empty($emp_name)) {
        $update_fields[] = "emp_name = '$emp_name'";
    }
    if (!empty($salary)) {
        $update_fields[] = "salary = '$salary'";
    }
    if (!empty($dept_id)) {
        $update_fields[] = "dept_id = '$dept_id'";
    }

    if (!empty($update_fields)) {
        $update_query = "UPDATE employee SET " . implode(', ', $update_fields) . " WHERE emp_id = '$emp_id'";
        $result = mysqli_query($connection, $update_query);

        if ($result) {
            echo "<script>alert('Employee updated successfully')</script>";
            echo "<script>window.location.href='../employee.php'</script>";
        } else {
            echo "<script>alert('Failed to update employee: " . mysqli_error($connection) . "')</script>";
            echo "<script>window.location.href='../employee.php'</script>";
        }
    } else {
        echo "<script>alert('No fields to update')</script>";
        echo "<script>window.location.href='../employee.php'</script>";
    }
}

mysqli_close($connection);