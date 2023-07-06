<?php 
  require_once("../koneksi.php"); 
  require_once("head.php");
  require_once("../fungsi_indotgl.php"); 

$id_gaji  = $_GET['id_gaji'];
$tb_surat = mysqli_query($koneksi,"SELECT * FROM gaji INNER JOIN absensi ON gaji.id_absensi=absensi.id_absensi INNER JOIN t_pegawai ON absensi.id_pg=t_pegawai.id_pg WHERE id_gaji = '$id_gaji'");
	$row = mysqli_fetch_array($tb_surat);{
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
                          <h4 class="header-title">Edit Data Gaji Pegawai</h4>
                          <div class="row">
                            <div class="col-6">
                               <div class="form-group">
                                  <label for="example-email-input" class="col-form-label">NIP</label>
                                  <select required="" name="id_absensi" class="form-control"  onchange='changeValue(this.value)'>
                                      <option value="<?=$row['id_absensi']?>"><?= $row['nama_lengkap'] ?> (<?=$row['nip']?>)</option>
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
                                            <option name="id_absensi" value="<?= $data['id_absensi'] ?>"><?= $data['nama_lengkap'] ?> (<?=$data['nip']?>)</option>
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
                                 <input readonly="" class="form-control" type="text" id="bulan" name="bulan" value="<?=$row['bulan']?>">
                              </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Tahun</label>
                                <input readonly="" class="form-control" type="number" id="tahun" name="tahun" value="<?=$row['tahun']?>">
                              </div>
                            </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Gaji Pokok</label>
                                    <input readonly="" class="form-control" id="gajipok" name="gajipok" type="text" value="<?=$row['gajipok']?>">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Tunjangan</label>
                                    <input readonly="" class="form-control" id="tunjangan" name="tunjangan" type="text" value="<?=$row['tunjangan']?>">
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
                                    <input readonly="" class="form-control" id="tanpa_ket" name="tanpa_ket" type="number" value="<?=$row['tanpa_ket']?>">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Kode Slip Gaji</label>
                                    <input class="form-control" name="no_slip" type="text" value="<?=$row['no_slip']?>">

                                    <input type="hidden" name="id_gaji" value="<?=$row['id_gaji']?>">
                                </div>
                              </div>
                            </div>
                        <?php } ?>

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

?>
<?php 
$now = date('Y-m-d');
if (isset($_POST['edit'])) {

    $id_gaji = $_REQUEST['id_gaji'];
    $tgl_gaji = $_REQUEST['tgl_gaji'];
    $no_slip = $_REQUEST['no_slip'];
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

    $result = mysqli_query($koneksi,"SELECT no_slip FROM gaji WHERE id_gaji = '$id_gaji'");
    $nos = mysqli_fetch_array($result);
    if($no_slip == $nos['no_slip']){
        echo "<script>alert('No. Slip Gaji Tidak Boleh Sama Dengan Data yang Ada!'); window.location = 'gaji.php';</script>"; return false; }

    $tambah = mysqli_query($koneksi,"UPDATE gaji SET tgl_gaji = '$now', no_slip = '$no_slip', bulan = '$bulan', tahun = '$tahun', id_absensi = '$id_absensi',gaji_bersih = '$new', potongan = '$newe' WHERE id_gaji = '$id_gaji'");
if($tambah){
          ?> <script>alert('Absensi pada bulan ini telah di lakukan!'); window.location = 'gaji.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'gaji.php';</script><?php
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