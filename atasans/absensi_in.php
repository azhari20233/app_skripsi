<?php 
  require_once("../koneksi.php"); 
  require_once("head.php");
  require_once("fungsi_indotgl.php"); 

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
                          <h4 class="header-title">Input Data Absensi Pegawai</h4>

                          <div class="row">
                            <div class="col-3">
                              <div class="form-group">
                                  <label for="example-text-input" class="col-form-label">Bulan</label>
                                  <select  class="form-control" name="bulan">
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
                                  <label for="example-email-input" class="col-form-label">NIP</label>
                                  <select name="id_pg" class="form-control">
                                      <option readonly="">Select</option>
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
                                    <input class="form-control" name="hadir" type="number" value="0" required="">
                                </div>
                              </div>
                              <div class="col-3">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Sakit</label>
                                    <input class="form-control" name="sakit" type="number" value="0">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-3">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Izin</label>
                                    <input class="form-control" name="izin" type="number" value="0">
                                </div>
                              </div>
                              <div class="col-3">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Tanpa Keterangan</label>
                                    <input class="form-control" name="tanpa_ket" type="number" value="0">
                                </div>
                              </div>
                            </div>
                            <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
                            <button type="reset" class="btn btn-danger" title="Reset"><i class="ti ti-eraser"></i></button>
                            <button type="submit" name="input" class="btn btn-primary" title="Simpan"><i class="ti ti-save"></i></button>
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

    $tgl = $_REQUEST['tgl'];
    $bulan = $_REQUEST['bulan'];
    $tahun = $_REQUEST['tahun'];
    $id_pg = $_REQUEST['id_pg'];
    $hadir = $_REQUEST['hadir'];
    $sakit = $_REQUEST['sakit'];
    $izin = $_REQUEST['izin'];
    $tanpa_ket = $_REQUEST['tanpa_ket'];
    $tambah = mysqli_query($koneksi,"INSERT INTO absensi ( tgl,  bulan, tahun,  id_pg,  hadir,  sakit, izin,tanpa_ket) VALUES(
          '$now',
          '$bulan',
          '$tahun',
          '$id_pg',
          '$hadir',
          '$sakit',
          '$izin',
          '$tanpa_ket')");
if($tambah){
          ?> <script>alert('Absensi pada bulan ini telah di lakukan!'); window.location = 'absensi.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'absensi_in.php';</script><?php
        }

    }
 ?>