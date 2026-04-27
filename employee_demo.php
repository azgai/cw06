<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $stmt = $conn->prepare("INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $position, $salary);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee Demo</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h1>Employee Management System</h1>

    <p>
        <a href="index.php">Home</a> |
        <a href="read.php">View Employees</a>
    </p>

    <h2>Add Employee</h2>

    <form method="POST">
        <input type="text" name="name" placeholder="Name" required><br><br>
        <input type="text" name="position" placeholder="Position" required><br><br>
        <input type="number" step="0.01" name="salary" placeholder="Salary" required><br><br>
        <button type="submit">Add Employee</button>
    </form>

    <h2>Employee List</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM employees");

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['emp_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['position']) . "</td>";
            echo "<td>" . htmlspecialchars($row['salary']) . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>

</html>