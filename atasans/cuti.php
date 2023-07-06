  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); error_reporting(0); 

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM cuti INNER JOIN t_pegawai ON cuti.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan"); ?>

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
    <!-- <a title="Tambah Data" href="?action=tambah" type="button" class="btn btn-flat btn-success mb-3"><i class="ti ti-plus"></i></a> -->
      <h4 class="header-title">Data Permohonan Surat Cuti Pegawai</h4>
      <div class="data-tables datatable-dark">
          <table id="dataTable3" class="text-center">
              <thead class="text-capitalize">
                  <tr>
                    <th>No.</th>
                    <th>Disposisi</th>
                    <th>Detail</th>
                    <th>Nama Pegawai</th>
                    <th>Keterangan Cuti</th>
                    <th>Keterangan Surat</th>
                    <th>Status Surat</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr >
                    <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) { ?>

                    <td><?php echo $no++ ?></td>
                    <td style="vertical-align: middle;">
                      <form action="" method="POST">
                          <div class="text-center">
                            <input type="text" class="form-control mb-2" name="ket_cuti" placeholder="Isi Keterangan ACC/Tolak" required="">
                            <input type="hidden" class="form-control" name="id_cuti" id="inputName" value="<?=$data['id_cuti'];?>">      
                            <button type="submit" name="sub" class="btn btn-secondary btn-danger" title="Tolak">
                            <a><i class="mdi ti-close"></i></a>
                            </button>
                            <button type="submit" name="tombole" class="btn btn-secondary btn-success" title="Setujui">
                            <a ><i class="mdi ti-check"></i></a>
                            </button>
                        </div>
                      </form>
                    </td>
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
                <h4 class="header-title">Input Data Permohonan Surat Cuti Pegawai</h4>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="exampleInputFile">Nama Pegawai</label>
                        <select name="id_pg" class="form-control" onchange='changeValue(this.value)'>
                          <option readonly="">Select</option>
                          <?php 
                          $snip = mysqli_query($koneksi,"SELECT * FROM t_pegawai INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan ORDER BY nama_lengkap ASC");
                          while ($dnip = mysqli_fetch_array($snip)) {
                          ?>
                          <option name="id_pg" value="<?=$dnip['id_pg'];?>"><?=$dnip['nama_lengkap'];?> | <?=$dnip['nama_jabatan'];?></option>
                          <?php
                          }
                          ?>
                      </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="exampleInputFile">Keterangan Mengajukan Cuti</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Mengajukan Cuti">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Awal Cuti</label>
                        <input type="date" class="form-control" name="tgl_aw">
                      </div>
                    </div>
                  </div>
                  <div class="row">
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
                  </div>
                    <div class="col-8">
                      <div class="form-group">
                        <label for="exampleInputFile">File Surat Pengantar Cuti | pdf | docx Maximal 700kb</label>
                          <div class="input-group">
                            <input type="file" name="file_cuti" class="custom-file-input" id="exampleInputFile">
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
 $id_cuti  = $_GET['id_cuti'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM cuti INNER JOIN t_pegawai ON cuti.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan WHERE id_cuti = '$id_cuti'");
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
                <h4 class="header-title">Edit Data Permohonan Surat Cuti Pegawai</h4>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="exampleInputFile">Nama Pegawai</label>
                        <select name="id_pg" class="form-control" onchange='changeValue(this.value)'>
                          <option value="<?=$row['id_pg']?>"><?=$row['nama_lengkap']?></option>
                          <?php 
                          $snip = mysqli_query($koneksi,"SELECT * FROM t_pegawai INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan ORDER BY nama_lengkap ASC");
                          while ($dnip = mysqli_fetch_array($snip)) {
                          ?>
                          <option name="id_pg" value="<?=$dnip['id_pg'];?>"><?=$dnip['nama_lengkap'];?> | <?=$dnip['nama_jabatan'];?></option>
                          <?php
                          }
                          ?>
                      </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="exampleInputFile">Keterangan Mengajukan Cuti</label>
                        <input type="text" class="form-control" name="keterangan" value="<?=$row['keterangan']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Awal Cuti</label>
                        <input type="date" class="form-control" name="tgl_aw" value="<?=$row['tgl_aw']?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
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
                  </div>
                    <div class="col-8">
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
  if (isset($_POST['sub'])) {
    $id_cuti = $_POST['id_cuti'];
    $ket_cuti = $_POST['ket_cuti'];
    $status_cuti = $_POST['status_cuti'];
    $update = mysqli_query($koneksi, "UPDATE `cuti` SET `ket_cuti` = '$ket_cuti',`status_cuti` = 'Data Ditolak Atasan' WHERE `cuti`.`id_cuti` = $id_cuti;");
if($update){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'cuti.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'cuti.php';</script><?php
        }  
  }
else if (isset($_POST['tombole'])) {
    $id_cuti = $_POST['id_cuti'];
    $ket_cuti = $_POST['ket_cuti'];
    $status_cuti = $_POST['status_cuti'];
    $update = mysqli_query($koneksi, "UPDATE `cuti` SET `ket_cuti` = '$ket_cuti',`status_cuti` = 'Disetujui Atasan' WHERE `cuti`.`id_cuti` = $id_cuti;");
if($update){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'cuti.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'cuti.php';</script><?php
        }
  }
?>
  <?php require_once('foot.php'); ?>