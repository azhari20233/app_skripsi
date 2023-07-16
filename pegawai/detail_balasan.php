<?php 
  require_once("head.php");
  require_once("../fungsi_indotgl.php");
  require_once('../fungsi_rupiah.php'); 
?>
 
<?php
  $koneksi = mysqli_connect("localhost","root","","pkl_tapin");
    $id_balasan = $_GET['id_balasan'];
      $data_m = mysqli_query($koneksi,"SELECT * FROM balasan INNER JOIN surat ON balasan.id_surat=surat.id_surat INNER JOIN t_pegawai ON t_pegawai.nip=surat.nip WHERE id_balasan = '$id_balasan' ");
?>
<?php
  $row = mysqli_fetch_array($data_m);{ 
?>
 <!-- Begin Page Content -->
        <div class="container-fluid">
          <form action="" method="POST">
          
          <!-- Page Heading -->
          <img src="../gambar/tapin.png" width="120px" class="mb-3" style="margin-left:auto;margin-right:auto;display:block;">
          <h3 class="mb-2 text-center" style="font-family: arial; color: black;"><b>DETAIL SURAT BALASAN</b></h3>
          <br><br>
        <style>
	  		.row h6{
	  			font-family: times; color: black;
	  		}
	  	</style>
<div class="card shadow mb-4">
  <div class="card-header py-3">
  <div class="row justify-content-center">
      <div class="col-4">
        <h6>ASAL PENGIRIM SURAT MASUK</h6>
        <h6>DITUNJUKKAN KEPADA</h6>
        <h6>PEGAWAI YANG BERSANGKUTAN</h6>
        <h6>TANGGAL BALASAN</h6>
        <h6>JENIS SURAT</h6>
        <h6>NOMOR SURAT</h6>
        <h6>PERIHAL SURAT</h6>
        <h6>STATUS SURAT</h6>
        <h6>KETERANGAN BALASAN</h6>
      </div>
      <div class="col-2">
        <h6>:</h6>
        <h6>:</h6>
        <h6>:</h6>
        <h6>:</h6>
        <h6>:</h6>
        <h6>:</h6>
        <h6>:</h6>
        <h6>:</h6>
        <h6>:</h6>  
      </div>
      <div class="col-6">
        <h6><?=$row['dari'];?></h6>
        <h6><?=$row['untuk'];?></h6>
        <h6><?=$row['nama_lengkap'];?></h6>
        <h6><?=tgl_indo($row['tgl_balasan']);?></h6>
        <h6><?=$row['jenis_surat'];?></h6>
        <h6><?=$row['no_surat'];?></h6>
        <h6><?=$row['perihal'];?></h6>
        <h6><?php 
            if($row['status_surat']== 0){
              echo "<b>Proses</b>";
            }else if($row['status_surat']== 1){
              echo "<b>Disetujui</b>";
            }else if($row['status_surat']== 2){
              echo "<b class='text-danger'>Ditolak</b>";
            }
            
            ?></h6>
        <h6><b class="text-danger"><?=$row['keterangan'];?></b></h6>
      </div>
    </div>
  </div>
</div>
          <br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 text-center" style="font-family: times; color: black;"><b>FOTO/FILE SURAT MASUK</b></h6>
              <h6 class="m-0 text-center" style="font-family: times; color: black;"><b><i>Klik Gambar/File Untuk Melihat Lebih jelas</i></b></h6>
            </div>
            <div class="card-body">
              <div class="row text-center">
              <div class="col-4 mb-4">
                <h6>File Surat Masuk :</h6><h6><a target="_blank" href="../fileweb/<?php echo $row['file_surat']; ?>"><?php echo substr(strip_tags($row['file_surat']),0,15).'...'?></a></h6>
              </div>
              </div>

              </div>

          <?php } ?>

               
              </div>
              <div class="text-center">

              <button type="button" class="btn btn-secondary btn-circle btn-lg" onclick="history.back()"><i class="fas fa-arrow-left"></i></button>

              </div>
              </form>
            </div>
            <!-- /.container-fluid -->
      <!-- End of Main Content -->

<?php
  require_once("foot.php");
?> 