
<?php
  require_once("head.php");
  require_once("../koneksi.php");

if ( isset($_POST["submitpengajuan"]) ) {

// menangkap data yang di kirim dari form
  $id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$pekerjaan = $_POST['pekerjaan'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$sapras = $_POST['sapras'];
$jumlah_pinjam = $_POST['jumlah_pinjam'];
$tgl_minjam = $_POST['tgl_minjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$keperluan = $_POST['keperluan'];

$ekstensi_boleh =  array('pdf','docx');
$surat_pengantar = $_FILES['file']['name'];
$x = explode('.', $surat_pengantar);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];
 
if(in_array($ekstensi,$ekstensi_boleh) === true ){
  if($ukuran < 10440000755){
    move_uploaded_file($file_tmp,'../admin/file/'.$surat_pengantar);

    $result = mysqli_query($koneksi,"SELECT jumlah FROM prasarana WHERE sapras = '$sapras'");
      $jumlahada = mysqli_fetch_array($result);
      if($jumlah_pinjam > $jumlahada['jumlah']){
        echo '<script type="text/javascript">window.location="form_daftar_pengajuan.php?pesan=jumlah";</script>';;
                    return false;
      }

    $query = mysqli_query($koneksi,"INSERT INTO tb_daftarpengajuan (id_user,nama,pekerjaan,no_hp,alamat,sapras,jumlah_pinjam,tgl_minjam,tgl_kembali,keperluan,surat_pengantar) VALUES(
                    '$id_user',     
                    '$nama',
                    '$pekerjaan',                    
                    '$no_hp',
                    '$alamat',
                    '$sapras',
                    '$jumlah_pinjam',
                    '$tgl_minjam',
                    '$tgl_kembali',
                    '$keperluan',
                    '$surat_pengantar'
                  )");
// notif berhasil
 if($query){
  echo '<script type="text/javascript">window.location="contoh.php?pesan=simpan";</script>'; 

   }else{
      echo '<script>alert("Data gagal disimpan"); window.location=" ";</script>';
    }
    
 }else{
  echo '<script type="text/javascript">window.location="contoh.php?pesan=foto";</script>';
 }
}else{
  echo '<script type="text/javascript">window.location="contoh.php?pesan=ekstensi";</script>';
}
}
 
?>
 <?php 
 if(isset($_GET['pesan'])){
      if($_GET['pesan']=="jumlah"){
        ?>
          <script src="../js/sweetalert.min.js"></script>
          <script type="text/javascript">
            function alert1(){
              swal("Jumlah Beli Anda Lebih banyak dari Jumlah yang ada!", "Klik OK!", "warning");
            } alert1();
          </script>
        <?php 
      }
    }
    if(isset($_GET['pesan'])){
      if($_GET['pesan']=="ekstensi"){
        ?>
          <script src="../js/sweetalert.min.js"></script>
          <script type="text/javascript">
            function alert1(){
              swal("Ekstensi File Tidak Diperbolehkan!", "Klik OK!", "warning");
            } alert1();
          </script>
        <?php 
      }
    }
    if(isset($_GET['pesan'])){
      if($_GET['pesan']=="foto"){
        ?>
          <script src="../js/sweetalert.min.js"></script>
          <script type="text/javascript">
            function alert1(){
              swal("Ukuran Foto Terlalu Besar!", "Klik OK!", "warning");
            } alert1();
          </script>
        <?php 
      }
    }
     ?>
 <br>
 <br>
 <br>


<div class="container">

    <form action="form_daftar_pengajuan.php" method="post" enctype="multipart/form-data">

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <h2 class="card-title text-center"><i class="fas fa-plus"></i> INPUT DATA PENGAJUAN</h2>
                </div>
                <div class="card-body">
                  
          <div class="row">
        <div class="col"><br>
          
          <div class="form-group">
            <label>NAMA LENGKAP ANDA</label>
            <input type="text" class="form-control" name="nama">
            </div><br>

          <div class="form-group">
            <label>PEKERJAAN</label>
            <input type="text" class="form-control" name="pekerjaan">
            </div><br>

          <div class="form-group">
            <label>NO TELEPON</label>
            <input type="number"  class="form-control" name="no_hp">
          </div><br>

          <div class="form-group">
            <label>ALAMAT</label>
            <input type="text" name="alamat" class="form-control">
          </div><br>

          <div class="form-group">
            <label>PRASARANA/SARANA</label>
             <select name="sapras" class="form-control" onchange='changeValue(this.value)'>
                <option>-PILIH-</option>
                <?php 
                    $datasapras = mysqli_query($koneksi, "SELECT * FROM prasarana ORDER BY sapras ASC");
                                $kondisi  = "var kondisi = new Array();\n;";
                                $jumlah  = "var jumlah = new Array();\n;";

                                while($data = mysqli_fetch_array($datasapras)) {
                                  ?>
                                <option name="sapras" value="<?= $data['sapras'] ?>"><?= $data['sapras'] ?></option>

                                <?php 
                                  $kondisi .= "kondisi['" .$data['sapras']. "'] = {kondisi:'" . addslashes($data['kondisi'])."'};\n";
                                  $jumlah .= "jumlah['" .$data['sapras']. "'] = {jumlah:'" . addslashes($data['jumlah'])."'};\n";
                                 ?>

                    <?php 
                    }
                     ?>
              </select>
          </div><br>

          <div class="form-group">
            <label>JUMLAH MEMINJAM</label>
            <input type="number" name="jumlah_pinjam" class="form-control">
          </div><br>

          <div class="form-group">
            <label>TANGGAL MEMINJAM</label>
            <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" name="tgl_minjam">
          </div><br>  

          <div class="form-group">
            <label>TANGGAL KEMBALI</label>
            <input type="date" class="form-control" name="tgl_kembali">
          </div><br>

          <div class="form-group">
            <label>KEPERLUAN</label>
            <input type="text" class="form-control" name="keperluan">
          </div><br>

        <div class="form-group">
            <label>UPLOAD FILE SURAT PENGANTAR</label>
            <input type="file" name="file" class="form-control" required="required">
            <p style="color: red">Ekstensi yang diperbolehkan hanya dalam bentuk .pdf | .docx</p>
        </div><br> 
<input type="hidden" class="form-control" name="id_user" value="<?php echo $user_row['id_user']; ?>"/>
        </div>

          </div>
           <div>
          <button type="button" class="btn btn-secondary"><a style="color: white;" id="log" href="index_user.php"><i class="fas fa-arrow-left"></i> Kembali</a></button>
          <button type="submit" name="submitpengajuan" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
        </div>
        </div>
      </div>
        </div>
        </div>
      </div>
    </div>
    </form>
</div> <!-- akhir container -->


<script type="text/javascript">
    <?php 
    echo $kondisi;
    echo $jumlah;
     ?>

     function changeValue(id){
      document.getElementById('kondisi').value = kondisi[id].kondisi;
      document.getElementById('jumlah').value = jumlah[id].jumlah;

     }


  </script>


<?php
  require_once("foot.php");
?>