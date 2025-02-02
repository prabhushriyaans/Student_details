<?php
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $roll_number = $_POST['roll_number'];
    $phone = $_POST['phone'];
    $blood_group = $_POST['blood_group'];
    $address = $_POST['address'];

    // Database connection
    $conn = new mysqli('localhost', 'prabhu', '161:Ox.88396ef:117', 'student_db');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert into database
    $sql = "INSERT INTO students (name, age, roll_number, phone, blood_group, address) 
            VALUES ('$name', '$age', '$roll_number', '$phone', '$blood_group', '$address')";

    if ($conn->query($sql) == TRUE) {
        header("Location: display.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
