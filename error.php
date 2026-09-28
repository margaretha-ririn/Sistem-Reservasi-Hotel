<?php
session_start();
$pesan = $_SESSION['error_msg'] ?? 'Terjadi kesalahan, data gagal disimpan.';
unset($_SESSION['error_msg']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gagal – Coer Hotel</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https:fonts.googleapis.com">
  <link href="https:fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

  <nav class="navbar">
    <div class="nav-inner">
      <div class="nav-logo">
        <img src="logo.png" alt="Coer Hotel Logo" class="logo-img" />
        <div class="nav-brand">
          <span class="brand-main">Coer Hotel</span>
          
        </div>
      </div>
    </div>
  </nav>

  <section class="error-section">
    <div class="error-card">
      <div class="error-icon"></div>
      <h2>Oops! Ada Masalah</h2>
      <p><?= $pesan ?></p>
      <p style="font-size:0.85rem; color:#9098b5; margin-bottom:2rem;">
        Silakan coba lagi. Jika masalah berlanjut, hubungi tim kami di <strong>reservasi@Coerhotel.co.id</strong>
      </p>
      <a href="index.php" class="btn-home" style="font-size:0.9rem; padding:12px 28px;">← Kembali ke Formulir</a>
    </div>
  </section>

</body>
</html>