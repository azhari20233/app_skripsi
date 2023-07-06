<?php 
  require_once("../koneksi.php"); 
  require_once("head.php");
  require_once("fungsi_indotgl.php"); 

?>
<form action="" method="post">
  <div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
          <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">Input Data Pensiun</h4>
                          <div class="row">
                            <div class="col-6">
                               <div class="form-group">
                                  <label for="example-email-input" class="col-form-label">NIP</label>
                                  <select name="nip" class="form-control" onchange='changeValue(this.value)'>
                                    <?php 
                                    $snip = mysqli_query($koneksi,"SELECT * FROM t_pegawai");
                                    while ($dnip = mysqli_fetch_array($snip)) {
                                    ?>
                                    <option name="nip" value="<?=$dnip['nip'];?>"><?=$dnip['nama_lengkap'];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>             
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                  <label for="example-text-input" class="col-form-label">No Surat</label>
                                  <input class="form-control" type="text" id="no_surat" name="no_surat">
                              </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Tanggal Surat</label>
                                <input class="form-control" type="date" id="tgl_surat" name="tgl_surat">
                              </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Tanggal Pensiun</label>
                                <input class="form-control" type="date" id="tgl_pensiun" name="tgl_pensiun">
                              </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Alamat</label>
                                <input class="form-control" type="text" id="alamat_pensiun" name="alamat_pensiun">
                              </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Pangkat/Gol</label>
                                <input class="form-control" type="text" id="pangkat_gol" name="pangkat_gol">
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
if (isset($_POST['input'])) {

    $nip = $_REQUEST['nip'];
    $no_surat = $_REQUEST['no_surat'];
    $tgl_surat = $_REQUEST['tgl_surat'];
    $tgl_pensiun = $_REQUEST['tgl_pensiun'];
    $alamat_pensiun = $_REQUEST['alamat_pensiun'];
    $pangkat_gol = $_REQUEST['pangkat_gol'];

        $tambah = mysqli_query($koneksi,"INSERT INTO t_pensiun ( nip,  no_surat, tgl_surat, tgl_pensiun, alamat_pensiun, pangkat_gol ) VALUES(
          '$nip',
          '$no_surat',
          '$tgl_surat',
          '$tgl_pensiun',
          '$alamat_pensiun',
          '$pangkat_gol')");
        if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'pensiun.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pensiun_in.php';</script><?php
        }
      }
 ?>