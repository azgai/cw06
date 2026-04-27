<?php require 'db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $stmt = $conn->prepare("INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $position, $salary);
    $stmt->execute();

    header("Location: index.php");
}
?>

<form method="POST">
    Name: <input type="text" name="name" required><br>
    Position: <input type="text" name="position" required><br>
    Salary: <input type="number" step="0.01" name="salary" required><br>
    <button type="submit">Add</button>
</form>