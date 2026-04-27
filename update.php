<?php require 'db.php'; ?>

<?php
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM employees WHERE emp_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    $stmt = $conn->prepare("UPDATE employees SET name=?, position=?, salary=? WHERE emp_id=?");
    $stmt->bind_param("ssdi", $name, $position, $salary, $id);
    $stmt->execute();

    header("Location: index.php");
}
?>

<form method="POST">
    Name: <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>"><br>
    Position: <input type="text" name="position" value="<?= htmlspecialchars($row['position']) ?>"><br>
    Salary: <input type="number" step="0.01" name="salary" value="<?= htmlspecialchars($row['salary']) ?>"><br>
    <button type="submit">Update</button>
</form>