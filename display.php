<?php
// Database connection
$conn = new mysqli('localhost', 'prabhu', '161:Ox.88396ef:117', 'student_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<!-- <html lang="en"> -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Student Details</h1>
        <table border="1" width="90%">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Roll Number</th>
                <th>Phone</th>
                <th>Blood Group</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['name']}</td>
                            <td>{$row['age']}</td>
                            <td>{$row['roll_number']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['blood_group']}</td>
                            <td>{$row['address']}</td>
                            <td>
                                <a href='update.php?id={$row['id']}'>Update</a>
                                <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>";
            }
            $conn->close();
            ?>
            <form action="front.html" method="get">
    <button type="submit" name="back">BACK</button>
</form>

        </table>
    </div>
</body>
</html>
