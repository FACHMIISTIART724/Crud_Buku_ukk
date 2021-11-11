<?php
include('koneksi.php');
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Daftar Buku</title>
  <style type="text/css">
    * {
      font-family: "Poppins";
    }

    .tambah {
      position: relative;
      right: 500px;

    }

    .bg-cream {
      background-color: #E6DDC4;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color: #F0E9D2;">
  <div class="container">
    <br>
    <form action="" method="POST">
      <a href="logout.php" class="float-end btn btn-dark my-3">Logout</a>
    </form>
    <br>
    <h1 class="text-center">Daftar Buku</h1>
    <form class="d-flex" action="index.php" method="get">
      <input name="cari" class="form-control me-2" type="text" placeholder="Cari">
      <button class="btn btn-outline-dark" type="submit" value="cari">Search</button>
    </form><br><br>

    <?php echo "<h1>Selamat Datang" . "!" . "</h1>"; ?>
    <form action="" method="POST">
      <a href="index.php" class="btn btn-dark my-3">Back</a>
    </form>
    <?php if ($_SESSION['level'] != "User") { ?>
      <a href="tambah_buku.php" class="text-center btn btn-dark"> Tambah </a>
    <?php } else { ?>
      <br />
    <?php } ?>
    <div class="container my-3 mx-auto">
      <div class="row justify-content-evenly">
        <?php
        $query = "SELECT * FROM buku ORDER BY id ASC";
        $result = mysqli_query($koneksi, $query);
        if (!$result) {
          die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
        }
        ?>
        <?php
        if (isset($_GET['cari'])) {
          $cari = $_GET['cari'];
          $result = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul LIKE '%" . $cari . "%'");
        } else {
          $result = mysqli_query($koneksi, $query);
        }
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

          <div class="col-sm-3 shadow p-2 m-3 align-self-center rounded text-center bg-cream">
            <p class="h3 text-dark fw-bold"><?php echo $row['judul']; ?></p>
            <img src="gambar/<?php echo $row['gambar_buku']; ?>" style="width: 150px;height: 250px;" class="rounded mx-auto d-block">
            <br>
            <p class="h6 text-dark fw-600">Pengarang : <?php echo substr($row['pengarang'], 0, 20); ?></p>
            <p class="h6 text-dark fw-600">Penerbit : <?php echo substr($row['penerbit'], 0, 20); ?></p>
            <p class="h6 text-dark fw-600">Genre : <?php echo substr($row['genre'], 0, 20); ?></p>
            <?php if ($_SESSION['level'] != "User") { ?>
              <a href="edit_buku.php?id=<?php echo $row['id']; ?>" class="btn btn-dark rounded">Edit</a>
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-dark rounded" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
            <?php } else { ?>
              <br>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>