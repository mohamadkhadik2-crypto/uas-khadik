<?php
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_model = $_POST['nama_model'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];
    $kecepatan_maks = $_POST['kecepatan_maks'];
    $deskripsi = $_POST['deskripsi'];
    $gambar_url = $_POST['gambar_url'];

    // Menggunakan Prepared Statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO mobil_lamborghini (nama_model, tahun, harga, kecepatan_maks, deskripsi, gambar_url) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sissss", $nama_model, $tahun, $harga, $kecepatan_maks, $deskripsi, $gambar_url);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        $error = "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Add New Car | Lamborghini</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container" style="max-width: 800px;">
        <h2 class="section-title">ADD NEW MODEL</h2>
        
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form action="tambah.php" method="POST" style="background: rgba(25,25,25,0.8); padding: 2rem; border-radius: 8px; border: 1px solid var(--accent-color);">
            <div class="form-group">
                <label>Model Name (e.g. Aventador SVJ)</label>
                <input type="text" name="nama_model" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="number" name="tahun" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Price (e.g. $500,000)</label>
                <input type="text" name="harga" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Top Speed (e.g. 350 km/h)</label>
                <input type="text" name="kecepatan_maks" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Image URL</label>
                <input type="url" name="gambar_url" class="form-control" placeholder="https://...">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn">Save Car</button>
            <a href="admin.php" class="btn btn-warning" style="margin-left: 10px;">Cancel</a>
        </form>
    </div>
</body>
</html>
