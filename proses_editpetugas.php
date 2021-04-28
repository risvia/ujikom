
<?php
include 'koneksi.php';
  $id = $_POST['id'];

  $username     = $_POST['username'];
  $password     = $_POST['password'];
  $nama_petugas     = $_POST['nama_petugas'];
  $level     = $_POST['level'];                
                  $query  = "UPDATE petugas SET username ='$username', password = '$password', nama_petugas = '$nama_petugas', level = '$level' WHERE id_petugas = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      echo "<script>alert('Data berhasil diubah.');window.location='petugas.php';</script>";
                    }
                    
        ?>