<?php
// konfirmasi.php - Halaman Konfirmasi Pemesanan
session_start();

// Pastikan ada data booking di session
if (!isset($_SESSION['booking'])) {
    header('Location: index.php');
    exit;
}

$b = $_SESSION['booking'];

// Format tampilan tanggal
function formattgl($tgl) {
    $bulan = [
        '', 'Januari', 'Februari', 'Maret', 'April',
        'Mei', 'Juni', 'Juli', 'Agustus', 'September',
        'Oktober', 'November', 'Desember'
    ];

    $parts = explode('-', $tgl);

    if (count($parts) !== 3) {
        return '-';
    }

    return $parts[2] . ' ' . $bulan[(int)$parts[1]] . ' ' . $parts[0];
}

// Hitung lama menginap
$checkin_ts = strtotime($b['checkin']);
$checkout_ts = strtotime($b['checkout']);
$lama = ($checkout_ts - $checkin_ts) / 86400;

// Pastikan lama menginap tidak negatif
$lama = max(0, (int)$lama);

// Harga kamar per malam
$harga = [
    'Standard'     => 800000,
    'Deluxe'       => 1500000,
    'Suite'        => 3000000,
    'Presidential' => 7500000
];

$per_malam = $harga[$b['tipe_kamar']] ?? 0;
$total_kamar = $per_malam * $lama;

// Harga fasilitas tambahan per malam
$harga_fasilitas = [
    'Sarapan'      => 85000,
    'WiFi'         => 50000,
    'Antar Jemput' => 200000,
    'Kolam Renang' => 0,
    'Gym'          => 0,
    'Spa'          => 350000
];

// Ambil fasilitas dari session
$fasilitas = [];

if (!empty($b['fasilitas'])) {
    $fasilitas = explode(', ', $b['fasilitas']);
}

// Hitung total fasilitas
$total_fasil = 0;

foreach ($fasilitas as $f) {
    $f = trim($f);
    $total_fasil += ($harga_fasilitas[$f] ?? 0) * $lama;
}

// Hitung total pembayaran
$grand_total = $total_kamar + $total_fasil;

