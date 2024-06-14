<?php
session_start();
include 'dbconfig.php';
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'components/navbar.php'; ?>
    <div class="container mt-5">
        <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h2 class="mb-3 mb-md-0">Employee List</h2>
            <div class="grid gap-3">
                <button class="btn btn-success me-0 me-md-2 mb-2 mb-md-0" type="button" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add</button>
                <button class="btn btn-secondary me-0 me-md-2 mb-2 mb-md-0" type="button">Update</button>
                <button class="btn btn-danger me-0 me-md-2 mb-2 mb-md-0" type="button">Delete</button>
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Department ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM employee";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Query Failed");
                } else {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['emp_id'] ?></td>
                            <td><?php echo $row['emp_name'] ?></td>
                            <td><?php echo $row['salary'] ?></td>
                            <td><?php echo $row['dept_id'] ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add modal -->
    <form action="actions/insert_emp.php" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addEmployee" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label for="id">Employee ID</label>
                        <input type="text" name="emp_id" class="form-control" placeholder="Enter ID">
                        <label for="name">Employee Name</label>
                        <input type="text" name="emp_name" class="form-control" placeholder="Enter Name">
                        <label for="name">Salary</label>
                        <input type="text" name="salary" class="form-control" placeholder="Enter Name">
                        <label for="name">Department ID</label>
                        <input type="text" name="dept_id" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="add_emp" value="ADD">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>