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
    <title>Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'components/navbar.php'; ?>

    <div class="container mt-5 h-100 min-vh-100">
        <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h2 class="mb-3 mb-md-0">Department List</h2>
            <div class="grid gap-3">
                <button class="btn btn-success me-0 me-md-2 mb-2 mb-md-0" type="button" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add</button>
                <button class="btn btn-secondary me-0 me-md-2 mb-2 mb-md-0" type="button" data-bs-toggle="modal"
                    data-bs-target="#updateModal">Update</button>
                <button class="btn btn-danger me-0 me-md-2 mb-2 mb-md-0" type="button" data-bs-toggle="modal"
                    data-bs-target="#deleteModal">Delete</button>
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Department ID</th>
                    <th scope="col">Department Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM department";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die("Query Failed");
                } else {
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add modal -->
    <form action="actions/insert_dept.php" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addDepartment" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label for="id">Department ID</label>
                        <input type="text" name="id" class="form-control" placeholder="Enter ID">
                        <label for="name">Department Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="add_dept" value="ADD">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Update Modal -->
    <form action="actions/update_dept.php" method="post">
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="addDepartment" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Department</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label for="id">ID of Department to be Updated</label>
                        <input type="text" name="id" class="form-control" placeholder="Enter ID">
                        <label for="name">New Department Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="update_dept" value="UPDATE">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Delete Modal -->
    <form action="actions/delete_dept.php" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="addDepartment" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Department</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <label for="id">ID of Department to be Deleted</label>
                        <input type="text" name="id" class="form-control" placeholder="Enter ID">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-danger" name="delete_dept" value="DELETE">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php include 'components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>