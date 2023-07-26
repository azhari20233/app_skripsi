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
                          <h4 class="header-title">Input Data Kenaikan Jabatan</h4>
                          <div class="row">
                            <div class="col-6">
                               <div class="form-group">
                                  <label for="example-email-input" class="col-form-label">NIP</label>
                                  <select name="nip" class="form-control"  onchange='changeValue(this.value)'>
                                      <option readonly="">-PILIH-</option>
                                      <?php 
                                        $datapegawai = mysqli_query($koneksi, "SELECT * FROM t_pegawai");
                                            $nama  = "var nama = new Array();\n;";
                                            while($data = mysqli_fetch_array($datapegawai)) {?>
                                            <option name="nip" value="<?= $data['nip'] ?>"><?= $data['nip'] ?></option>
                                            <?php 
                                            $nama .= "nama['" .$data['nip']. "'] = {nama:'" . addslashes($data['nama_lengkap'])."'};\n";
                                             ?>
                                          <?php 
                                          }
                                           ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                  <label for="example-text-input" class="col-form-label">Nama</label>
                                  <input readonly="" class="form-control" type="text" id="nama" name="nama">
                              </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Bidang</label>
                                    <input class="form-control" type="text" id="bidang" name="bidang">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Jabatan</label>
                                    <input class="form-control" type="text" id="jabatan" name="jabatan">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Golongan</label>
                                    <input class="form-control" type="text" id="golongan" name="golongan">
                                </div>
                            </div>    
                            

                            <div class="col-12">
                                <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
                                <button type="reset" class="btn btn-danger" title="Reset"><i class="ti ti-eraser"></i></button>
                                <button type="submit" name="input" class="btn btn-primary" title="Simpan"><i class="ti ti-save"></i></button>
                            </div>
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

?>
<?php 
if (isset($_POST['input'])) {
    $nip = $_REQUEST['nip'];
    $bidang = $_REQUEST['bidang'];
    $jabatan = $_REQUEST['jabatan'];
    $golongan = $_REQUEST['golongan'];

    $tanggal = date('Y-m-d');

    $tambah = mysqli_query($koneksi,"INSERT INTO kenaikan_jabatan (nip, bidang, jabatan_baru, golongan_baru, tanggal) VALUES(
      '$nip',
      '$bidang',
      '$jabatan',
      '$golongan',
      '$tanggal')
      ");

if($tambah){
  ?> <script>alert('Data kenaikan sudah di tambahkan!'); window.location = 'kenaikan_jabatan.php';</script><?php
}else{
  ?> <script>alert('Gagal, cek kembali!.'); window.location = 'kenaikan_jabatan_in.php';</script><?php
}
}?>

 <script type="text/javascript">
    <?php echo $nama;?>
     function changeValue(id){document.getElementById('nama').value = nama[id].nama;}
</script>