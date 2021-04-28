<?php 
session_start();
if(isset($_SESSION['login']) ) {
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Slip Pembayaran SPP</title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h3><b><br/>LAPORAN PEMBAYARAN SPP</b></h3>
	<br/>
	<hr/>
	<?php 
	$siswa = $koneksi->query("SELECT * FROM siswa WHERE nisn='$_GET[nisn]' ");
	$sw = mysqli_fetch_assoc($siswa);

	 ?>
	<table>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td> <?= $sw['nama'] ?></td>
		</tr>
		<tr>
			<td>Nisn </td>
			<td>:</td>
			<td> <?= $sw['nisn'] ?></td>
		</tr>
		<tr>
			<td>Kelas </td>
			<td>:</td>
			<td> <?= $sw['id_kelas'] ?></td>
		</tr>
	</table>
	<hr>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>ID Pembayaran</th>
		<th>NISN</th>
		<th>Tanggal Bayar</th>
		<th>Bulan Di Bayar</th>
		<th>Tahun Di Bayar</th>
		<th>Jumlah</th>
		<th>KETERANGAN</th>
	</tr>
	<?php 
	$pembayaran = $koneksi -> query("SELECT pembayaran.*,siswa.nisn,siswa.nama,siswa.kelas
							FROM pembayaran INNER JOIN siswa ON pembayaran.nisn=pembayaran.nisn
							WHERE id_pembayaran ='$_GET[id]'
							ORDER BY jumlah_bayar ASC");
	$i=1;
	$total = 0;
	while($dta=mysqli_fetch_array($pembayaran)) :
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['id_pembayaran'] ?></td>
		<td align="center"><?= $dta['nisn'] ?></td>
		<td align="center"><?= $dta['tgl_bayar'] ?></td>
		<td align="center"><?= $dta['bulan_dibayar'] ?></td>
		<td align="center"><?= $dta['tahun_dibayar'] ?></td>
		<td align="right"><?= $dta['jumlah'] ?></td>
		<td align="center"><?= $dta['ket'] ?></td>
	</tr>
	<?php $i++; ?>
	

<?php endwhile; ?>

	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Bandung , <?= date('d/m/y') ?> <br/>
				Operator,
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>


	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>


<?php 
} else {
	header("location : login.php");
}
?>