<?php 
  require_once("../koneksi.php"); 
  require_once("head.php");
  require_once("../fungsi_indotgl.php"); 

$id_absensi  = $_GET['id_absensi'];
$tb_surat = mysqli_query($koneksi,"SELECT * FROM absensi INNER JOIN t_pegawai ON absensi.id_pg=t_pegawai.id_pg WHERE id_absensi = '$id_absensi'");
	$row = mysqli_fetch_array($tb_surat);{
?>
<form action="" method="post">
  <div class="main-content-inner">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
          <!-- Textual inputs start -->
                <div class="col-8 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">Edit Data Absensi Pegawai</h4>

                          <div class="row">
                            <div class="col-3">
                              <div class="form-group">
                                  <label for="example-text-input" class="col-form-label">Bulan</label>
                                  <select  class="form-control" name="bulan">
                                  	<option value="<?=$row['bulan']?>"><?=$row['bulan']?></option>
                                      <?php
                                          $arr = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                              foreach ($arr as $key) {
                                                  echo "<option value='$key'>$key";
                                              }
                                      ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-3">
                               <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Tahun</label>
                                  <select name="tahun" class="form-control">
                                  	<option value="<?=$row['tahun']?>"><?=$row['tahun']?></option>
                                          <?php
                                          for ($i = 2022; $i < 2035; $i++) {
                                              echo '<option value="' . $i . '">' . $i . '</option>';
                                          }
                                          ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-3">
                               <div class="form-group">
                                  <label for="example-email-input" class="col-form-label">NIP & Nama</label>
                                  <select name="id_pg" class="form-control">
                                      <option value="<?=$row['id_pg']?>"><?=$row['nip']?> | <?=$row['nama_lengkap']?></option>
                                      <?php 
                                      $snip = mysqli_query($koneksi,"SELECT * FROM t_pegawai ORDER BY nama_lengkap ASC");
                                      while ($dnip = mysqli_fetch_array($snip)) {
                                      ?>
                                      <option name="id_pg" value="<?=$dnip['id_pg'];?>"><?=$dnip['nip'];?> | <?=$dnip['nama_lengkap'];?></option>
                                      <?php
                                      }
                                      ?>
                                  </select>
                              </div>
                            </div>
                            
                          </div>
                           <div class="row">
                              <div class="col-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Hadir</label>
                                    <input class="form-control" name="hadir" type="number" value="<?=$row['hadir']?>" required="">
                                </div>
                              </div>
                              <div class="col-3">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Sakit</label>
                                    <input class="form-control" name="sakit" type="number" value="<?=$row['sakit']?>">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Izin</label>
                                    <input class="form-control" name="izin" type="number" value="<?=$row['izin']?>">
                                </div>
                              </div>
                              <div class="col-3">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Tanpa Keterangan</label>
                                    <input class="form-control" name="tanpa_ket" type="number" value="<?=$row['tanpa_ket']?>">

                                    <input type="hidden" name="id_absensi" value="<?=$row['id_absensi']?>">
                                </div>
                              </div>
                          <?php } ?>
                            </div>
                            <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
                            <button type="reset" class="btn btn-danger" title="Reset"><i class="ti ti-eraser"></i></button>
                            <button type="submit" name="edit" class="btn btn-warning" title="Simpan"><i class="ti ti-save"></i></button>
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
if (isset($_POST['edit'])) {

	$id_absensi = $_REQUEST['id_absensi'];

    $tgl = $_REQUEST['tgl'];
    $bulan = $_REQUEST['bulan'];
    $tahun = $_REQUEST['tahun'];
    $id_pg = $_REQUEST['id_pg'];
    $hadir = $_REQUEST['hadir'];
    $sakit = $_REQUEST['sakit'];
    $izin = $_REQUEST['izin'];
    $tanpa_ket = $_REQUEST['tanpa_ket'];

    $tambah = mysqli_query($koneksi,"UPDATE absensi SET tgl = '$now', bulan = '$bulan', tahun = '$tahun', id_pg = '$id_pg', hadir = '$hadir',sakit = '$sakit',izin = '$izin', tanpa_ket = '$tanpa_ket' WHERE id_absensi = '$id_absensi'");
if($tambah){
          ?> <script>alert('Absensi ini Berhasil di Ubah!'); window.location = 'absensi.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'absensi.php';</script><?php
        }

    }
 ?>