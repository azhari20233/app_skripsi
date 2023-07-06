  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); error_reporting(0); 

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM monitoring INNER JOIN kegiatan ON kegiatan.id_kegiatan=monitoring.id_kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip"); ?>

<?php 
$id_monitoring = $_GET['id_monitoring'];
$anggota = mysqli_query($koneksi, "SELECT * FROM monitoring INNER JOIN kegiatan ON kegiatan.id_kegiatan=monitoring.id_kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip WHERE id_monitoring = '$id_monitoring' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM monitoring INNER JOIN kegiatan ON kegiatan.id_kegiatan=monitoring.id_kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip WHERE id_monitoring = '$id_monitoring'");
$jul = mysqli_fetch_array($anggota2);
  ?>
  <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
<?php 
          if(mysqli_num_rows($anggota)> 0){ ?>
            <div class="main-content-inner">
              <div class="row">
                <div class="col-12 mt-5">
                  <div class="card">
                    <div class="card-body">
                      <?php $ju = mysqli_fetch_array($anggota);{?>
                    <form name="table" method="POST">
                      <div class="row justify-content-center mb-3">
                        <div class="col-3">
                          <h6>Pegawai yang Memonitoring</h6>
                          <h6>Kegiatan yang Dimonitoring</h6>
                          <h6>Tgl Membuat Laporan</h6>
                          <h6>Tgl Selesai Membuat Laporan</h6>
                          <h6>Kesimpulan</h6>
                          <h6>Foto Kegiatan (Klik Gambar)</h6>
                        </div>
                        <div class="col-1">
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                        </div>
                        <div class="col-8">
                          <h6><?php echo $ju['nama_lengkap'] ?></h6>
                          <h6><?php echo $ju['nama_kegiatan'] ?> Lokasi : <?php echo $ju['lokasi_kegiatan'] ?></h6>
                          <h6><?= tgl_indo($ju['tgl_awal']) ?></h6>
                          <h6><?= tgl_indo($ju['tgl_akhir']) ?></h6>
                          <h6><?php echo $ju['kesimpulan'] ?></h6>
                          <h6><a target="_blank" href="../fileweb/<?php echo  $ju['foto']; ?>"><img src="<?php echo '../fileweb/'.$ju['foto'] ?>" width="135px;"></a>
                          </h6>
                        </div>
                        <?php } ?>
                      </div>
                      </form>
                    </div>
                  </div>
                
              <?php } ?>
            <!-- general form elements -->
            <div class="main-content-inner">
        <div class="row">
    <!-- Dark table start -->
<div class="col-12 mt-5">
<div class="card">
  <div class="card-body">
    <a title="Tambah Data" href="?action=tambah" type="button" class="btn btn-flat btn-success mb-3"><i class="ti ti-plus"></i></a>
      <h4 class="header-title">Tabel Data Hasil Laporan Kegiatan</h4>
      <div class="data-tables datatable-dark">
          <table id="dataTable3" class="text-center">
              <thead class="text-capitalize">
                  <tr>
                    <th>No.</th>
                    <th>Detail</th>
                    <th>Pegawai yang Memonitoring</th>
                    <th>Kegiatan yang Dimonitoring</th>
                    <th>Kesimpulan</th>
                    <th>Pegawai yg Membuat Laporan Kegiatan </th>
                    <th>Foto Kegiatan (Klik Gambar)</th>
                    <th><i class="ti ti-settings"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr >
                    <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) { ?>

                    <td><?php echo $no++ ?></td>
                    <td style="vertical-align: middle;"><a title="Detail ?" name="id_monitoring" href="?action=detail&id_monitoring=<?php echo $data['id_monitoring']; ?>" class="btn btn-flat btn-info mb-3"><i class="ti ti-zoom-in"></i></a></td>
                    <td><?php echo $data['nama_kegiatan'] ?></td>
                    <td><?php echo $data['nama_kegiatan'] ?> Lokasi : <?php echo $data['lokasi_kegiatan'] ?></td>
                    <td><?php echo $data['kesimpulan'] ?></td>
                    <td><?php echo $data['nama_lengkap'] ?></td>
                    <td class="text-center"><a target="_blank" href="../fileweb/<?php echo  $data['foto']; ?>"><img src="<?php echo '../fileweb/'.$data['foto'] ?>" width="95px;"></a>
                    </td>
                    <td style="vertical-align: middle;">
                      <a title="Edit Data?" name="id_monitoring" href="?action=ubah&id_monitoring=<?php echo $data['id_monitoring']; ?>" class="btn btn-warning btn-circle"><i class="ti ti-slice"></i></a>
                      <a href="hapus/hkegiatan_hp.php?id_monitoring=<?php echo $data['id_monitoring']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="ti ti-trash"></i></a>
                    </td>
                  </tr>
              <?php } ?>
              </tbody>
          </table>
      </div>
  </div>
