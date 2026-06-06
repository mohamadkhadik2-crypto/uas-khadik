<?php
require_once 'koneksi.php';

// Ambil ID dari URL
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID not found.');

// Ambil data saat ini
$stmt = $conn->prepare("SELECT * FROM mobil_lamborghini WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$car = $result->fetch_assoc();
$stmt->close();

if (!$car) {
    die('ERROR: Car not found.');
}

// Proses form jika di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_model = $_POST['nama_model'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];
    $kecepatan_maks = $_POST['kecepatan_maks'];
    $deskripsi = $_POST['deskripsi'];
    $gambar_url = $_POST['gambar_url'];

    $update_stmt = $conn->prepare("UPDATE mobil_lamborghini SET nama_model=?, tahun=?, harga=?, kecepatan_maks=?, deskripsi=?, gambar_url=? WHERE id=?");
    $update_stmt->bind_param("sissssi", $nama_model, $tahun, $harga, $kecepatan_maks, $deskripsi, $gambar_url, $id);

    if ($update_stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        $error = "Error: " . $update_stmt->error;
    }
    $update_stmt->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Car | Lamborghini</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container" style="max-width: 800px;">
        <h2 class="section-title">EDIT MODEL</h2>
        
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form action="edit.php?id=<?php echo $id; ?>" method="POST" style="background: rgba(25,25,25,0.8); padding: 2rem; border-radius: 8px; border: 1px solid var(--accent-color);">
            <div class="form-group">
                <label>Model Name</label>
                <input type="text" name="nama_model" class="form-control" value="<?php echo htmlspecialchars($car['nama_model']); ?>" required>
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="number" name="tahun" class="form-control" value="<?php echo htmlspecialchars($car['tahun']); ?>" required>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="harga" class="form-control" value="<?php echo htmlspecialchars($car['harga']); ?>" required>
            </div>
            <div class="form-group">
                <label>Top Speed</label>
                <input type="text" name="kecepatan_maks" class="form-control" value="<?php echo htmlspecialchars($car['kecepatan_maks']); ?>" required>
            </div>
            <div class="form-group">
                <label>Image URL</label>
                <input type="url" name="gambar_url" class="form-control" value="<?php echo htmlspecialchars($car['gambar_url']); ?>">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="deskripsi" class="form-control" rows="5" required><?php echo htmlspecialchars($car['deskripsi']); ?></textarea>
            </div>
            <button type="submit" class="btn">Update Car</button>
            <a href="admin.php" class="btn btn-warning" style="margin-left: 10px;">Cancel</a>
        </form>
    </div>
</body>
</html>
