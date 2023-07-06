<?php 
  require_once("../koneksi.php"); 
  require_once("head.php");
  require_once("fungsi_indotgl.php"); 

?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="main-content-inner">
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
          <!-- Textual inputs start -->
                <div class="col-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">Input Data Mutasi Pegawai</h4>
                          <div class="row">
                            <div class="col-6">
                               <div class="form-group">
                                  <label for="example-email-input" class="col-form-label">NIP & Nama</label>
                                  <select name="id_pg" class="form-control"  onchange='changeValue(this.value)'>
                                      <option readonly="">-PILIH-</option>
                                      <?php 
                                        $datapegawai = mysqli_query($koneksi, "SELECT * FROM t_pegawai INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan ORDER BY nama_lengkap ASC");
                                                $a  = "var jabatan = new Array();\n;";
                                            while($data = mysqli_fetch_array($datapegawai)) {?>
                                            <option name="id_pg" value="<?= $data['id_pg'] ?>"><?= $data['nip'] ?> | <?= $data['nama_lengkap'] ?> </option>
                                            <?php 
                                            $a .= "jabatan['" .$data['id_pg']. "'] = {jabatan:'" . addslashes($data['jabatan'])."'};\n";

                                             ?>
                                          <?php 
                                          }
                                           ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                  <label for="example-text-input" class="col-form-label">Nomor SK</label>
                                  <input class="form-control" type="text" id="no_sk" name="no_sk" placeholder="Nomor SK">
                              </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Tanggal SK Mutasi</label>
                                <input class="form-control" type="date" id="tgl_sk" name="tgl_sk">
                              </div>
                            </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Tujuan</label>
                                    <input class="form-control" id="tujuan" name="tujuan" type="text" placeholder="Tujuan Mutasi">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Jabatan Baru</label>
                                    <select name="new_jabatan" class="form-control"  onchange='changeValue(this.value)'>
                                      <option readonly="">-PILIH-</option>
                                      <?php 
                                        $datajb = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY nama_jabatan ASC");
                                            while($data = mysqli_fetch_array($datajb)) {?>
                                            <option name="new_jabatan" value="<?= $data['nama_jabatan'] ?>"><?= $data['nama_jabatan'] ?> </option>
                                          <?php 
                                          }
                                           ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">File Surat Pernyataan</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file_p" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        <p style="color: red">Ekstensi yang diperbolehkan dalam bentuk .pdf | .docx (<b><u>UKURAN FILE TIDAK BOLEH LEBIH DARI 800 KB!</u></b>)</p>
                                    </div>
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

  $id_pg = $_POST['id_pg'];
  $no_sk = $_POST['no_sk'];
  $tgl_sk = $_POST['tgl_sk'];
  $tujuan = $_POST['tujuan'];
  $new_jabatan = $_POST['new_jabatan'];

    $ekstensi_diperbolehkan = array('pdf','docx');
    $namafoto = $_FILES['file_p']['name'];
    $x = explode('.', $namafoto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file_p']['size'];
    $file_tmp = $_FILES['file_p']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 2048000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
          move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

      $query = mysqli_query($koneksi, "INSERT INTO mutasi (tgl_m,id_pg,no_sk,tgl_sk,tujuan,new_jabatan,ket_mutasi,file_p,status_mutasi) VALUES(
                    '$now',
                    '$id_pg',     
                    '$no_sk',
                    '$tgl_sk',                    
                    '$tujuan',
                    '$new_jabatan',
                    'Sedang Diproses Atasan',
                    '$namabaru',
                    'Sedang Diproses Atasan'
                    );");
    if($query){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'mutasi.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'mutasi_in.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 700kb!'); window.location = 'mutasi_in.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format pdf atau docx!'); window.location = 'mutasi_in.php';</script><?php
      }

    }
 ?>

 <script type="text/javascript">
    <?php echo $a;?>
     function changeValue(id){
       document.getElementById('nama_jabatan').value = nama_jabatan[id].nama_jabatan;