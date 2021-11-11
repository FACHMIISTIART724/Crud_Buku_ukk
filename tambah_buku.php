<?php
include('koneksi.php');

?>
<!DOCTYPE html>
<html>

<head>
  <title>CRUD Fachmi</title>
  <style type="text/css">
    * {
      font-family: "Poppins";
    }

    h1 {
      text-transform: uppercase;
      color: #181D31;
    }

    button {
      background-color: #181D31;
      color: #F0E9D2;
      padding: 17px;
      width: 100%;
      text-decoration: none;
      font-size: 12px;
      border: 0px;
      margin-top: 20px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
      border-bottom-left-radius: 10px
    }

    body {
      background-color: #F0E9D2;
    }

    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;

    }

    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #181D31;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
      border-bottom-left-radius: 10px
    }

    div {
      width: 100%;
      height: auto;
    }

    .base {
      width: 700px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #E6DDC4;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
      border-bottom-left-radius: 20px;
      box-shadow: 2px 2px 2px (0, 0, 0, 0.8);
      ;
    }
  </style>
</head>

<body>
  <center>
    <h1>Tambah Produk</h1>
    <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
        <section class="base">
          <div>
            <label>Judul</label>
            <input type="text" name="judul" autofocus="" required="" />
          </div>
          <div>
            <label>Penerbit</label>
            <input type="text" name="penerbit" />
          </div>
          <div>
            <label>Pengarang</label>
            <input type="text" name="pengarang" required="" />
          </div>
          <div>
            <label>Genre</label>
            <input type="text" name="genre" required="" />
          </div>
          <div>
            <label>Gambar Buku</label>
            <input type="file" name="gambar_buku" required="" />
          </div>
          <div>
            <button type="submit">Simpan</button>
          </div>
        </section>
      </form>
</body>

</html>