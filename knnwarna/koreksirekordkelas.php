<!DOCTYPE html>
<html lang="en">
<head>
  <title>Koreksi Data Kelas Warna - SIM KNN Warna V.2025</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Koreksi Data Kelas Warna</h2>
  <?php
  include_once('koneksi.db.php');
  $IdData=mysqli_real_escape_string($koneksi,$_POST['IdData']);
  $sql1="SELECT * FROM `kelas` WHERE `IdKelas` = '".$IdData."'";
  $q1=mysqli_query($koneksi,$sql1);
  $r1=mysqli_fetch_array($q1);
  if (empty($r1)) {
    echo '<div class="alert alert-danger alert-dismissible" onclick="window.history.back(-2)">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Failed !</strong> Rekord tidak ditemukan !
</div>';
  exit();
  }
  ?>
  <form method="post">
    <input name="IdData" type="hidden" value="<?php echo $r1['IdKelas'];?>">
  <div class="form-group row">
    <label for="Kelas" class="col-4 col-form-label">Kelas</label> 
    <div class="col-8">
      <input id="Kelas" name="Kelas" type="text" class="form-control" required="required" value="<?php echo $r1['Kelas'];?>">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">💾 Simpan Rekord Koreksi</button>
      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal"> 🔎 Cari Rekord Kelas </button>
    </div>
  </div>
</form>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cari Rekord Data Kelas</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post">
  <div class="form-group row">
    <label for="IdData" class="col-4 col-form-label">Id. Data</label> 
    <div class="col-8">
      <input id="IdData" name="IdData" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="ksubmit" type="submit" class="btn btn-primary" formaction="koreksirekordkelas.php"> 🛠️ Koreksi</button>
      <button name="hsubmit" type="submit" class="btn btn-danger" formaction="hapusrekordkelas.php" onclick="return confirm('Apakah yakin akan menghapusnya ?')"> 🗑️ Hapus</button>
      </div>
    </div>
   </form>
   </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<?php
if (isset($_POST['submit'])) {
  include_once('koneksi.db.php');
  $IdData=mysqli_real_escape_string($koneksi,$_POST['IdData']);
  $Kelas=mysqli_real_escape_string($koneksi,$_POST['Kelas']);
  $sql="UPDATE `kelas` SET `Kelas`='".$Kelas."' WHERE `IdKelas`='".$IdData."'";
  $q=mysqli_query($koneksi,$sql);
  if ($q) {
    echo '<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href=\'inputdatakelas.php\';"></button>
  <strong>Success!</strong> Rekord berhasil disimpan !
</div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href=\'inputdatakelas.php\';"></button>
  <strong>Success!</strong> Rekord gagal disimpan !
</div>';
  }
}
?>
</div>
</body>
</html>