</div>
  </div>
    </div>
      </div>
        <?php break;
case "tambah": ?>
    <!-- Main content -->
    <form action="" method="post" enctype="multipart/form-data">
<div class="main-content-inner">
<div class="row">
  <div class="col-lg-6 col-ml-12">
      <div class="row">
    <!-- Textual inputs start -->
          <div class="col-12 mt-5">
            <div class="card">
              <div class="card-body">
                <h4 class="header-title">Input Data Hasil Laporan Kegiatan</h4>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="exampleInputFile">Pegawai yang Membuat Laporan Kegiatan</label>
                        <select name="id_kegiatan" class="form-control" onchange='changeValue(this.value)'>
                          <option readonly="">Select</option>
                          <?php 
                          $snip = mysqli_query($koneksi,"SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan");
                          $a  = "var nama_kegiatan = new Array();\n;";
                          while ($dnip = mysqli_fetch_array($snip)) {
                          ?>
                          <option name="id_kegiatan" value="<?=$dnip['id_kegiatan'];?>"><?=$dnip['nama_lengkap'];?> | <?=$dnip['nama_jabatan'];?></option>
                          <?php 
                          $a .= "nama_kegiatan['" .$dnip['id_kegiatan']. "'] = {nama_kegiatan:'" . addslashes($dnip['nama_kegiatan'])."'};\n";
                          ?>
                          <?php
                          }
                          ?>
                      </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="exampleInputFile">Nama Kegiatan</label>
                        <input readonly="" type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Nama Kegiatan">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Membuat Laporan</label>
                        <input type="date" class="form-control" name="tgl_awal" placeholder="Jabatan">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Tanggal  Selesai Membuat Laporan</label>
                        <input type="date" class="form-control" name="tgl_akhir">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Kesimpulan Laporan Kegiatan</label>
                        <input name="kesimpulan" class="form-control" type="text" required="" placeholder="Kesimpulan Laporan Kegiatan">
                      </div>
                    </div>
                  </div>
                    <div class="col-8">
                      <div class="form-group">
                        <label for="exampleInputFile">Foto Kegiatan | png | jpg | jpeg Maximal 700kb</label>
                          <div class="input-group">
                            <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
                <button type="reset" class="btn btn-danger" title="Reset"><i class="ti ti-eraser"></i></button>
                <button type="submit" name="input" class="btn btn-primary" title="Simpan"><i class="ti ti-save"></i></button>
                  </div>
              </div>
            <!-- Textual inputs end -->
        </div>
      </div>
    </div>
  </div>
</div>
</form>

<?php break;
case "ubah": 
 $id_monitoring  = $_GET['id_monitoring'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM monitoring INNER JOIN kegiatan ON kegiatan.id_kegiatan=monitoring.id_kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip WHERE id_monitoring = '$id_monitoring'");
  $row = mysqli_fetch_array($tb_dt);?>
      <form action="" method="post" enctype="multipart/form-data">
<div class="main-content-inner">
<div class="row">
  <div class="col-lg-6 col-ml-12">
      <div class="row">
    <!-- Textual inputs start -->
          <div class="col-12 mt-5">
            <div class="card">
              <div class="card-body">
                <h4 class="header-title">Edit Data Hasil Laporan Kegiatan</h4>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="exampleInputFile">Pegawai yang Membuat Laporan Kegiatan</label>
                        <select name="id_kegiatan" class="form-control" onchange='changeValue(this.value)'>
                          <option value="<?=$row['id_kegiatan']?>"><?=$row['nama_lengkap']?></option>
                          <?php 
                          $snip = mysqli_query($koneksi,"SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan");
                          $a  = "var nama_kegiatan = new Array();\n;";
                          while ($dnip = mysqli_fetch_array($snip)) {
                          ?>
                          <option name="id_kegiatan" value="<?=$dnip['id_kegiatan'];?>"><?=$dnip['nama_lengkap'];?> | <?=$dnip['nama_jabatan'];?></option>
                          <?php 
                          $a .= "nama_kegiatan['" .$dnip['id_kegiatan']. "'] = {nama_kegiatan:'" . addslashes($dnip['nama_kegiatan'])."'};\n";
                          ?>
                          <?php
                          }
                          ?>
                      </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="exampleInputFile">Nama Kegiatan</label>
                        <input readonly="" type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Nama Kegiatan">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Membuat Laporan</label>
                        <input type="date" class="form-control" name="tgl_awal" value="<?=$row['tgl_awal']?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Tanggal  Selesai Membuat Laporan</label>
                        <input type="date" class="form-control" name="tgl_akhir" value="<?=$row['tgl_akhir']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Kesimpulan Laporan Kegiatan</label>
                        <input name="kesimpulan" class="form-control" type="text" required="" value="<?=$row['kesimpulan']?>">
                      </div>
                    </div>
                  </div>
                    <div class="col-8">
                      <div class="form-group">
                        <label for="exampleInputFile">Foto Kegiatan | png | jpg | jpeg Maximal 700kb</label>
                          <div class="input-group">
                            <input type="hidden" name="fl" value="<?=$row['foto']?>">
                            <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <input type="hidden" name="id_monitoring" value="<?=$row['id_monitoring']?>">
                      </div>
                    </div>
                <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
                <button type="reset" class="btn btn-danger" title="Reset"><i class="ti ti-eraser"></i></button>
                <button type="submit" name="edit" class="btn btn-warning" title="Simpan"><i class="ti ti-save"></i></button>
                  </div>
              </div>
            <!-- Textual inputs end -->
        </div>
      </div>
    </div>
  </div>
</div>
</form>
  
<?php break; } ?>

