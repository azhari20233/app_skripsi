
<?php
  require_once("head.php");
  require_once("../koneksi.php");
    
 
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

    <form action="proses_all.php" method="post">

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                    <h2 class="card-title text-center"><i class="fas fa-plus"></i> INPUT DATA RENCANA KEGIATAN</h2>
                </div>
                <div class="card-body">
                  
          <div class="row">
        <div class="col"><br>
          
          <div class="form-group">
            <label for="inputName" class="control-label">Nama kegiatan</label>
              <input type="text" class="form-control" name="nama_kegiatan" id="inputName" placeholder="Nama kegiatan" required>
            </div><br>

          <div class="form-group">
            <label for="inputName" class="control-label">lokasi kegiatan</label>
              <input type="text" class="form-control" name="lokasi_kegiatan" id="inputName" placeholder="lokasi kegiatan" required>
            </div><br>

          <div class="form-group">
            <label for="inputName" class="control-label">Waktu Kegiatan</label>
              <input type="date" class="form-control" name="waktu_kegiatan" id="inputName" placeholder="Waktu Kegiatan" required>
          </div><br>

          <div class="form-group">
            <label for="inputName" class="control-label">Dalam Rangka Kegiatan</label>
              <input type="text" class="form-control" name="pelaksana_kegiatan" id="inputName" placeholder="Pelaksana Kegiatan" required>
          </div><br>

          <div class="form-group">
            <label for="inputName" class="control-label">Pegawai yang Membuat Rencana Kegiatan</label>
             <select name="nip" class="form-control">
              <option>-PILIH-</option>
                <?php 
                $snip = mysqli_query($koneksi,"SELECT * FROM t_pegawai");
                while ($dnip = mysqli_fetch_array($snip)) {
                ?>
                <option value="<?=$dnip['nip'];?>"><?=$dnip['nip'];?>|<?=$dnip['nama_lengkap'];?></option>
                <?php
                }
                ?>
            </select>
          </div><br>

          <div class="form-group">
            <label for="inputName" class="control-label">Nomor Surat Rencana Kegiatan</label>
              <input type="number" class="form-control" name="no_surat" id="inputName" placeholder="Nomor Surat Rencana Kegiatan" required>
          </div><br>

          <div class="form-group">
            <label for="inputName" class="control-label">Waktu/Jam Mulai Kegiatan</label>
              <input type="text" class="form-control" name="waktu" id="inputName" placeholder="(Contoh : 08:00 Pagi/Malam)" required>
          </div><br>

          
           <div>
          <button type="button" class="btn btn-secondary"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i> Kembali</a></button>
          <button type="submit" name="tambahkegiatan" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
        </div>
        </div>
      </div>
        </div>
        </div>
      </div>
    </div>
    </form>
</div> <!-- akhir container -->

<?php
  require_once("foot.php");
?>