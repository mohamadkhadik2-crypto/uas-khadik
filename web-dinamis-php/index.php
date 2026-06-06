<?php
require_once 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lamborghini Showroom | Premium Collection</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <nav class="navbar">
        <div class="logo">LAMBORGHINI</div>
        <ul class="nav-links">
            <li><a href="index.php" class="active">Models</a></li>
            <li><a href="admin.php" class="btn-admin">Admin Dashboard</a></li>
        </ul>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <h1>UNLEASH THE <span>BULL</span></h1>
            <p>Discover the pinnacle of Italian engineering and design.</p>
        </div>
    </header>

    <main class="container">
        <h2 class="section-title">EXCLUSIVE COLLECTION</h2>
        
        <div class="grid-cars">
            <?php
            // Mengambil data dari tabel mobil_lamborghini
            // Catatan: Jika tabel belum ada, query ini akan gagal, namun kita abaikan sementara sampai DB dibuat.
            $sql = "SELECT * FROM mobil_lamborghini ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Gunakan gambar default jika tidak ada url
                    $img = !empty($row['gambar_url']) ? htmlspecialchars($row['gambar_url']) : 'https://images.unsplash.com/photo-1544829099-b9a0c07fad1a?auto=format&fit=crop&w=800&q=80';
                    ?>
                    <div class="car-card">
                        <div class="car-img" style="background-image: url('<?php echo $img; ?>');"></div>
                        <div class="car-info">
                            <h3><?php echo htmlspecialchars($row['nama_model']); ?> <span class="year"><?php echo htmlspecialchars($row['tahun']); ?></span></h3>
                            <p class="price"><?php echo htmlspecialchars($row['harga']); ?></p>
                            <p class="speed">Top Speed: <?php echo htmlspecialchars($row['kecepatan_maks']); ?></p>
                            <p class="desc"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='empty-state'>Belum ada koleksi mobil yang tersedia.</p>";
            }
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Lamborghini Showroom UAS ADM. All rights reserved.</p>
    </footer>

</body>
</html>
