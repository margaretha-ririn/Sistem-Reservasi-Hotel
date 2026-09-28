<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Coer Hotel – Reservasi Online</title>

  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

  <style>
    /* BAGIAN KAMAR HOTEL */
    .rooms-section {
      padding: 90px 8%;
      background: #f8f9fc;
      scroll-margin-top: 90px;
    }

    .rooms-header {
      text-align: center;
      margin-bottom: 45px;
    }

    .rooms-tag {
      color: #b49a62;
      font-size: 13px;
      font-weight: 700;
      letter-spacing: 3px;
    }

    .rooms-header h2 {
      font-family: 'Playfair Display', serif;
      font-size: 38px;
      color: #263058;
      margin: 12px 0;
    }

    .rooms-header p {
      color: #777;
      font-size: 15px;
    }

    .rooms-grid {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 24px;
      max-width: 1400px;
      margin: auto;
    }

    .room-card {
      background: #fff;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .room-card:hover {
      transform: translateY(-7px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.13);
    }

    .room-image {
      width: 100%;
      height: 220px;
      object-fit: cover;
      display: block;
    }

    .room-content {
      padding: 22px;
    }

    .room-content h3 {
      font-family: 'Playfair Display', serif;
      color: #263058;
      font-size: 22px;
      margin: 0 0 10px;
    }

    .room-description {
      color: #777;
      font-size: 14px;
      line-height: 1.7;
      min-height: 48px;
      margin-bottom: 18px;
    }

    .room-price {
      color: #263058;
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 18px;
    }

    .room-price span {
      color: #888;
      font-size: 12px;
      font-weight: 400;
    }

    .room-button {
      display: block;
      text-align: center;
      background: #263058;
      color: #fff;
      text-decoration: none;
      padding: 12px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      transition: background 0.3s ease;
    }

    .room-button:hover {
      background: #b49a62;
    }

    @media (max-width: 1100px) {
      .rooms-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }

    @media (max-width: 600px) {
      .rooms-section {
        padding: 60px 5%;
      }

      .rooms-grid {
        grid-template-columns: 1fr;
      }

      .rooms-header h2 {
        font-size: 30px;
      }

      .room-image {
        height: 230px;
      }
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="nav-inner">
      <div class="nav-logo">
        <img src="logo.png" alt="Coer Hotel Logo" class="logo-img" />
        <div class="nav-brand">
          <span class="brand-main">Coer Hotel</span>
        </div>
      </div>

      <div class="nav-links">
        <a href="#">Beranda</a>
        <a href="#kamar">Kamar</a>
        <a href="#form-section" class="nav-cta">Reservasi</a>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-overlay"></div>

    <div class="hero-content">
      <h1 class="hero-title">Reservasi Kamar<br/>Hotel Anda</h1>
      <p class="hero-subtitle">
        Nikmati pengalaman menginap mewah di Coer Hotel.
        Isi formulir di bawah ini untuk memesan kamar impian Anda.
      </p>
      <a href="#form-section" class="hero-btn">Pesan Sekarang ↓</a>
    </div>

    <div class="hero-stats">
      <div class="stat">
        <span class="stat-num">200+</span>
        <span class="stat-label">Kamar</span>
      </div>

      <div class="stat-divider"></div>

      <div class="stat">
        <span class="stat-num">4.9</span>
        <span class="stat-label">Rating Tamu</span>
      </div>

      <div class="stat-divider"></div>

      <div class="stat">
        <span class="stat-num">15K+</span>
        <span class="stat-label">Tamu Puas</span>
      </div>
    </div>
  </section>

  <!-- BAGIAN KAMAR HOTEL -->
  <section class="rooms-section" id="kamar">
    <div class="rooms-header">
      <span class="rooms-tag">AKOMODASI KAMI</span>
      <h2>Pilihan Kamar Coer Hotel</h2>
      <p>Pilih kamar yang sesuai dengan kebutuhan dan kenyamanan Anda.</p>
    </div>

    <div class="rooms-grid">

      <!-- STANDARD ROOM -->
      <div class="room-card">
        <img
          src="standard.jpg"
          alt="Standard Room Coer Hotel"
          class="room-image"
        />

        <div class="room-content">
          <h3>Standard Room</h3>
          <p class="room-description">
            Kamar nyaman dengan fasilitas lengkap untuk pengalaman menginap Anda.
          </p>
          <div class="room-price">
            Rp 800.000 <span>/ malam</span>
          </div>
          <a href="#form-section" class="room-button" onclick="pilihKamar('Standard')">
            Pesan Kamar
          </a>
        </div>
      </div>

      <!-- DELUXE ROOM -->
      <div class="room-card">
        <img
          src="deluxe.jpg"
          alt="Deluxe Room Coer Hotel"
          class="room-image"
        />

        <div class="room-content">
          <h3>Deluxe Room</h3>
          <p class="room-description">
            Kamar elegan dengan ruang lebih luas untuk kenyamanan ekstra.
          </p>
          <div class="room-price">
            Rp 1.500.000 <span>/ malam</span>
          </div>
          <a href="#form-section" class="room-button" onclick="pilihKamar('Deluxe')">
            Pesan Kamar
          </a>
        </div>
      </div>

      <!-- SUITE ROOM -->
      <div class="room-card">
        <img
          src="suite.jpg"
          alt="Suite Room Coer Hotel"
          class="room-image"
        />

        <div class="room-content">
          <h3>Suite Room</h3>
          <p class="room-description">
            Kamar mewah dengan fasilitas premium dan ruang yang lebih eksklusif.
          </p>
          <div class="room-price">
            Rp 3.000.000 <span>/ malam</span>
          </div>
          <a href="#form-section" class="room-button" onclick="pilihKamar('Suite')">
            Pesan Kamar
          </a>
        </div>
      </div>

      <!-- PRESIDENTIAL SUITE -->
      <div class="room-card">
        <img
          src="presidential.jpg"
          alt="Presidential Suite Coer Hotel"
          class="room-image"
        />

        <div class="room-content">
          <h3>Presidential Suite</h3>
          <p class="room-description">
            Kamar eksklusif dengan kemewahan dan kenyamanan terbaik.
          </p>
          <div class="room-price">
            Rp 7.500.000 <span>/ malam</span>
          </div>
          <a href="#form-section" class="room-button" onclick="pilihKamar('Presidential')">
            Pesan Kamar
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- FORM RESERVASI -->
  <section class="form-section" id="form-section">
    <div class="form-container">

      <div class="form-header">
        <span class="form-tag">FORMULIR PEMESANAN</span>
        <h2>Lengkapi Data Reservasi Anda</h2>
        <p>
          Pastikan semua data diisi dengan benar untuk memperlancar
          proses check-in Anda.
        </p>
      </div>

      <form action="proses.php" method="POST" id="bookingForm" onsubmit="return validateForm()">

        <!-- DATA PRIBADI -->
        <div class="form-card">
          <div class="card-header">
            <div class="card-icon">01</div>
            <div>
              <h3>Data Pribadi</h3>
              <p>Informasi identitas pemesan</p>
            </div>
          </div>

          <div class="form-grid">
            <div class="form-group full-width">
              <label for="nama_lengkap">Nama Lengkap <span class="req">*</span></label>
              <input type="text" id="nama_lengkap" name="nama_lengkap"
                placeholder="Masukkan nama sesuai KTP" required />
            </div>

            <div class="form-group">
              <label for="email">Alamat Email <span class="req">*</span></label>
              <input type="email" id="email" name="email"
                placeholder="contoh@email.com" required />
            </div>

            <div class="form-group">
              <label for="no_telepon">Nomor Telepon <span class="req">*</span></label>
              <input type="tel" id="no_telepon" name="no_telepon"
                placeholder="08xx-xxxx-xxxx" required />
            </div>

            <div class="form-group full-width">
              <label for="alamat">Alamat Lengkap <span class="req">*</span></label>
              <textarea id="alamat" name="alamat" rows="3"
                placeholder="Jalan, kelurahan, kota, provinsi, kode pos" required></textarea>
            </div>

            <div class="form-group full-width">
              <label for="no_identitas">Nomor Identitas (KTP/Paspor) <span class="req">*</span></label>
              <input type="text" id="no_identitas" name="no_identitas"
                placeholder="Masukkan 16 digit NIK atau nomor paspor"
                maxlength="20" required />
            </div>
          </div>
        </div>

        <!-- DETAIL PEMESANAN -->
        <div class="form-card">
          <div class="card-header">
            <div class="card-icon">02</div>
            <div>
              <h3>Detail Pemesanan</h3>
              <p>Pilih tipe kamar dan jadwal menginap</p>
            </div>
          </div>

          <div class="form-grid">
            <div class="form-group">
              <label for="tipe_kamar">Tipe Kamar <span class="req">*</span></label>
              <select id="tipe_kamar" name="tipe_kamar" required>
                <option value="" disabled selected>-- Pilih Tipe Kamar --</option>
                <option value="Standard">Standard Room – Rp 800.000/malam</option>
                <option value="Deluxe">Deluxe Room – Rp 1.500.000/malam</option>
                <option value="Suite">Suite Room – Rp 3.000.000/malam</option>
                <option value="Presidential">Presidential Suite – Rp 7.500.000/malam</option>
              </select>
            </div>

            <div class="form-group">
              <label for="jumlah_tamu">Jumlah Tamu <span class="req">*</span></label>
              <select id="jumlah_tamu" name="jumlah_tamu" required>
                <option value="" disabled selected>-- Pilih --</option>
                <?php for ($i = 1; $i <= 8; $i++) echo "<option value='$i'>$i Orang</option>"; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="checkin">Tgl Check-in <span class="req">*</span></label>
              <input type="date" id="checkin" name="checkin" required />
            </div>

            <div class="form-group">
              <label for="checkout">Tgl Check-out <span class="req">*</span></label>
              <input type="date" id="checkout" name="checkout" required />
            </div>
          </div>
        </div>

        <!-- TAMBAHAN -->
        <div class="form-card">
          <div class="card-header">
            <div class="card-icon">03</div>
            <div>
              <h3>Tambahan</h3>
              <p>Pilih layanan ekstra yang Anda inginkan</p>
            </div>
          </div>

          <div class="checkbox-grid">
            <label class="checkbox-item">
              <input type="checkbox" name="tambahan[]" value="Sarapan" />
              <span class="checkbox-box"></span>
              <span class="checkbox-content">
                <span class="cb-label">Sarapan</span>
              </span>
            </label>

            <label class="checkbox-item">
              <input type="checkbox" name="tambahan[]" value="WiFi" />
              <span class="checkbox-box"></span>
              <span class="checkbox-content">
                <span class="cb-label">WiFi Premium</span>
              </span>
            </label>

            <label class="checkbox-item">
              <input type="checkbox" name="tambahan[]" value="Antar Jemput" />
              <span class="checkbox-box"></span>
              <span class="checkbox-content">
                <span class="cb-label">Antar Jemput</span>
              </span>
            </label>

            <label class="checkbox-item">
              <input type="checkbox" name="tambahan[]" value="Kolam Renang" />
              <span class="checkbox-box"></span>
              <span class="checkbox-content">
                <span class="cb-label">Kolam Renang</span>
              </span>
            </label>

            <label class="checkbox-item">
              <input type="checkbox" name="tambahan[]" value="Gym" />
              <span class="checkbox-box"></span>
              <span class="checkbox-content">
                <span class="cb-label">Gym & Fitness</span>
              </span>
            </label>

            <label class="checkbox-item">
              <input type="checkbox" name="tambahan[]" value="Spa" />
              <span class="checkbox-box"></span>
              <span class="checkbox-content">
                <span class="cb-label">Spa & Wellness</span>
              </span>
            </label>
          </div>
        </div>

        <!-- METODE PEMBAYARAN -->
        <div class="form-card">
          <div class="card-header">
            <div class="card-icon">04</div>
            <div>
              <h3>Metode Pembayaran</h3>
              <p>Pilih cara pembayaran yang nyaman</p>
            </div>
          </div>

          <div class="radio-grid">
            <label class="radio-item">
              <input type="radio" name="metode_bayar" value="Transfer Bank" required />
              <span class="radio-box"></span>
              <span class="radio-content">
                <span class="rb-label">Transfer Bank</span>
                <span class="rb-sub">BCA, Mandiri, BNI, BRI</span>
              </span>
            </label>

            <label class="radio-item">
              <input type="radio" name="metode_bayar" value="Kartu Kredit" />
              <span class="radio-box"></span>
              <span class="radio-content">
                <span class="rb-label">Kartu Kredit</span>
                <span class="rb-sub">Visa, Mastercard, JCB</span>
              </span>
            </label>

            <label class="radio-item">
              <input type="radio" name="metode_bayar" value="E-Wallet" />
              <span class="radio-box"></span>
              <span class="radio-content">
                <span class="rb-label">E-Wallet</span>
                <span class="rb-sub">GoPay, OVO, DANA, ShopeePay</span>
              </span>
            </label>
          </div>
        </div>

        <!-- PERMINTAAN KHUSUS -->
        <div class="form-card">
          <div class="card-header">
            <div class="card-icon">05</div>
            <div>
              <h3>Permintaan Khusus</h3>
              <p>Beritahu kami kebutuhan spesial Anda</p>
            </div>
          </div>

          <div class="form-group full-width">
            <label for="catatan">Catatan Tambahan</label>
            <textarea id="catatan" name="catatan" rows="4"
              placeholder="Contoh: kamar di lantai atas, dekat lift, perayaan ulang tahun, alergi makanan tertentu, dsb..."></textarea>
          </div>
        </div>

        <!-- TOMBOL SUBMIT -->
        <div class="submit-area">
          <p class="submit-note">
            Dengan menekan tombol di bawah, Anda menyetujui syarat & ketentuan yang berlaku.
          </p>

          <button type="submit" class="btn-submit">
            <span>Konfirmasi Pemesanan</span>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2.5">
              <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
          </button>
        </div>

      </form>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-brand">
        <img src="logo.png" alt="Coer Hotel" class="footer-logo" />
        <p>
          Coer Hotel – Tempat di mana kemewahan<br/>
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

  <script>
    // Mengatur tanggal check-in dan check-out
    const today = new Date();
    const localToday = new Date(
      today.getTime() - today.getTimezoneOffset() * 60000
    ).toISOString().split('T')[0];

    document.getElementById('checkin').min = localToday;
    document.getElementById('checkout').min = localToday;

    document.getElementById('checkin').addEventListener('change', function() {
      const checkout = document.getElementById('checkout');
      checkout.min = this.value;

      if (checkout.value && checkout.value <= this.value) {
        checkout.value = '';
      }
    });

    // Memilih kamar dari kartu kamar
    function pilihKamar(tipe) {
      document.getElementById('tipe_kamar').value = tipe;
    }

    // Validasi formulir
    function validateForm() {
      const checkin = document.getElementById('checkin').value;
      const checkout = document.getElementById('checkout').value;

      if (checkin && checkout && checkin >= checkout) {
        alert('Tanggal check-out harus setelah tanggal check-in!');
        return false;
      }

      const radioChecked = document.querySelector(
        'input[name="metode_bayar"]:checked'
      );

      if (!radioChecked) {
        alert('Silakan pilih metode pembayaran!');
        return false;
      }

      return true;
    }

    // Scroll halus ke formulir
    document.querySelector('.hero-btn').addEventListener('click', function(e) {
      e.preventDefault();
      document.querySelector('#form-section').scrollIntoView({
        behavior: 'smooth'
      });
    });

    // Animasi kartu formulir ketika muncul
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('.form-card').forEach(card => {
      observer.observe(card);
    });
  </script>

</body>
</html>