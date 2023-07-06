
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
                    <h2 class="card-title text-center"><i class="fas fa-plus"></i> INPUT DATA PEGAWAI</h2>
                </div>
                <div class="card-body">
                  
          <div class="row">
        <div class="col"><br>
          
          <div class="form-group">
            <label for="inputName" class="control-label">NIP</label>
              <input type="text" class="form-control" name="nip" id="inputName" placeholder="NIP" required>
            </div><br>

          <div class="form-group">
            <label for="inputName" class="control-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_lengkap" id="inputName" placeholder="Nama Lengkap" required>
            </div><br>

          <div class="form-group">
            <label for="inputName" class="control-label">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" id="inputName" placeholder="Jabatan" required>
          </div><br>

          <div class="form-group">
            <label for="inputName" class="control-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
            </select>
          </div><br>

          <div class="form-group">
            <label for="inputName" class="control-label">Agama</label>
            <input type="text" class="form-control" name="agama" id="inputName" placeholder="Agama" required>
          </div><br>

          <div class="form-group">
            <label for="inputName" class="control-label">Status</label>
            <select name="status" class="form-control">
                <option value="KAWIN">KAWIN</option>
                <option value="BELUM KAWIN">BELUM KAWIN</option>
              </select>
          </div><br>  

          <div class="form-group">
            <label for="inputPassword" class="control-label">Tempat, Tanggal Lahir</label>
              <div class="row">
                <div class="form-group col-sm-6">
                  <input type="text" class="form-control" id="inputPassword" placeholder="Tempat Lahir" name="tempat_lahir" required>
                </div>
                <div class="form-group col-sm-6">
                  <input type="date" class="form-control" id="inputPasswordConfirm" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
                </div>
              </div>
          </div><br>

          <div class="form-group">
            <label for="inputName" class="control-label">Alamat Rumah</label>
            <input type="text" class="form-control" name="alamat_rumah" id="inputName" placeholder="Alamat Rumah" required>
          </div><br>

        <div class="form-group">
            <label for="inputName" class="control-label">No Telpon</label>
            <input type="number" class="form-control" name="no_telpon" id="inputName" placeholder="No Telpon" required>
        </div><br>
        </div>

          </div>
           <div>
          <button type="button" class="btn btn-secondary"><a style="color: white;" id="log" href="tampil_pegawai.php"><i class="fas fa-arrow-left"></i> Kembali</a></button>
          <button type="submit" name="tambahpg" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
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