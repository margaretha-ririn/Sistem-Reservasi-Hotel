<?php
session_start();
require_once 'koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: index.php');
        exit;
    }

    function bersihkan($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    $nama_lengkap  = bersihkan($_POST['nama_lengkap']  ?? '');
    $email         = bersihkan($_POST['email']         ?? '');
    $no_telepon    = bersihkan($_POST['no_telepon']    ?? '');
    $alamat        = bersihkan($_POST['alamat']        ?? '');
    $no_identitas  = bersihkan($_POST['no_identitas']  ?? '');
    $tipe_kamar    = bersihkan($_POST['tipe_kamar']    ?? '');
    $jumlah_tamu   = intval($_POST['jumlah_tamu']      ?? 0);
    $checkin       = bersihkan($_POST['checkin']       ?? '');
    $checkout      = bersihkan($_POST['checkout']      ?? '');
    $metode_bayar  = bersihkan($_POST['metode_bayar']  ?? '');
    $catatan       = bersihkan($_POST['catatan']       ?? '');

    $fasilitas_arr  = $_POST['fasilitas'] ?? [];
    $f_sarapan      = in_array('Sarapan',      $fasilitas_arr) ? 1 : 0;
    $f_wifi         = in_array('WiFi',         $fasilitas_arr) ? 1 : 0;
    $f_antar_jemput = in_array('Antar Jemput', $fasilitas_arr) ? 1 : 0;
    $f_kolam_renang = in_array('Kolam Renang', $fasilitas_arr) ? 1 : 0;
    $f_gym          = in_array('Gym',          $fasilitas_arr) ? 1 : 0;
    $f_spa          = in_array('Spa',          $fasilitas_arr) ? 1 : 0;

    $fasilitas_list = implode(', ', array_filter([
    $f_sarapan      ? 'Sarapan'      : '',
    $f_wifi         ? 'WiFi'         : '',
    $f_antar_jemput ? 'Antar Jemput' : '',
    $f_kolam_renang ? 'Kolam Renang' : '',
    $f_gym          ? 'Gym'          : '',
    $f_spa          ? 'Spa'          : '',
    ]));

    $errors = [];
    if (empty($nama_lengkap))  $errors[] = 'Nama lengkap wajib diisi.';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email tidak valid.';
    if (empty($no_telepon))    $errors[] = 'Nomor telepon wajib diisi.';
    if (empty($alamat))        $errors[] = 'Alamat wajib diisi.';
    if (empty($no_identitas))  $errors[] = 'Nomor identitas wajib diisi.';
    if (empty($tipe_kamar))    $errors[] = 'Tipe kamar wajib dipilih.';
    if ($jumlah_tamu < 1)      $errors[] = 'Jumlah tamu tidak valid.';
    if (empty($checkin))       $errors[] = 'Tanggal check-in wajib diisi.';
    if (empty($checkout))      $errors[] = 'Tanggal check-out wajib diisi.';
    if (empty($metode_bayar))  $errors[] = 'Metode pembayaran wajib dipilih.';

    if (!empty($checkin) && !empty($checkout)) {
        if (strtotime($checkout) <= strtotime($checkin)) {
            $errors[] = 'Tanggal check-out harus setelah tanggal check-in.';
        }
    }

    if (!empty($errors)) {
        $_SESSION['error_msg'] = implode('<br>', $errors);
        header('Location: error.php');
        exit;
    }

    $sql = "INSERT INTO pemesanan 
            (nama_lengkap, email, nomor_telepon, alamat_lengkap, nomor_identitas,
            tipe_kamar, jumlah_tamu, tgl_checkin, tgl_checkout,
            sarapan, wifi, antar_jemput,
            kolam_renang, gym, spa,
            metode_pembayaran, permintaan_khusus)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $sql);

    if (!$stmt) {
        $_SESSION['error_msg'] = 'Persiapan query gagal: ' . mysqli_error($koneksi);
        header('Location: error.php');
        exit;
    }

    mysqli_stmt_bind_param($stmt, 'ssssssissiiiiiiss',
        $nama_lengkap, $email, $no_telepon, $alamat, $no_identitas,
        $tipe_kamar, $jumlah_tamu, $checkin, $checkout,
        $f_sarapan, $f_wifi, $f_antar_jemput, $f_kolam_renang, $f_gym, $f_spa,
        $metode_bayar, $catatan
    );

    $hasil = mysqli_stmt_execute($stmt);

    if ($hasil) {
        $_SESSION['booking'] = [
            'nama_lengkap' => $nama_lengkap,
            'email'        => $email,
            'no_telepon'   => $no_telepon,
            'alamat'       => $alamat,
            'no_identitas' => $no_identitas,
            'tipe_kamar'   => $tipe_kamar,
            'jumlah_tamu'  => $jumlah_tamu,
            'checkin'      => $checkin,
            'checkout'     => $checkout,
            'fasilitas'    => $fasilitas_list,
            'metode_bayar' => $metode_bayar,
            'catatan'      => $catatan,
        ];
        mysqli_stmt_close($stmt);
        mysqli_close($koneksi);
        header('Location: konfirmasi.php');
        exit;
    } else {
        $err_detail = mysqli_stmt_error($stmt) . ' | errno: ' . mysqli_stmt_errno($stmt) . ' | SQL: ' . $sql;
        $_SESSION['error_msg'] = 'Terjadi kesalahan, data gagal disimpan. Detail: ' . $err_detail;
        mysqli_stmt_close($stmt);
        mysqli_close($koneksi);
        header('Location: error.php');
        exit;
    }
?>