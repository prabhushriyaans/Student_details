<?php
$conn = new mysqli('localhost', 'prabhu', '161:Ox.88396ef:117', 'student_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $roll_number = $_POST['roll_number'];
    $phone = $_POST['phone'];
    $blood_group = $_POST['blood_group'];
    $address = $_POST['address'];

    $sql = "UPDATE students SET name='$name', age='$age', roll_number='$roll_number', phone='$phone', blood_group='$blood_group', address='$address' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: display.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Update Student</h1>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo $student['age']; ?>" required>

            <label for="roll_number">Roll Number:</label>
            <input type="text" id="roll_number" name="roll_number" value="<?php echo $student['roll_number']; ?>" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $student['phone']; ?>" required>

            <label for="blood_group">Blood Group:</label>
            <input type="text" id="blood_group" name="blood_group" value="<?php echo $student['blood_group']; ?>" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required><?php echo $student['address']; ?></textarea>

            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>
