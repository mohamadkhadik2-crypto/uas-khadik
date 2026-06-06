<?php
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Lamborghini</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">LAMBO ADMIN</div>
        <ul class="nav-links">
            <li><a href="index.php">View Site</a></li>
        </ul>
    </nav>

    <div class="container">
        <div class="admin-header">
            <h2>Manage Cars</h2>
            <a href="tambah.php" class="btn">Add New Car</a>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Model Name</th>
                        <th>Year</th>
                        <th>Price</th>
                        <th>Top Speed</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM mobil_lamborghini ORDER BY id DESC";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td><strong>" . htmlspecialchars($row['nama_model']) . "</strong></td>";
                            echo "<td>" . htmlspecialchars($row['tahun']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['harga']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['kecepatan_maks']) . "</td>";
                            echo "<td>
                                    <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning' style='padding:0.4rem 0.8rem; font-size:0.8rem;'>Edit</a>
                                    <a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger' style='padding:0.4rem 0.8rem; font-size:0.8rem;' onclick='return confirm(\"Are you sure you want to delete this car?\")'>Delete</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' style='text-align:center;'>No cars found in database.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
