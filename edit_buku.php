 <?php
  include 'koneksi.php';

  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT * FROM buku WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
      die("Query Error: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);

    if (!count($data)) {
      echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
    }
  } else {

    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }
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
       border-bottom-left-radius: 20px
     }
   </style>
 </head>

 <body>
   <center>
     <h1>Edit Buku <?php echo $data['judul']; ?></h1>
     <center>
       <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
         <section class="base">

           <input name="id" value="<?php echo $data['id']; ?>" hidden />
           <div>
             <label>Nama buku</label>
             <input type="text" name="judul" value="<?php echo $data['judul']; ?>" autofocus="" required="" />
           </div>
           <div>
             <label>Penerbit</label>
             <input type="text" name="penerbit" autofocus="" required="" value="<?php echo $data['penerbit']; ?>" />
             <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
           </div>
           <div>
             <label>Pengarang</label>
             <input type="text" name="pengarang" required="" value="<?php echo $data['pengarang']; ?>" />
           </div>
           <div>
             <label>Genre</label>
             <input type="text" name="genre" required="" value="<?php echo $data['genre']; ?>" />
           </div>
           <div>
             <label>Gambar Buku</label>
             <input type="file" name="gambar_buku" />
             <i style="float: left;font-size: 11px;color: red"><br></i>
           </div>
           <div>
             <button type="submit">Simpan</button>
           </div>
         </section>
       </form>
 </body>

 </html>