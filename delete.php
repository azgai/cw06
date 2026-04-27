<?php require 'db.php'; ?>

<?php
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM employees WHERE emp_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
?>