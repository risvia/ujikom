<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM siswa WHERE nisn='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='siswa.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='siswa.php';</script>";
  }         
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
    h5 {
        text-transform: uppercase;
        color:#999999;
      }
    button {
          background-color: thistle;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
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
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    a {
          background-color: salmon;
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
      <center>
  
        <h2>Edit Siswa</h2>
      <center>
      <form method="POST" action="proses_editsiswa.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
         <label>NISN</label>
        <input name="nisn" value="<?php echo $data['nisn']; ?>" required=""/>
        </div>
        <div>
           <label>NIS</label>
        <input name="nis" value="<?php echo $data['nis']; ?>" required=""/>
        </div>
        <div>
           <label>Nama</label>
        <input name="nama" value="<?php echo $data['nama']; ?>"/>
        </div>
       <div>
         <label>Id Kelas</label>
         <input name="id_kelas" value="<?php echo $data['id_kelas']; ?>"/>
      </div>
        <div>
           <label>Alamat</label>
        <input name="alamat" value="<?php echo $data['alamat']; ?>"/>
      </div>
        <div>
           <label>No Telp</label>
        <input name="no_telp" value="<?php echo $data['no_telp']; ?>"/>
      </div>
         
        <div>
         <label>Id Spp</label>
          <input name="id_spp" value="<?php echo $data['id_spp']; ?>"/>
      </div>
        
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  
  
</body>
</html>