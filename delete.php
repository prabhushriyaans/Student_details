<?php
$conn = new mysqli('localhost', 'prabhu', '161:Ox.88396ef:117', 'student_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id = $id";

    if ($conn->query($sql) === TRUE) 
    {
        header("Location: display.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
