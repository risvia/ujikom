<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: thistle;
      }
	   h2 {
        text-transform: uppercase;
        color: thistle;
      }
	  h3 {
        text-transform: uppercase;
        color: thistle;
      }
	  h4 {
        text-transform: uppercase;
        color:thistle;
      }
	   h5 {
        text-transform: uppercase;
        color:thistle;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: thistle;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
	input {
          background-color: #ffff;
		  
           border: solid 1px thistle;
          padding: 10px;
          text-decoration:none;
          font-size: 12px;
    }
	button {
			width:auto;
          background-color: thistle;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
		  
    }
    </style>
  </head>
<body>

	<?php

  include ('header.php');
?>


    <center><h2>Data SPP</h2><center>
    <center><a href="tambah_spp.php">+ &nbsp; Tambah SPP</a><center>
    </form>
    <br>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Tahun</th>
          <th>Nominal</th>
          
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id

        if (isset($_POST['kata_kunci'])) {
            $kata_kunci=trim($_POST['kata_kunci']);
            $query="select * from spp where id_spp like '%".$kata_kunci."%' or tahun like '%".$kata_kunci."%' or nominal like '%".$kata_kunci."%' order by tahun asc";

        }else {
            $query="select * from spp order by tahun asc";
        }

      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['tahun']; ?></td>
          <td><?php echo substr($row['nominal'], 0, 20); ?></td>
          <td>
              <a href="edit_spp.php?id=<?php echo $row['id_spp']; ?>">Edit</a> |
              <a href="proses_hapusspp.php?id=<?php echo $row['id_spp']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
</body>
</html>