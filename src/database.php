<?php
// Read the database connection parameters from environment variables
$db_host = getenv('DB_HOST'); //$db_host = "localhost";
$db_name = getenv('DB_NAME'); //$db_name = "gallery";
$db_user = getenv('DB_USER'); //$db_user = "root";

// Read the password file path from an environment variable
$password_file_path = getenv('PASSWORD_FILE_PATH');

// Read the password from the file
$db_pass = trim(file_get_contents($password_file_path)); //$db_pass = "password";
?>