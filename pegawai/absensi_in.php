<?php 
  require_once("../koneksi.php"); 
  require_once("head.php");
  require_once("fungsi_indotgl.php"); 

  $sql = mysqli_query($koneksi,"SELECT * FROM t_pegawai WHERE id_pg = " . $user_row['id_pg']);
  $user_row = mysqli_fetch_array($sql);

  $sql_absen = mysqli_query($koneksi,"SELECT * FROM absen_pegawai WHERE id_pg = " . $user_row['id_pg'] . " AND tanggal = '" . date('Y-m-d') . "'");
  $absen_row = mysqli_num_rows($sql_absen);
?>
<form action="" method="post">
  <div class="main-content-inner">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
          <!-- Textual inputs start -->
                <div class="col mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">Absen Pegawai</h4>

                           <div class="row">
                              <div class="col-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">NIP</label>
                                    <input class="form-control" name="nip" type="text" readonly value="<?php echo $user_row['nip'] ?>">
                                    <input class="form-control" name="id_pg" type="hidden" value="<?php echo $user_row['id_pg'] ?>">
                                </div>
                              </div>
                              <div class="col-4">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Nama</label>
                                    <input class="form-control" name="nama" type="text" readonly value="<?php echo $user_row['nama_lengkap'] ?>">
                                </div>
                              </div>
                              <div class="col-4">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Tanggal</label>
                                    <input class="form-control" name="tanggal" type="date" readonly value="<?php echo date('Y-m-d'); ?>">
                                </div>
                              </div>
                            </div>
                            <?php if($absen_row == 0) { ?>
                            <button type="submit" name="input" class="btn btn-primary" title="Simpan">Absen</button>
                            <?php } else { ?>
                              <button type="submit" name="input" class="btn btn-primary" disabled title="Simpan">Sudah Absen</button>
                            <?php } ?>
                      </div>
                  </div>
              </div>
            <!-- Textual inputs end -->
        </div>
      </div>
    </div>
  </div>
</form>

<?php
  require_once("foot.php");
?> 
<?php 
$now = date('Y-m-d');
if (isset($_POST['input'])) {

    $tanggal = $_REQUEST['tanggal'];
    $id_pg = $_REQUEST['id_pg'];
    $tambah = mysqli_query($koneksi,"INSERT INTO absen_pegawai ( id_pg, tanggal ) VALUES(
          '$id_pg',
          '$tanggal')");
if($tambah){
          ?> <script>alert('Absensi pada hari ini telah di lakukan!'); window.location = 'absensi.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'absensi_in.php';</script><?php
        }

    }
 ?>