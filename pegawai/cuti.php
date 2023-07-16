  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); error_reporting(0); 

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM cuti INNER JOIN t_pegawai ON cuti.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE cuti.id_pg = '". $user_row['id_pg'] ."'"); ?>

<?php 
$id_cuti = $_GET['id_cuti'];
$anggota = mysqli_query($koneksi, "SELECT * FROM cuti INNER JOIN t_pegawai ON cuti.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE id_cuti = '$id_cuti' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM cuti INNER JOIN t_pegawai ON cuti.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE id_cuti = '$id_cuti'");
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
                          <h6>Nama Lengkap Pegawai</h6>
                          <h6>Tgl Awal Cuti & Akhir Cuti</h6>
                          <h6>Total Hari Cuti</h6>
                          <h6>Keterangan Mengajukan Cuti</h6>
                          <h6>Keterangan Surat</h6>
                          <h6>Nomor Surat</h6>
                          <h6>Status Surat</h6>
                          <h6>File Pengantar</h6>
                        </div>
                        <div class="col-1">
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                        </div>
                        <div class="col-8">
                          <h6><?= $ju['nama_lengkap'] ?></h6>
                          <h6><?= tgl_indo($ju['tgl_aw']) ?> / <?= tgl_indo($ju['tgl_ak']) ?></h6>
                          <h6><?= $ju['lama_cuti']?> Hari</h6>
                          <h6><?= $ju['keterangan']?></h6>
                          <h6><?= $ju['ket_cuti'] ?></h6>
                          <h6><?= $ju['no_cuti'] ?></h6>
                          <h6 style="vertical-align: middle;"><?php 
                          if($ju['status_cuti']== 'Surat Sedang Diproses Atasan'){
                            echo "<p class='badge badge-warning'><b>Proses</b></p>";
                          }else if($ju['status_cuti']== 'Disetujui Atasan'){
                            echo "<p class='badge badge-success'><b>Disetujui</b></p>";
                          }else if($ju['status_cuti']== "Data Ditolak Atasan"){
                            echo "<p class='badge badge-danger'><b>Data Ditolak</b></p>";
                          }
                          ?></h6>
                          <h6><a target="_blank" href="../fileweb/<?php echo $ju['file_cuti']; ?>"><?php echo substr(strip_tags($ju['file_cuti']),0,15).'...'?></a></h6>
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
      <h4 class="header-title">Data Permohonan Surat Cuti Pegawai</h4>
      <div class="data-tables datatable-dark">
          <table id="dataTable3" class="text-center">
              <thead class="text-capitalize">
                  <tr>
                    <th>No.</th>
                    <th>Detail</th>
                    <th>Nama Pegawai</th>
                    <th>Keterangan Cuti</th>
                    <th>Keterangan Surat</th>
                    <th>Status Surat</th>
                    <th><i class="ti ti-settings"></i></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr >
                    <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) { ?>

                    <td><?php echo $no++ ?></td>
                    <td style="vertical-align: middle;"><a title="Detail ?" name="id_cuti" href="?action=detail&id_cuti=<?php echo $data['id_cuti']; ?>" class="btn btn-flat btn-info mb-3"><i class="ti ti-zoom-in"></i></a></td>
                    <td><?php echo $data['nama_lengkap'] ?></td>
                    <td><?php echo $data['keterangan'] ?></td>
                    <td><?php echo $data['ket_cuti'] ?></td>
                    <td style="vertical-align: middle;"><?php 
                    if($data['status_cuti']== 'Surat Sedang Diproses Atasan'){
                      echo "<p class='badge badge-warning'><b>Sedang Proses</b></p>";
                    }else if($data['status_cuti']== 'Disetujui Atasan'){
                      echo "<p class='badge badge-success'><b>Disetujui</b></p>";
                    }else if($data['status_cuti']== "Data Ditolak Atasan"){
                      echo "<p class='badge badge-danger'><b>Data Ditolak</b></p>";
                    }
                    ?></td>
                    <td style="vertical-align: middle;">
                      <a title="Edit Data?" name="id_cuti" href="?action=ubah&id_cuti=<?php echo $data['id_cuti']; ?>" class="btn btn-warning btn-circle"><i class="ti ti-slice"></i></a>
                      <a href="hapus/cuti_hp.php?id_cuti=<?php echo $data['id_cuti']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="ti ti-trash"></i></a>
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
        case "tambah": 
          $tb_user = mysqli_query($koneksi,"SELECT * FROM t_pegawai WHERE id_pg = '" . $user_row['id_pg'] . "'");
          $row = mysqli_fetch_array($tb_user);
        ?>
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
                <h4 class="header-title">Input Data Permohonan Surat Cuti Pegawai</h4>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Nama Pegawai</label>
                        <input disabled type="text" class="form-control" name="nama" value="<?=$row['nama_lengkap']?>">
                        <input type="hidden" class="form-control" name="id_pg" value="<?=$row['id_pg']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Keterangan Mengajukan Cuti</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Mengajukan Cuti">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Tanggal Awal Cuti</label>
                        <input type="date" class="form-control" name="tgl_aw">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Tanggal Selesai Cuti</label>
                        <input type="date" class="form-control" name="tgl_ak">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Jumlah Hari Cuti</label>
                        <input name="lama_cuti" class="form-control" type="number" required="" placeholder="Jumlah Hari Cuti">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">File Surat Pengantar Cuti | pdf | docx Maximal 700kb</label>
                          <div class="input-group">
                            <input type="file" name="file_cuti" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
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
 $id_cuti  = $_GET['id_cuti'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM cuti INNER JOIN t_pegawai ON cuti.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE id_cuti = '$id_cuti'");
  $row = mysqli_fetch_array($tb_dt);?>
<form action="" method="post" enctype="multipart/form-data">
<div class="main-content-inner">
<div class="row">
  <div class="col-lg-12 col-ml-12">
      <div class="row">
    <!-- Textual inputs start -->
          <div class="col-12 mt-5">
            <div class="card">
              <div class="card-body">
                <h4 class="header-title">Edit Data Permohonan Surat Cuti Pegawai</h4>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Nama Pegawai</label>
                        <input disabled type="text" class="form-control" name="nama" value="<?=$row['nama_lengkap']?>">
                        <input type="hidden" class="form-control" name="id_pg" value="<?=$row['id_pg']?>">
                      </div> 
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Keterangan Mengajukan Cuti</label>
                        <input type="text" class="form-control" name="keterangan" value="<?=$row['keterangan']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Tanggal Awal Cuti</label>
                        <input type="date" class="form-control" name="tgl_aw" value="<?=$row['tgl_aw']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Tanggal Selesai Cuti</label>
                        <input type="date" class="form-control" name="tgl_ak" value="<?=$row['tgl_ak']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Jumlah Hari Cuti</label>
                        <input name="lama_cuti" class="form-control" type="number" required="" value="<?=$row['lama_cuti']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Foto Kegiatan | png | jpg | jpeg Maximal 700kb</label>
                          <div class="input-group">
                            <input type="hidden" name="fl" value="<?=$row['file_cuti']?>">
                            <input type="file" name="file_cuti" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <input type="hidden" name="id_cuti" value="<?=$row['id_cuti']?>">
                      </div>
                  <input type="hidden" name="id_cuti" value="<?=$row['id_cuti']?>">
                    </div>
                  </div>
                  <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
                <button type="reset" class="btn btn-danger" title="Reset"><i class="ti ti-eraser"></i></button>
                <button type="submit" name="edit" class="btn btn-warning" title="Ubah"><i class="ti ti-save"></i></button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

<?php break; } ?>

<?php 
if (isset($_POST['input'])) {

function random($panjang)   
{   
  $karakter = '1234567890';     
  $string = '';   
  for($i = 0; $i < $panjang; $i++) {   
     $pos = rand(0, strlen($karakter)-1);   
     $string .= $karakter{$pos};   
  }   
return $string;   
}   
$no_cuti = random(4); //jFodd9UWwG  
$id_pg = $_POST['id_pg'];
$tgl_aw = $_POST['tgl_aw'];
$tgl_ak = $_POST['tgl_ak'];
$lama_cuti = $_POST['lama_cuti'];
$keterangan = $_POST['keterangan'];

$ekstensi_diperbolehkan = array('pdf','docx');
$namafoto = $_FILES['file_cuti']['name'];
$x = explode('.', $namafoto);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['file_cuti']['size'];
$file_tmp = $_FILES['file_cuti']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 2048000){  
        $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
        move_uploaded_file($file_tmp, '../fileweb/foto-pegawai'.$namabaru);

      $tmbhcuti = mysqli_query($koneksi,"INSERT INTO cuti SET id_pg='$id_pg',tgl_aw='$tgl_aw',tgl_ak='$tgl_ak',lama_cuti='$lama_cuti',keterangan='$keterangan',ket_cuti='Surat Sedang Di Proses Atasan',no_cuti='$no_cuti',status_cuti='Surat Sedang Diproses Atasan',file_cuti='$namabaru'");
      if($tmbhcuti){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'cuti.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'cuti.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 700kB!'); window.location = 'cuti.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format harus pdf, docs!'); window.location = 'cuti.php';</script><?php
      }

    }
    
if (isset($_POST['edit'])) {
  function random($panjang)   
{   
  $karakter = '1234567890';     
  $string = '';   
  for($i = 0; $i < $panjang; $i++) {   
     $pos = rand(0, strlen($karakter)-1);   
     $string .= $karakter{$pos};   
  }   
return $string;   
}   
$no_cuti = random(4); //jFodd9UWwG 
  $id_cuti    = $_POST['id_cuti'];
  $id_pg = $_POST['id_pg'];
  $tgl_aw = $_POST['tgl_aw'];
  $tgl_ak = $_POST['tgl_ak'];
  $lama_cuti = $_POST['lama_cuti'];
  $keterangan = $_POST['keterangan'];

  $ekstensi_diperbolehkan = array('pdf','docx');
  $file_cuti = $_FILES['file_cuti']['name'];
  $x = explode('.', $file_cuti);
  $ekstensi = strtolower(end($x));
  $ukuran = $_FILES['file_cuti']['size'];
  $file_surat_tmp = $_FILES['file_cuti']['tmp_name'];
  $foto = $_FILES['file_cuti']['error'];
  $fl = $_REQUEST['fl'];

  if($foto){
    $tambah = mysqli_query($koneksi,"UPDATE cuti SET id_pg='$id_pg',tgl_aw='$tgl_aw',tgl_ak='$tgl_ak',lama_cuti='$lama_cuti',keterangan='$keterangan',no_cuti='$no_cuti',file_cuti='$fl' WHERE `cuti`.`id_cuti`='$id_cuti'");?><script>alert('Data Berhasil Diubah, Tanpa Mengubah Foto!'); window.location = 'cuti.php';</script><?php

  }else{
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070002){     
      move_uploaded_file($file_surat_tmp, '../fileweb/'.$file_cuti);

  $ubahmasuk = mysqli_query($koneksi,"UPDATE cuti SET id_pg='$id_pg',tgl_aw='$tgl_aw',tgl_ak='$tgl_ak',lama_cuti='$lama_cuti',keterangan='$keterangan',no_cuti='$no_cuti',file_cuti='$file_cuti' WHERE `cuti`.`id_cuti`='$id_cuti'");

  if($ubahmasuk){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'cuti.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'cuti.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 700kB!'); window.location = 'cuti.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format pdf, docx!'); window.location = 'cuti.php';</script><?php
      }
    }
}
 ?>
  <?php require_once('foot.php'); ?>