<?php
	session_start();
	include("../koneksi.php");
	if (@$_SESSION['username'] == "")
	{
		header("location:login.php?pesan=Belum Login");
		exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PERHITUNGAN | SMA N 3 BANTUL</title>

<!-- VENDOR CSS -->
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
  <link rel="stylesheet" href="../assets/vendor/chartist/css/chartist-custom.css">
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="../assets/css/main.css">
  <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  <link rel="stylesheet" href="../assets/css/demo.css">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
</head>

<body>
<div id="wrapper">
<!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="brand">
        <a href="index.html"><img src="../assets/img/logo.png" alt="Klorofil Logo" class="img-responsive logo"></a>
      </div>
      <div class="container-fluid">
        <div class="navbar-btn">
          <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Panduan Penggunaan</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="#">Tentang Aplikasi</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><?php echo $_SESSION['username']; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="ganti-password.php"><i class="lnr lnr-user"></i> <span>Ganti Password</span></a></li>
                <li><a href="../logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
      <div class="sidebar-scroll">
        <nav>
          <ul class="nav">
            <li><a href="admin.php" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
            <li><a href="alternatif.php" class=""><i class="lnr lnr-users"></i> <span>Alternatif</span></a></li>
            <li><a href="kriteria.php" class=""><i class="lnr lnr-list"></i> <span>Kriteria</span></a></li>
            <li><a href="detail-kriteria.php" class=""><i class="lnr lnr-layers"></i> <span>Detail Kriteria</span></a></li>
            <li><a href="alternatif-kriteria.php" class=""><i class="lnr lnr-pencil"></i> <span>Nilai Alternatif Kriteria</span></a></li>
            <li><a href="perhitungan.php" class="active"><i class="lnr lnr-chart-bars"></i> <span>Perhitungan</span></a></li>
            <li><a href="ganti-password.php" class=""><i class="lnr lnr-user"></i> <span>Admin</span></a></li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- konten-->
<div class="main">
  	<div class="main-content">
  		<div class="container-fluid">
                <div class="panel-body">
                	<input class="btn btn-success" type="button" value="Perhitungan" onclick="document.getElementById('perhitungan').style.display='block';"/>
					<a href="../laporan/cetak-perhitungan.php" class="btn btn-info" target="_BLANK"><i class="lnr lnr-printer"> </i> CETAK</a>
					 <br>
      <br>         	
  
  <tr>
    <td align="center" valign="top" >
<?php
	function tampiltabel($arr)
	{
	
		echo '<table class="table table-striped">';
		  for ($i=0;$i<count($arr);$i++)
		  {
		  echo '<tr>';
			  for ($j=0;$j<count($arr[$i]);$j++)
			  {
			    echo '<td>'.number_format($arr[$i][$j],2).'</td>';
			  }
		  echo '</tr>';
		  }
		echo '</table>';
		
	}

	function tampilbaris($arr)
	{
		
		echo '<table  class="table table-striped">';
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.number_format($arr[$i],2).'</td>';
			  }
		echo "</tr>";
		echo '</table>';
	}

	function tampilbaristeks($arr)
	{
		
		echo '<table  class="table table-striped">';
		echo '<tr>';
			  for ($i=0;$i<count($arr);$i++)
			  {
			    echo '<td>'.$arr[$i].'</td>';
			  }
		echo "</tr>";
		echo '</table>';
	}

	function tampilkolom($arr)
	{
		
		echo '<table  class="table table-striped">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.number_format($arr[$i],2).'</td>';
			echo "</tr>";
	   }
		echo '</table>';
	}

	function tampilkolomteks($arr)
	{
		
		echo '<table  class="table table-striped">';
	  for ($i=0;$i<count($arr);$i++)
	  {
			echo '<tr>';
			    echo '<td>'.$arr[$i].'</td>';
			echo "</tr>";
	   }
		echo '</table>';
	}
	
	$alternatif = array(); //array("alternatif");
	
	$queryalternatif = mysqli_query($db, "SELECT * FROM alternatif ORDER BY id_alternatif");
	$i=0;
	while ($dataalternatif = mysqli_fetch_array($queryalternatif))
	{
		$alternatif[$i] = $dataalternatif['nama_alternatif'];
		$i++;
	}
	
	$kriteria = array(); //array("nama kriteria");
	
	$tipe = array(); //array("tipe");
	
	$bobot = array(); //array("bobot");
	
	$querykriteria = mysqli_query($db, "SELECT * FROM kriteria ORDER BY id_kriteria");
	$i=0;
	while ($datakriteria = mysqli_fetch_array($querykriteria))
	{
		$kriteria[$i] = $datakriteria['nama_kriteria'];
		$tipe[$i] = $datakriteria['tipe'];
		$bobot[$i] = $datakriteria['bobot'];
		$i++;
	}
	
	$alternatifkriteria = array();
	
	$queryalternatif = mysqli_query($db, "SELECT * FROM alternatif ORDER BY id_alternatif");
	$i=0;
	while ($dataalternatif = mysqli_fetch_array($queryalternatif))
	{
		$querykriteria = mysqli_query($db, "SELECT * FROM kriteria ORDER BY id_kriteria");
		$j=0;
		while ($datakriteria = mysqli_fetch_array($querykriteria))
		{
			$queryalternatifkriteria = mysqli_query($db, "SELECT * FROM alternatif_kriteria WHERE id_alternatif = '$dataalternatif[id_alternatif]' AND id_kriteria = '$datakriteria[id_kriteria]'");
			$dataalternatifkriteria = mysqli_fetch_array($queryalternatifkriteria);
			
			$alternatifkriteria[$i][$j] = $dataalternatifkriteria['nilai'];
			$j++;
		}
		$i++;
	}
	
	$pembagi = array();
	
	for ($i=0;$i<count($kriteria);$i++)
	{
		$pembagi[$i] = 0;
	
		for ($j=0;$j<count($alternatif);$j++)
		{
			$pembagi[$i] = $pembagi[$i] + ($alternatifkriteria[$j][$i] * $alternatifkriteria[$j][$i]);
		}
		
		$pembagi[$i] = sqrt($pembagi[$i]);
		
	}
	
	$normalisasi = array();
	
	for ($i=0;$i<count($alternatif);$i++)
	{
		for ($j=0;$j<count($kriteria);$j++)
		{
			$normalisasi[$i][$j] = $alternatifkriteria[$i][$j] / $pembagi[$j];
		}
	}
	
	$optimasi = array();
	
	for ($i=0;$i<count($alternatif);$i++)
	{
		$optimasi[$i] = 0;
		for ($j=0;$j<count($kriteria);$j++)
		{
			if ($tipe[$j] == "cost") {
				$optimasi[$i] = $optimasi[$i] - ($normalisasi[$i][$j] * $bobot[$j]);
			} else { //if ($tipe[$j] == "benefit") {
				$optimasi[$i] = $optimasi[$i] + ($normalisasi[$i][$j] * $bobot[$j]);				
			}
		}
	}
	
	$alternatifrangking = array();
	$optimasirangking = array();
	
	for ($i=0;$i<count($alternatif);$i++)
	{
		$optimasirangking[$i] = $optimasi[$i];
		$alternatifrangking[$i] = $alternatif[$i];
	}
	
	for ($i=0;$i<count($alternatif);$i++)
	{
		for ($j=$i;$j<count($alternatif);$j++)
		{
			if ($optimasirangking[$j] > $optimasirangking[$i])
			{
				$tmphasil = $optimasirangking[$i];
				$tmpalternatif = $alternatifrangking[$i];
				$optimasirangking[$i] = $optimasirangking[$j];
				$alternatifrangking[$i] = $alternatifrangking[$j];
				$optimasirangking[$j] = $tmphasil;
				$alternatifrangking[$j] = $tmpalternatif;
			}
		}
	}
