<!DOCTYPE html>
<html lang="en">
<head>
  <title>Perhitungan - SIM AI KNN Warna V.2025</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Perhitungan Algoritma K - Nearest Neighbourhood :</h2>
  <p>Berikut ini hasil perhitungan Jarak Euclidean :</p>    
  <?php include_once('koneksi.db.php');
    $IdData=mysqli_real_escape_string($koneksi,$_GET['IdData']);
    $sqlu="select * from datauji where IdData='".$IdData."'";
    $qu=mysqli_query($koneksi,$sqlu);
    $ru=mysqli_fetch_array($qu);
    $KecerahanUji=$ru['Kecerahan']; //ambil kecerahan uji dulu
    $KejenuhanUji=$ru['Kejenuhan']; //ambil kejenuhan ujinya
    $K=$ru['K']; //ambil nilai K / jumlah tetangga yang akan diperhitungkan 
    $sqlt="select * from datatraining"; //persiapan sql untuk semua data training
    $qt=mysqli_query($koneksi,$sqlt);
    $rt=mysqli_fetch_array($qt);  //ambil semua rekordnya
    do {
        //hitung jaraknya
        $j=((($KecerahanUji-$rt['Kecerahan'])**2)+(($KejenuhanUji-$rt['Kejenuhan'])**2))**(1/2);
        $sqlp="insert into perhitungan (IdData,Kecerahan,Kejenuhan,Jarak,Kelas) values ('".$IdData."','".$rt['Kecerahan']."','".$rt['Kejenuhan']."','".$j."','".$rt['Kelas']."')";
        $qp=mysqli_query($koneksi,$sqlp);
        if ($qp) echo "Jarak ".@$n++." Kecerahan Uji : ".$KecerahanUji.
        "Kejenuhan Uji: ".$KejenuhanUji." Kecerahan t: ".$rt['Kecerahan']." Kejenuhan t: ".$rt['Kejenuhan']." Jarak = ".$j." berhasil dihitung !<br>";
    }while($rt=mysqli_fetch_array($qt));
  ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Jarak</th>
        <th>Kelas</th>
      </tr>
    </thead>
    <tbody>
      <?php $sqltp="select * from perhitungan where IdData='".$IdData."' order by Jarak ASC";
      $qtp=mysqli_query($koneksi,$sqltp);
      $rtp=mysqli_fetch_array($qtp);$n=0;
      do { ?>  
      <tr>
        <td><?php echo $rtp['Jarak'];?></td>
        <td><?php echo $rtp['Kelas'];?></td>
      </tr>
      <?php 
      $sqlh="INSERT INTO `hasil`(`IdData`, `Jarak`, `Kelas`) VALUES ('".$IdData."','".$rtp['Jarak']."','".$rtp['Kelas']."')";
       $qh=mysqli_query($koneksi,$sqlh);
       $n++;
       if($n>=$K) break;
    }while($rtp=mysqli_fetch_array($qtp)); 
    $sqlkesimpulan="SELECT *,count(kelas) as jumlahtetangga FROM `hasil` GROUP by Kelas;";
    $qkesimpulan=mysqli_query($koneksi,$sqlkesimpulan);
    $rkesimpulan=mysqli_fetch_array($qkesimpulan);
    do {
    $sqluh="update hasil set Jumlah=".$rkesimpulan['jumlahtetangga']." WHERE IdData='".$IdData."' and Kelas='".$rkesimpulan['Kelas']."'";
    $quh=mysqli_query($koneksi,$sqluh);
    }while($rkesimpulan=mysqli_fetch_array($qkesimpulan));
    $sqlmaxh="select Kelas,max(Jumlah) as Jumlah from hasil where IdData='".$IdData."'";
    $qmaxh=mysqli_query($koneksi,$sqlmaxh);
    $rmaxh=mysqli_fetch_array($qmaxh);
    echo "Hasil prediksi Kelas Baru  = ".$rmaxh['Kelas'];
    $sqluuji="UPDATE datauji set Kelas='".$rmaxh['Kelas']."' WHERE IdData='".$IdData."'";
    $quuji=mysqli_query($koneksi,$sqluuji);
    ?>
    </tbody>
  </table>
  
</div>

</body>
</html>