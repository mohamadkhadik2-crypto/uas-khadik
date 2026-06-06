<?php
require_once 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Gunakan prepared statement
    $stmt = $conn->prepare("DELETE FROM mobil_lamborghini WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $stmt->close();
} else {
    header("Location: admin.php");
    exit();
}
?>
