<?php
include 'koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$pengarang = $_POST['pengarang'];
$genre = $_POST['genre'];
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


    $query  = "UPDATE buku SET judul = '$judul', penerbit = '$penerbit', pengarang = '$pengarang', genre = '$genre', gambar_buku = '$nama_gambar_baru'";
    $query .= "WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
      die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    } else {

      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }
  } else {
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
  }
} else {
  $query  = "UPDATE buku SET judul = '$judul', penerbit = '$penerbit', pengarang = '$pengarang', genre = '$genre'";
  $query .= "WHERE id = '$id'";
  $result = mysqli_query($koneksi, $query);
  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
      " - " . mysqli_error($koneksi));
  } else {

    echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
  }
}
