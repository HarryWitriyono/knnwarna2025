<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIM AI KNN Warna V. 2025 </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="tabeldatatraining.jpg" alt="Tabel Data Training" class="d-block" style="width:70%;height:300px;">
      <div class="carousel-caption">
        <h3>Tabel Training / Tabel Asal</h3>
        <p>Ini contoh tabel training yang kita pakai</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="tabeltesting.jpg" alt="Tabel Data Uji" class="d-block" style="width:70%;height:300px;">
      <div class="carousel-caption">
        <h3>Tabel Testing / Tabel Uji</h3>
        <p>Ini contoh tabel testing yang kita pakai</p>
      </div> 
    </div>
    <div class="carousel-item">
      <img src="hasiluji.jpg" alt="Tabel Hasil Prediksi" class="d-block" style="width:70%;height:300px;">
      <div class="carousel-caption">
        <h3>Tabel Hasil Prediksi</h3>
        <p>Ini hasil prediksinya</p>
      </div>  
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<div class="container-fluid mt-3">
  <h3>SIM AI KNN Warna Versi 2025.</h3>
  <?php include('grafik.php');?>
  <p>Berikut ini aplikasi SIM AI KNN Warna Versi 2025 berdasarkan artikel pada 
    <br> https://www.freecodecamp.org/news/k-nearest-neighbors-algorithm-classifiers-and-model-example/.<br>
    Source code lengkap bisa diunduh di Github saya : <br>
    https://github.com/HarryWitriyono/KNNBeasiswa<br>
    Informasi lebih lanjut silahkan email saya : <b>harrywitriyono@umb.ac.id</b><br>
    Atau kontak via WA : <b>+628153902534</b><br>
  </p>
</div>

</body>
</html>
