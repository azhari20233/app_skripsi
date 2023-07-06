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
                          <h4 class="header-title">Input Data Gaji Pegawai</h4>
                          <div class="row">
                            <div class="col-6">
                               <div class="form-group">
                                  <label for="example-email-input" class="col-form-label">NIP</label>
                                  <select name="id_absensi" class="form-control"  onchange='changeValue(this.value)'>
                                      <option readonly="">-PILIH-</option>
                                      <?php 
                                        $datapegawai = mysqli_query($koneksi, "SELECT * FROM absensi INNER JOIN t_pegawai ON absensi.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan");
                                                $a  = "var gajipok = new Array();\n;";
                                                $h  = "var tunjangan = new Array();\n;";
                                                $he  = "var hadir = new Array();\n;";
                                                $he2  = "var sakit = new Array();\n;";
                                                $he3  = "var izin = new Array();\n;";
                                                $he4  = "var tanpa_ket = new Array();\n;";
                                                $he5  = "var bulan = new Array();\n;";
                                                $he6  = "var tahun = new Array();\n;";
                                            while($data = mysqli_fetch_array($datapegawai)) {?>
                                            <option name="id_absensi" value="<?= $data['id_absensi'] ?>"><?= $data['nama_lengkap'] ?> (<?= tgl_indo($data['bulan']) ?>) <?= $data['tahun'] ?></option>
                                            <?php 
                                            $a .= "gajipok['" .$data['id_absensi']. "'] = {gajipok:'" . addslashes($data['gajipok'])."'};\n";
                                            $h .= "tunjangan['" .$data['id_absensi']. "'] = {tunjangan:'" . addslashes($data['tunjangan'])."'};\n";
                                            $he .= "hadir['" .$data['id_absensi']. "'] = {hadir:'" . addslashes($data['hadir'])."'};\n";
                                            $he2 .= "sakit['" .$data['id_absensi']. "'] = {sakit:'" . addslashes($data['sakit'])."'};\n";
                                            $he3 .= "izin['" .$data['id_absensi']. "'] = {izin:'" . addslashes($data['izin'])."'};\n";
                                            $he4 .= "tanpa_ket['" .$data['id_absensi']. "'] = {tanpa_ket:'" . addslashes($data['tanpa_ket'])."'};\n";
                                            $he5 .= "bulan['" .$data['id_absensi']. "'] = {bulan:'" . addslashes($data['bulan'])."'};\n";
                                            $he6 .= "tahun['" .$data['id_absensi']. "'] = {tahun:'" . addslashes($data['tahun'])."'};\n";

                                             ?>
                                          <?php 
                                          }
                                           ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                  <label for="example-text-input" class="col-form-label">Bulan</label>
                                  <input readonly="" class="form-control" type="text" id="bulan" name="bulan">
                              </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Tahun</label>
                                <input readonly="" class="form-control" type="number" id="tahun" name="tahun">
                              </div>
                            </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Gaji Pokok</label>
                                    <input readonly="" class="form-control" id="gajipok" name="gajipok" type="text">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Tunjangan</label>
                                    <input readonly="" class="form-control" id="tunjangan" name="tunjangan" type="text">
                                </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Hadir</label>
                                    <input readonly="" class="form-control" id="hadir" type="number">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Sakit</label>
                                    <input readonly="" class="form-control" id="sakit" type="text">
                                </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Izin</label>
                                    <input readonly="" class="form-control" id="izin" type="number">
                                </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Tanpa Keterangan</label>
                                    <input readonly="" class="form-control" id="tanpa_ket" name="tanpa_ket" type="number">
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

?>
<?php 
$now = date('Y-m-d');
if (isset($_POST['input'])) {
  function random($panjang)   
  {   
    $karakter = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';     
    $string = '';   
    for($i = 0; $i < $panjang; $i++) {   
      $pos = rand(0, strlen($karakter)-1);   
      $string .= $karakter{$pos};   
    }   
  return $string;   
  }   

  $no_slip = random(10); //jFodd9UWwG  

    $tgl_gaji = $_REQUEST['tgl_gaji'];
    $bulan = $_REQUEST['bulan'];
    $tahun = $_REQUEST['tahun'];
    $id_absensi = $_REQUEST['id_absensi'];
    $gajipok = $_REQUEST['gajipok'];
    $tunjangan = $_REQUEST['tunjangan'];
    $potongan = $_REQUEST['potongan'];

    $tunjangan = $_REQUEST['tunjangan'];
    $tanpa_ket = $_REQUEST['tanpa_ket'];

    $newe = $tanpa_ket * 150000;
    $new = $gajipok + $tunjangan;
    $neew = $new - $newe;

    $result = mysqli_query($koneksi,"SELECT no_slip FROM gaji WHERE id_absensi = '$id_absensi'");
    $nos = mysqli_fetch_array($result);

    $ez = mysqli_query($koneksi,"SELECT bulan FROM gaji WHERE id_absensi = '$id_absensi' AND tahun = '$tahun'");
    $ezz = mysqli_fetch_array($ez);

    if($no_slip == $nos['no_slip']){
        echo "<script>alert('No. Slip Gaji Tidak Boleh Sama Dengan Data yang Ada!'); window.location = 'gaji.php';</script>"; return false; 
      }else if($bulan == $ezz['bulan']){
        echo "<script>alert('sudah Ada!'); window.location = 'gaji.php';</script>"; return false;}

    $tambah = mysqli_query($koneksi,"INSERT INTO gaji ( tgl_gaji,  no_slip, bulan, tahun,  id_absensi,  gaji_bersih,  gajipok, tunjangan, potongan) VALUES(
          '$now',
          '$no_slip',
          '$bulan',
          '$tahun',
          '$id_absensi',
          '$new',
          '$gajipok',
          '$tunjangan',
          '$newe')");
if($tambah){
          ?> <script>alert('Absensi pada bulan ini telah di lakukan!'); window.location = 'gaji.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'gaji_in.php';</script><?php
        }

    }
 ?>

 <script type="text/javascript">
    <?php echo $a;echo $h;echo $he;echo $he2;echo $he3;echo $he4;echo $he5;echo $he6;?>
     function changeValue(id){
       document.getElementById('gajipok').value = gajipok[id].gajipok;
        document.getElementById('tunjangan').value = tunjangan[id].tunjangan;
        document.getElementById('hadir').value = hadir[id].hadir;
      document.getElementById('sakit').value = sakit[id].sakit;
    document.getElementById('izin').value = izin[id].izin;
  document.getElementById('tanpa_ket').value = tanpa_ket[id].tanpa_ket;
document.getElementById('bulan').value = bulan[id].bulan;
document.getElementById('tahun').value = tahun[id].tahun;}
</script>