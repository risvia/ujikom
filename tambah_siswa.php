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
  
        <h2>Tambah Siswa</h2>
      <center>
      <form method="POST" action="proses_tambahsiswa.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
         <label>NISN</label>
        <input type="text" name="nisn"  required=""/>
        </div>
        <div>
           <label>NIS</label>
        <input type="text" name="nis"  required=""/>
        </div>
        <div>
           <label>Nama</label>
        <input type="text" name="nama" required=""/>
        </div>
       <div>
         <label>Id Kelas</label>
         <input type="text" name="id_kelas"  required=""/>
      </div>
        <div>
           <label>Alamat</label>
        <input type="text" name="alamat"  required=""/>
      </div>
        <div>
           <label>No Telp</label>
        <input type="text"  name="no_telp"  required=""/>
      </div>
         
        <div>
         <label>Id Spp</label>
          <input type="text" name="id_spp"required=""/>     
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  
  
</body>
</html>