// Kode booking
$kode_booking = $b['kode_booking'] ?? '-';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Konfirmasi Pemesanan – Coer Hotel</title>

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-inner">

            <div class="nav-logo">
                <img src="logo.png" alt="Coer Hotel Logo" class="logo-img">

                <div class="nav-brand">
                    <span class="brand-main">Coer Hotel</span>
                </div>
            </div>

            <div class="nav-links">
                <a href="index.php">Beranda</a>
                <a href="#">Kamar</a>
                <a href="index.php" class="nav-cta">Reservasi Baru</a>
            </div>

        </div>
    </nav>


    <!-- Konfirmasi Pemesanan -->
    <section class="confirm-section">
        <div class="confirm-container">

            <!-- Header Konfirmasi -->
            <div class="confirm-hero">

                <div class="confirm-icon"></div>

                <span class="success-msg">
                    Data Anda telah berhasil kami simpan.
                </span>

                <h1>Pemesanan <em>Berhasil!</em></h1>

                <p>
                    Terima kasih,
                    <strong><?= htmlspecialchars($b['nama_lengkap']) ?></strong>!
                    Reservasi Anda telah kami terima.
                    Tim kami akan menghubungi Anda melalui email dalam 1x24 jam.
                </p>

            </div>


            <!-- Rincian Pemesanan -->
            <div class="data-summary">

                <div class="summary-header">
                    <span></span>
                    <h3>Rincian Pemesanan Anda</h3>

                    <span class="booking-id">
                        # <?= htmlspecialchars($kode_booking) ?>
                    </span>
                </div>


                <div class="summary-body">

                    <!-- Data Pribadi -->
                    <div class="summary-group">

                        <div class="summary-group-title">
                            Data Pribadi
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">Nama Lengkap</span>
                            <span class="summary-val">
                                <?= htmlspecialchars($b['nama_lengkap']) ?>
                            </span>
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">Email</span>
                            <span class="summary-val">
                                <?= htmlspecialchars($b['email']) ?>
                            </span>
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">No. Telepon</span>
                            <span class="summary-val">
                                <?= htmlspecialchars($b['no_telepon']) ?>
                            </span>
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">Alamat</span>
                            <span class="summary-val">
                                <?= htmlspecialchars($b['alamat']) ?>
                            </span>
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">No. Identitas</span>
                            <span class="summary-val">
                                <?= htmlspecialchars($b['no_identitas']) ?>
                            </span>
                        </div>

                    </div>


                    <!-- Detail Pemesanan -->
                    <div class="summary-group">

                        <div class="summary-group-title">
                            Detail Pemesanan
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">Tipe Kamar</span>
                            <span class="summary-val">
                                <span class="badge-room">
                                    <?= htmlspecialchars($b['tipe_kamar']) ?> Room
                                </span>
                            </span>
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">Jumlah Tamu</span>
                            <span class="summary-val">
                                <?= (int)$b['jumlah_tamu'] ?> Orang
                            </span>
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">Check-in</span>
                            <span class="summary-val">
                                <?= formattgl($b['checkin']) ?>
                            </span>
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">Check-out</span>
                            <span class="summary-val">
                                <?= formattgl($b['checkout']) ?>
                            </span>
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">Lama Menginap</span>
                            <span class="summary-val">
                                <?= $lama ?> Malam
                            </span>
                        </div>

                    </div>


                    <!-- Fasilitas Tambahan -->
                    <?php if (!empty($fasilitas)): ?>

                    <div class="summary-group">

                        <div class="summary-group-title">
                            Fasilitas Tambahan
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">Dipilih</span>

                            <span class="summary-val">
                                <?php foreach ($fasilitas as $f): ?>
                                    <span class="badge-facility">
                                        <?= htmlspecialchars(trim($f)) ?>
                                    </span>
                                <?php endforeach; ?>
                            </span>
                        </div>

                    </div>

                    <?php endif; ?>


                    <!-- Pembayaran -->
                    <div class="summary-group">

                        <div class="summary-group-title">
                            Pembayaran
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">Metode</span>

                            <span class="summary-val">
                                <span class="badge-payment">
                                    <?= htmlspecialchars($b['metode_bayar']) ?>
                                </span>
                            </span>
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">Harga Kamar/Malam</span>

                            <span class="summary-val">
                                Rp <?= number_format($per_malam, 0, ',', '.') ?>
                            </span>
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">
                                Subtotal Kamar (<?= $lama ?> malam)
                            </span>

                            <span class="summary-val">
                                Rp <?= number_format($total_kamar, 0, ',', '.') ?>
                            </span>
                        </div>

                        <?php if ($total_fasil > 0): ?>

                        <div class="summary-row">
                            <span class="summary-key">
                                Subtotal Fasilitas
                            </span>

                            <span class="summary-val">
                                Rp <?= number_format($total_fasil, 0, ',', '.') ?>
                            </span>
                        </div>

                        <?php endif; ?>

                        <div class="summary-row" style="background:rgba(38,48,88,0.04); border-radius:8px; padding:12px 10px; margin-top:8px;">

                            <span class="summary-key" style="font-weight:700; color:var(--blue); font-size:0.95rem;">
                                ESTIMASI TOTAL
                            </span>

                            <span class="summary-val" style="font-size:1.1rem; color:var(--blue); font-weight:800;">
                                Rp <?= number_format($grand_total, 0, ',', '.') ?>
                            </span>

                        </div>

                    </div>


                    <!-- Catatan Tambahan -->
                    <?php if (!empty($b['catatan'])): ?>

                    <div class="summary-group">

                        <div class="summary-group-title">
                            Catatan / Permintaan Khusus
                        </div>

                        <div class="summary-row">
                            <span class="summary-key">Pesan</span>

                            <span class="summary-val">
                                <?= nl2br(htmlspecialchars($b['catatan'])) ?>
                            </span>
                        </div>

                    </div>

                    <?php endif; ?>

                </div>
            </div>


            <!-- Tombol Aksi -->
            <div class="confirm-actions">

                <a href="index.php" class="btn-home">
                    ← Kembali ke Beranda
                </a>

                <button onclick="window.print()" class="btn-print">
                    Cetak Konfirmasi
                </button>

            </div>

        </div>
    </section>


    <!-- Footer -->
    <footer class="footer">

        <div class="footer-inner">

            <div class="footer-brand">
                <img src="logo.png" alt="Coer Hotel" class="footer-logo">

                <p>
                    Coer Hotel – Tempat di mana kemewahan<br>
                    bertemu kenyamanan sejati.
                </p>
            </div>

            <div class="footer-info">
                <p>Jl. Dr. Mansyur No.17, Medan</p>
                <p>+62 21 1234 5678</p>
                <p>reservasi@Coerhotel.co.id</p>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2026 Coer Hotel. All rights reserved.</p>
        </div>

    </footer>

</body>
</html>

<?php
// Hapus session booking setelah halaman konfirmasi ditampilkan
unset($_SESSION['booking']);
?>