-- Membuat tabel mobil_lamborghini
CREATE TABLE IF NOT EXISTS mobil_lamborghini (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_model VARCHAR(100) NOT NULL,
    tahun INT NOT NULL,
    harga VARCHAR(50) NOT NULL,
    kecepatan_maks VARCHAR(50) NOT NULL,
    deskripsi TEXT NOT NULL,
    gambar_url VARCHAR(255)
);

-- Memasukkan data dummy (Seed Data)
INSERT INTO mobil_lamborghini (nama_model, tahun, harga, kecepatan_maks, deskripsi, gambar_url) VALUES 
('Aventador SVJ', 2021, '$517,770', '350 km/h', 'The Aventador SVJ is the most track-focused Aventador ever produced. It features advanced aerodynamics and a naturally aspirated V12 engine.', 'https://images.unsplash.com/photo-1627454819213-f5c0c0b2f15a?auto=format&fit=crop&w=800&q=80'),
('Huracán EVO', 2022, '$268,321', '325 km/h', 'The Huracán EVO is the evolution of the most successful V10-powered Lamborghini ever. It features advanced vehicle dynamics control.', 'https://images.unsplash.com/photo-1544829099-b9a0c07fad1a?auto=format&fit=crop&w=800&q=80'),
('Urus Performante', 2023, '$260,676', '306 km/h', 'The Urus Performante takes the super SUV concept to a new level, delivering lightweight engineering and enhanced aerodynamics.', 'https://images.unsplash.com/photo-1563720223185-11003d516935?auto=format&fit=crop&w=800&q=80');
