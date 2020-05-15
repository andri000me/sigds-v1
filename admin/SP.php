<?php
session_start();
	if(empty($_SESSION['login'])){
		header('location:../login.php');
	}
?>
<html>
<head>
<title>GDS SMK Negeri 1 Ciomas</title>
<link rel="stylesheet" href="../css/sp.css" type="text/css">
</head>

<body>
	<div class="bungkus">
		<div class="header">
			<ul>
			  <li><a href="indexadmin.php">Beranda</a></li>
			  <li><a href="tatatertibadmin.php">Tata Tertib</a></li>
			  <li><a href="entripelanggaran.php">Entri Pelanggaran</a></li>
			  <li class="active"><a href="SP.php">SP</a></li>
			  <li><a href="naikkelas.php">KK</a></li>
			  <li><a href="logout.php">Logout</a></li>
			</ul>
			<h3 style="float:right; text-align:center; margin:-43px 20px 0 0;">
			Gerakan Disiplin Sekolah<br>SMK Negeri 1 Ciomas</h3>
			<img src="../images/baru.png" width="auto" height="70px" style="float:left; margin:-55px 0 0 740px;">
			
			<h1 class="h"><a href="sp.php">Surat <span>Peringatan</span></a></h1>
		</div>
		<div class="content">		
		<h2 style="margin-top:10px;">Daftar Siswa</h2>
			<form method="post">
		<input class="cari"type="text" name="cari" placeholder="Masukkan nama...">
		<input class="enjoy-css" type="submit" name="kirim" value="Search">
				</form>
	<?php
		if(isset($_POST['kirim'])){
			$nama = $_POST['cari'];

			if($nama==''){
				echo 'Belum Memasukkan Nama, silahkan kembali';
			}

			else{
			include '../koneksi.php';
			$nama = $_POST['cari'];
			$sql = "select * from siswa where nama like '%$nama%' and point<=50";
			$query = mysql_query($sql);

			echo "<center>";
			echo "<h2>Hasil Pencarian</h2>";
			echo "<table class='bordered'>";
			echo "<thead>";
			echo "<th>NISN</th>";
			echo "<th>Nama</th>";
			echo "<th>Kelas</th>";
			echo "<th>Jurusan</th>";
			echo "<th>Nama Orang Tua</th>";
			echo "<th>Alamat</th>";
			echo "<th>No HP</th>";
			echo "<th>Point</th>";
			echo "<th>Print</th>";
			echo "</thead>";

			while($data=mysql_fetch_assoc($query)){
			echo'
				<tr>
				<td>'.$data['nisn'].'</td>
				<td>'.$data['nama'].'</td>
				<td>'.$data['kelas'].'</td>
				<td>'.$data['jurusan'].'</td>
				<td>'.$data['namaortu'].'</td>
				<td>'.$data['alamat'].'</td>
				<td>'.$data['nohp'].'</td>
				<td>'.$data['point'].'</td>
				<td><a href="surat.php?nisn='.$data['nisn'].'" style="text-decoration: none; color:#76a0b0;">Print</a></td>
				</tr>';
			   }
				echo '</table>';

			}
		}
	?>
		
		<table class="bordered">
		<thead>
			<th>NISN</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>Orang Tua</th>
			<th>Alamat</th>
			<th>Nomor HP</th>
			<th>Point</th>
			<th>Print</th>
		</thead>

		<tbody>
		<?php
		include '../koneksi.php';
		$sql = "select * from siswa where point <=50";
		$query = mysql_query($sql);
		while ($data = mysql_fetch_assoc($query)){
			?>
			<tr>
				<td><?php echo $data['nisn']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['kelas']; ?></td>
				<td><?php echo $data['jurusan'];  ?></td>
				<td><?php echo $data['namaortu']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['nohp']; ?></td>
				<td><?php echo $data['point']; ?></td>
				<td><a href="surat.php?nisn=<?php echo $data['nisn'];?>">Print</a></td>
			</tr>
		<?php
		}
		?>
		</tbody>
		</table>

		</div>
	</div>
</body>
</html>