?>

<div id="perhitungan" style="display:none;">
<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
			<h5>1. Data Alternatif</h5>
				<div class="panel-body">
					<?php tampilkolomteks($alternatif); ?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h5>2. Data Kriteria</h5>
					<div class="panel-body">
						<?php tampilbaristeks($kriteria); ?>
					</div>
			
			
					<div class="panel-body">
						<?php tampilbaristeks($tipe); ?>
					</div>
			
			
				
					<div class="panel-body">
						<?php tampilbaris($bobot); ?>
					</div>
			</div>
		</div>		
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
			<h5>5. Tabel Nilai Alternatif Kriteria</h5>
				<div class="panel-body">
					<?php tampiltabel($alternatifkriteria); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
			<h5>6. Pembagi</h5>
				<div class="panel-body">
					<?php tampilbaris($pembagi); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
			<h5>7. Normalisasi</h5>
				<div class="panel-body">
					<?php tampiltabel($normalisasi); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
			<h5>8. Optimasi</h5>
				<div class="panel-body">
					<?php tampilkolom($optimasi); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
			<h5>9. Hasil Ranking</h5>
				<div class="panel-body">
					<?php tampilkolom($optimasirangking); ?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h5>10. Alternatif Ranking</h5>
					<div class="panel-body">
						<?php tampilkolomteks($alternatifrangking); ?>
					</div>
			</div>
		</div>				
	</div>
</div>

<br />

</div>
<div class="row">
	<div class="col-md-6">
		<!-- TABLE STRIPED -->
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title">Hasil Ranking</h3>
			</div>
			<div class="panel-body">
		
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Ranking</th>
						<th>Alternatif</th>
						<th>Nilai Optimasi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						for ($i=0;$i<count($optimasirangking);$i++)
						{	
					?>
						<tr>
							<td><?php echo ($i+1); ?></td>
							<td><?php echo $alternatifrangking[$i]; ?></td>
							<td><?php echo number_format($optimasirangking[$i],2); ?></td>
						</tr>
					<?php
						}
					?>
					</table>
					<br />
					<br />
					Guru terbaik adalah <b> <?php echo $alternatifrangking[0]; ?> </b> dengan Nilai <b> <?php echo number_format($optimasirangking[0],2); ?> </b>
				</tbody>
			</table>
			</div>
		</div>
		<!-- END TABLE STRIPED -->
	</div>		
                
   		</div>
	</div>
</div>


  
    <!-- end konten-->
</div>
<footer>
			<div class="container-fluid">
				<p class="copyright">Sistem Penilaian Guru Berprestasi | SMA N 3 BANTUL</p>
			</div>
		</footer>
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
  <script src="../assets/vendor/chartist/js/chartist.min.js"></script>
  <script src="../assets/scripts/klorofil-common.js"></script>

</body>
</html>