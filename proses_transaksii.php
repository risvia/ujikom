<?php 
session_start();
if(isset($_SESSION['login']) ) {
	include 'koneksi.php';
	if($_GET['act']=='cetak') {
		$idpembayaran = $_GET['id'];
		$nisn  = $_GET['nisn'];

		$today =date("ymd");
		$query =mysqli_query($konek , "SELECT max(id_pembayaran) AS last FROM pembayaran WHERE id_pembayaran LIKE '$today%'");
		$data = mysqli_fetch_assoc($query);
		$lastNobayar = $data['last'];
		$lastNoUrut  = substr($lastNobayar, 6 ,4);
		$nextNobayar = $today.sprintf('%04s' , $nextNoUrut);

		
		$tglbayar = date('Y-m-d');

		
		$admin = $_SESSION['id'];

		$cetak = mysqli_query($konek ,"UPDATE pembayaran SET 
			id_pembayaran = '$nextid_pembayaran',
			tglbayar = '$tglbayar',
			ket = 'LUNAS',
			idadmin = '$admin' 
			WHERE idpembayaran = '$idpembayaran'");

		if ($cetak) {
			
			header('location: cetak_slip_transaksi.php?nsin=nisn);
		}else {
			echo "
			<script>
			alert('gagal')
			</script>
			";

		}
		
	}
	else if($_GET['act']=='batal'){
	    $idpembayaran = $_GET['id'];
		$nisn   = $_GET['nisn'];

		$batal = mysqli_query($konek ,"UPDATE pembayaran SET 
			id_pembayaran = null,
			tglbayar = null,
			ket = null,
			idadmin = null 
			WHERE id_pembayaran = '$id_pembayaran'");

			if ($batal) {
				header('location: transaksi.php?nisn=nisn);
		}
	}
}
 ?>