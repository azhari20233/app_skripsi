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
                          <h4 class="header-title">Input Data Pegawai</h4>

                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                  <label for="example-text-input" class="col-form-label">Nama Lengkap</label>
                                  <input class="form-control" name="nama_lengkap" type="text" placeholder="Nama Lengkap" required="">
                              </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                  <label for="example-search-input" class="col-form-label">Nip</label>
                                  <input class="form-control" name="nip" type="number" placeholder="NIP" required="">
                              </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                  <label for="example-email-input" class="col-form-label">Jabatan</label>
                                  <select name="id_jabatan" class="form-control" required="">
                                      <option readonly="">Select</option>
                                      <?php 
                                      $snip = mysqli_query($koneksi,"SELECT * FROM jabatan");
                                      while ($dnip = mysqli_fetch_array($snip)) {
                                      ?>
                                      <option name="id_jabatan" value="<?=$dnip['id_jabatan'];?>"><?=$dnip['nama_jabatan'];?></option>
                                      <?php
                                      }
                                      ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                  <label class="col-form-label">Golongan</label>
                                  <input class="form-control" name="golongan" type="text" placeholder="Golongan" required="">
                                </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                  <label class="col-form-label">Pegawai</label>
                                    <select name="pegawai" class="form-control" required="">
                                        <option readonly="">Select</option>
                                        <option value="asn">ASN</option>
                                        <option value="non asn">NON ASN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                  <label class="col-form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required="">
                                        <option readonly="">Select</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                          </div>

                           <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Agama</label>
                                    <input class="form-control" name="agama" type="text" placeholder="Agama" required="">
                                </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">Status</label>
                                    <select name="status" class="form-control" required="">
                                      <option readonly="">Select</option>
                                      <option value="BELUM KAWIN">BELUM KAWIN</option>
                                      <option value="KAWIN">KAWIN</option>
                                    </select>
                                </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label for="example-email-input" class="col-form-label">Tempat Lahir</label>
                                    <input class="form-control" name="tempat_lahir" type="text" placeholder="Tempat Lahir" required="">
                                </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label for="example-url-input" class="col-form-label">Tanggal Lahir</label>
                                    <input class="form-control" name="tanggal_lahir" type="date" placeholder="Tanggal Lahir" required="">
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Alamat Rumah</label>
                                    <input class="form-control" name="alamat_rumah" type="text" placeholder="Alamat Rumah" required="">
                                </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label for="example-search-input" class="col-form-label">No Telepon</label>
                                    <input class="form-control" name="no_telpon" type="number" placeholder="No Telepon" required="">
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputFile">File Foto</label>
                                    <div class="input-group">
                                      <input type="file" name="file_foto" id="exampleInputFile">
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
if (isset($_POST['input'])) {

    $nip = $_REQUEST['nip'];
    $nama_lengkap = $_REQUEST['nama_lengkap'];
    $id_jabatan = $_REQUEST['id_jabatan'];
    $jenis_kelamin = $_REQUEST['jenis_kelamin'];
    $agama = $_REQUEST['agama'];
    $status = $_REQUEST['status'];
    $tempat_lahir = $_REQUEST['tempat_lahir'];
    $tanggal_lahir = $_REQUEST['tanggal_lahir'];
    $alamat_rumah = $_REQUEST['alamat_rumah'];
    $no_telpon = $_REQUEST['no_telpon'];
    $pegawai = $_REQUEST['pegawai'];
    $golongan = $_REQUEST['golongan'];

    $ekstensi_diperbolehkan = array('jpg','jpeg','png');
    $namafoto = $_FILES['file_foto']['name'];
    $x = explode('.', $namafoto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file_foto']['size'];
    $file_tmp = $_FILES['file_foto']['tmp_name'];
 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 2048000){  
        $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
        move_uploaded_file($file_tmp, '../fileweb/foto-pegawai/'.$namabaru);

        $tambah = mysqli_query($koneksi,"INSERT INTO t_pegawai ( nip,  nama_lengkap, id_jabatan,  jenis_kelamin,  agama,  status, tempat_lahir,tanggal_lahir,  alamat_rumah, no_telpon, file_foto, pegawai, golongan) VALUES(
          '$nip',
          '$nama_lengkap',
          '$id_jabatan',
          '$jenis_kelamin',
          '$agama',
          '$status',
          '$tempat_lahir',
          '$tanggal_lahir',
          '$alamat_rumah',
          '$no_telpon',
          '$namabaru',
          '$pegawai',
          '$golongan')");
        if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'pegawai.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pegawai_in.php';</script><?php
        }
      }
    }

    }
 ?>