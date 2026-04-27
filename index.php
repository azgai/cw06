<?php require 'db.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Employees</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h2>Employee List</h2>

    <a href="create.php">Add Employee</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>

        <?php
        $sql = "SELECT * FROM employees ORDER BY emp_id ASC";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['emp_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['position']) . "</td>";
            echo "<td>" . htmlspecialchars($row['salary']) . "</td>";
            echo "<td>
        <a href='update.php?id=" . $row['emp_id'] . "'>Edit</a> |
        <a href='delete.php?id=" . $row['emp_id'] . "'>Delete</a>
    </td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>

</html>