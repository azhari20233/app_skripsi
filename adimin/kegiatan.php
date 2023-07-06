  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); error_reporting(0); 

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan "); ?>

<?php 
$id_kegiatan = $_GET['id_kegiatan'];
$anggota = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE id_kegiatan = '$id_kegiatan' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE id_kegiatan = '$id_kegiatan'");
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
                          <h6>Nama dan Lokasi Kegiatan</h6>
                          <h6>Tgl & Waktu Kegiatan</h6>
                          <h6>Tujuan Kegiatan</h6>
                          <h6>Yang Membuat Rencana</h6>
                          <h6>Nomor Surat</h6>
                          <h6>Keterangan Surat</h6>
                          <h6>Status Surat</h6>
                        </div>
                        <div class="col-1">
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                        </div>
                        <div class="col-8">
                          <h6><?= $ju['nama_kegiatan'] ?> Lokasi : <?= $ju['lokasi_kegiatan'] ?></h6>
                          <h6><?= tgl_indo($ju['tgl_kegiatan']) ?> / <?= $ju['waktu_kegiatan'] ?></h6>
                          <h6><?= $ju['tujuan_kegiatan']?></h6>
                          <h6><?= $ju['nama_lengkap']?></h6>
                          <h6><?= $ju['no_surat'] ?></h6>
                          <h6><?= $ju['ket_kegiatan'] ?></h6>
                          <h6 style="vertical-align: middle;"><?php 
                          if($ju['status_kegiatan']== 'Surat Sedang Diproses Atasan'){
                            echo "<p class='badge badge-warning'><b>Proses</b></p>";
                          }else if($ju['status_kegiatan']== 'Disetujui Atasan'){
                            echo "<p class='badge badge-success'><b>Disetujui</b></p>";
                          }else if($ju['status_kegiatan']== "Data Ditolak Atasan"){
                            echo "<p class='badge badge-danger'><b>Data Ditolak</b></p>";
                          }
                          ?></h6>
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
      <h4 class="header-title">Data Surat Kegiatan</h4>
      <div class="data-tables datatable-dark">
          <table id="dataTable3" class="text-center">
              <thead class="text-capitalize">
                  <tr>
                    <th>No.</th>
                    <th>Detail</th>
                    <th>Nama Kegiatan</th>
                    <th>Dalam Rangka Kegiatan</th>
                    <th>Yang Membuat Rencana Kegiatan</th>
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
                    <td style="vertical-align: middle;"><a title="Detail ?" name="id_kegiatan" href="?action=detail&id_kegiatan=<?php echo $data['id_kegiatan']; ?>" class="btn btn-flat btn-info mb-3"><i class="ti ti-zoom-in"></i></a></td>
                    <td><?php echo $data['nama_kegiatan'] ?></td>
                    <td><?php echo $data['tujuan_kegiatan'] ?></td>
                    <td><?php echo $data['nama_lengkap'] ?></td>
                    <td style="vertical-align: middle;"><?php 
                    if($data['status_kegiatan']== 'Surat Sedang Diproses Atasan'){
                      echo "<p class='badge badge-warning'><b>Sedang Proses</b></p>";
                    }else if($data['status_kegiatan']== 'Disetujui Atasan'){
                      echo "<p class='badge badge-success'><b>Disetujui</b></p>";
                    }else if($data['status_kegiatan']== "Data Ditolak Atasan"){
                      echo "<p class='badge badge-danger'><b>Data Ditolak</b></p>";
                    }
                    ?></td>
                    <td style="vertical-align: middle;">
                      <a title="Edit Data?" name="id_kegiatan" href="?action=ubah&id_kegiatan=<?php echo $data['id_kegiatan']; ?>" class="btn btn-warning btn-circle"><i class="ti ti-slice"></i></a>
                      <a href="hapus/kegiatan_hp.php?id_kegiatan=<?php echo $data['id_kegiatan']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="ti ti-trash"></i></a>
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
  <div class="col-lg-12 col-ml-12">
      <div class="row">
    <!-- Textual inputs start -->
          <div class="col-12 mt-5">
            <div class="card">
              <div class="card-body">
                <h4 class="header-title">Input Data Surat Kegiatan</h4>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama Kegiatan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="lokasi_kegiatan" placeholder="Lokasi Kegiatan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Tanggal Kegiatan</label>
                        <input type="date" class="form-control" name="tgl_kegiatan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Waktu kegiatan</label>
                        <input type="time" class="form-control" name="waktu_kegiatan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Tujuan Kegiatan</label>
                        <input name="tujuan_kegiatan" class="form-control" type="text" list="option" required placeholder="Tujuan Kegiatan">
                        <datalist id="option">
                          <option value="Sinkronisasi Program Dengan Pengadilan Negeri Rantau Kelas II">Sinkronisasi Program Dengan Pengadilan Negeri Rantau Kelas II</option>
                          <option value="Evaluasi">Evaluasi</option>
                          <option value="Panitia Acara">Panitia Acara</option>
                        </datalist>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Pegawai yang Membuat Rencana Kegiatan</label>
                        <select name="nip" class="form-control">
                          <option readonly="">Select</option>
                          <?php 
                          $snip = mysqli_query($koneksi,"SELECT * FROM t_pegawai INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan ORDER BY nama_lengkap ASC");
                          while ($dnip = mysqli_fetch_array($snip)) {
                          ?>
                          <option name="nip" value="<?=$dnip['nip'];?>"><?=$dnip['nama_lengkap'];?> | <?=$dnip['nama_jabatan'];?></option>
                          <?php
                          }
                          ?>
                      </select>
                      </div>
                  </div>
                </div>
                <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
                <button type="reset" class="btn btn-danger" title="Reset"><i class="ti ti-eraser"></i></button>
                <button type="submit" name="input" class="btn btn-primary" title="Simpan"><i class="ti ti-save"></i></button>
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
 $id_kegiatan  = $_GET['id_kegiatan'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE id_kegiatan = '$id_kegiatan'");
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
                <h4 class="header-title"><Edit></Edit> Data Surat Kegiatan</h4>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Nama Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" value="<?=$row['nama_kegiatan']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="lokasi_kegiatan" value="<?=$row['lokasi_kegiatan']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Tanggal Kegiatan</label>
                        <input type="date" class="form-control" name="tgl_kegiatan" value="<?=$row['tgl_kegiatan']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Waktu kegiatan</label>
                        <input type="time" class="form-control" name="waktu_kegiatan" value="<?=$row['waktu_kegiatan']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="">Tujuan Kegiatan</label>
                        <input name="tujuan_kegiatan" class="form-control" type="text" list="option" required="" value="<?=$row['tujuan_kegiatan']?>">
                        <datalist id="option">
                          <option value="Sinkronisasi Program Dengan Pengadilan Negeri Rantau Kelas II">Sinkronisasi Program Dengan Pengadilan Negeri Rantau Kelas II</option>
                          <option value="Evaluasi">Evaluasi</option>
                          <option value="Panitia Acara">Panitia Acara</option>
                        </datalist>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="exampleInputFile">Pegawai yang Membuat Rencana Kegiatan</label>
                        <select name="nip" class="form-control">
                          <option value="<?=$row['nip']?>"><?=$row['nama_lengkap']?></option>
                          <?php 
                          $snip = mysqli_query($koneksi,"SELECT * FROM t_pegawai INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan ORDER BY nama_lengkap ASC");
                          while ($dnip = mysqli_fetch_array($snip)) {
                          ?>
                          <option name="nip" value="<?=$dnip['nip'];?>"><?=$dnip['nama_lengkap'];?> | <?=$dnip['nama_jabatan'];?></option>
                          <?php
                          }
                          ?>
                      </select>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="id_kegiatan" value="<?=$row['id_kegiatan']?>">
                  <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="ti ti-control-backward"></i></a></button>
                <button type="reset" class="btn btn-danger" title="Reset"><i class="ti ti-eraser"></i></button>
                <button type="submit" name="edit" class="btn btn-warning" title="Ubah"><i class="ti ti-save"></i></button>
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
$no_surat = random(4); //jFodd9UWwG  
$nama_kegiatan = $_POST['nama_kegiatan'];
  $lokasi_kegiatan = $_POST['lokasi_kegiatan'];
  $tgl_kegiatan = $_POST['tgl_kegiatan'];
  $waktu_kegiatan = $_POST['waktu_kegiatan'];
  $tujuan_kegiatan = $_POST['tujuan_kegiatan'];
  $nip = $_POST['nip'];
 
  $tambahegiatan = mysqli_query($koneksi,"INSERT INTO kegiatan SET nama_kegiatan='$nama_kegiatan',lokasi_kegiatan='$lokasi_kegiatan',tgl_kegiatan='$tgl_kegiatan',waktu_kegiatan='$waktu_kegiatan',tujuan_kegiatan='$tujuan_kegiatan',nip='$nip',no_surat='$no_surat',ket_kegiatan='Surat Sedang Di Proses Atasan',status_kegiatan='Surat Sedang Diproses Atasan' ");

if($tambahegiatan){
          ?> <script>alert('Data Berhasil Ditambah!'); window.location = 'kegiatan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'kegiatan.php';</script><?php
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

$no_surat = random(4); //jFodd9UWwG  
$id_kegiatan    = $_POST['id_kegiatan'];
  $nama_kegiatan = $_POST['nama_kegiatan'];
  $lokasi_kegiatan = $_POST['lokasi_kegiatan'];
  $tgl_kegiatan = $_POST['tgl_kegiatan'];
  $waktu_kegiatan = $_POST['waktu_kegiatan'];
  $tujuan_kegiatan = $_POST['tujuan_kegiatan'];
  $nip = $_POST['nip'];
  
  $ubahkegiatan = mysqli_query($koneksi,"UPDATE kegiatan SET nama_kegiatan='$nama_kegiatan',lokasi_kegiatan='$lokasi_kegiatan',tgl_kegiatan='$tgl_kegiatan',waktu_kegiatan='$waktu_kegiatan',tujuan_kegiatan='$tujuan_kegiatan',nip='$nip',no_surat='$no_surat' WHERE id_kegiatan='$id_kegiatan'");

  if($ubahkegiatan){
          ?> <script>alert('Data Berhasil Diubah!'); window.location = 'kegiatan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'kegiatan.php';</script><?php
        }
    }
 ?>
  <?php require_once('foot.php'); ?>