<?php 
if (isset($_POST['input'])) {
  $id_kegiatan = $_POST['id_kegiatan'];
  $tgl_awal = $_POST['tgl_awal'];
  $tgl_akhir = $_POST['tgl_akhir'];
  $kesimpulan = $_POST['kesimpulan'];

  $ekstensi_diperbolehkan = array('png','jpg','jpeg','jp');
    $namafoto = $_FILES['foto']['name'];
    $x = explode('.', $namafoto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 2048000){  
        $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
        move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

      $tambahmk = mysqli_query($koneksi, "INSERT INTO monitoring (id_kegiatan,tgl_awal,tgl_akhir,kesimpulan,foto) VALUES(  
                    '$id_kegiatan',
                    '$tgl_awal',                    
                    '$tgl_akhir',
                    '$kesimpulan',
                    '$namabaru');");
      if($tambahmk){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'hkegiatan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'hkegiatan.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 700kB!'); window.location = 'hkegiatan.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format harus png, jpg, jpeg, jp!'); window.location = 'hkegiatan.php';</script><?php
      }

    }
if (isset($_POST['edit'])) {
$id_monitoring    = $_POST['id_monitoring'];
  $id_kegiatan = $_POST['id_kegiatan'];
  $tgl_awal = $_POST['tgl_awal'];
  $tgl_akhir = $_POST['tgl_akhir'];
  $kesimpulan = $_POST['kesimpulan'];

  $ekstensi_diperbolehkan = array('png','jpg','jpeg','jp');
  $file_foto = $_FILES['file']['name'];
  $x = explode('.', $file_foto);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['file']['size'];
  $file_surat_tmp = $_FILES['file']['tmp_name'];
  $foto = $_FILES['file']['error'];
  $fl = $_REQUEST['fl'];

  if($foto){
    $tambah = mysqli_query($koneksi,"UPDATE monitoring SET id_kegiatan='$id_kegiatan',tgl_awal='$tgl_awal',tgl_akhir='$tgl_akhir',kesimpulan='$kesimpulan',foto='$fl' WHERE `monitoring`.`id_monitoring`='$id_monitoring'");?><script>alert('Data Berhasil Diubah, Tanpa Mengubah Foto!'); window.location = 'hkegiatan.php';</script><?php

  }else{

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070002){     
      move_uploaded_file($file_surat_tmp, '../fileweb/'.$file_foto);

  $ubahmasuk = mysqli_query($koneksi,"UPDATE monitoring SET id_kegiatan='$id_kegiatan',tgl_awal='$tgl_awal',tgl_akhir='$tgl_akhir',kesimpulan='$kesimpulan',foto='$file_foto' WHERE `monitoring`.`id_monitoring`='$id_monitoring'");

  if($ubahmasuk){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'hkegiatan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'hkegiatan.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 700kB!'); window.location = 'hkegiatan.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format png, jpg, jpeg atau jp!'); window.location = 'hkegiatan.php';</script><?php
      }
    }
}
 ?>
  <?php require_once('foot.php'); ?>

<script type="text/javascript">
<?php echo $a;?>
function changeValue(id){
document.getElementById('nama_kegiatan').value = nama_kegiatan[id].nama_kegiatan; }</script>