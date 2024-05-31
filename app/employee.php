<?php
session_start();
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'components/navbar.php'; ?>
    <div class="container mt-5">
        <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h2 class="mb-3 mb-md-0">Employee List</h2>
            <div class="grid gap-3">
                <button class="btn btn-success me-0 me-md-2 mb-2 mb-md-0" type="button">Add</button>
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
                <tr>
                    <td>1</td>
                    <td>Human Resources</td>
                    <td>gkjfg</td>
                    <td>dfgf</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Finance</td>
                    <td>gkjfg</td>
                    <td>dfgf</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Marketing</td>
                    <td>gkjfg</td>
                    <td>dfgf</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>IT</td>
                    <td>gkjfg</td>
                    <td>dfgf</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Customer Service</td>
                    <td>gkjfg</td>
                    <td>dfgf</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>