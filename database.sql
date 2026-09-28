CREATE DATABASE IF NOT EXISTS pemesanan_hotel;
USE pemesanan_hotel;

CREATE TABLE IF NOT EXISTS pemesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    nomor_telepon VARCHAR(20) NOT NULL,
    alamat_lengkap TEXT NOT NULL,
    nomor_identitas VARCHAR(50) NOT NULL,
    tipe_kamar ENUM('Standard', 'Deluxe', 'Suite', 'Presidential') NOT NULL,
    jumlah_tamu INT NOT NULL,
    tgl_checkin DATE NOT NULL,
    tgl_checkout DATE NOT NULL,
    sarapan TINYINT(1) DEFAULT 0,
    wifi TINYINT(1) DEFAULT 0,
    antar_jemput TINYINT(1) DEFAULT 0,
    kolam_renang TINYINT(1) DEFAULT 0,
    gym TINYINT(1) DEFAULT 0,
    spa TINYINT(1) DEFAULT 0,
    metode_pembayaran ENUM('Transfer Bank', 'Kartu Kredit', 'E-Wallet') NOT NULL,
    permintaan_khusus TEXT,
    tgl_pemesanan TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
