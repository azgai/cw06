<?php
require 'db.php';

$result = $conn->query("SELECT * FROM employees");

echo "<h2>All Employees</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Position</th><th>Salary</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['emp_id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['position']) . "</td>";
    echo "<td>" . htmlspecialchars($row['salary']) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>