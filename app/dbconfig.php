<?php
define("HOSTNAME", "db");
define("USERNAME", "php_docker");
define("PASSWORD", "password");
define("DATABASE", "dbms_asmt");

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
