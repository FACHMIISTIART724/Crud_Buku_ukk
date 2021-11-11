<?php
include 'koneksi.php';

$judul   = $_POST['judul'];
$penerbit     = $_POST['penerbit'];
$pengarang    = $_POST['pengarang'];
$genre    = $_POST['genre'];
$gambar_buku = $_FILES['gambar_buku']['name'];


if ($gambar_buku != "") {
  $ekstensi_diperbolehkan = array('png', 'jpg');
  $x = explode('.', $gambar_buku);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_buku']['tmp_name'];
  $angka_acak     = rand(1, 999);
  $nama_gambar_baru = $angka_acak . '-' . $gambar_buku;
  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);

    $query = "INSERT INTO buku (judul, penerbit, pengarang, genre, gambar_buku) VALUES ('$judul', '$penerbit', '$pengarang', '$genre', '$nama_gambar_baru')";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {

      echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
    }
  } else {

    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
  }
} else {
  $query = "INSERT INTO buku (judul, penerbit, pengarang, genre, gambar_buku) VALUES ('$judul', '$penerbit', '$pengarang', '$genre', null)";
  $result = mysqli_query($koneksi, $query);

  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {

    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
  }
}
