<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "student_db";

$conn = mysqli_connect(
    $host,
    $username,
    $password,
    $database
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background: #fbf1f1;
        }

        h2 {
            text-align: center;
            color: #222;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #176b5b;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Student Information Table</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>CGPA</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['department']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['cgpa']); ?></td>
            </tr>
        <?php } ?>

    </table>

</body>
</html>

