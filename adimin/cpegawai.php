<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); require_once("../fungsi_rupiah.php"); ?>
<!-- Content Wrapper. Contains page content -->

<?php 
$bebek = mysqli_query($koneksi, "SELECT * FROM user WHERE NOT level = 'admin' AND NOT level = 'karyawan' GROUP BY level");
$pegawai = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM t_pegawai"));
?>

<div class="main-content-inner">
  <div class="row">
    <!-- Dark table start -->
      <div class="col-4 mt-5">
          <div class="card">
              <div class="card-body">
                <h4 class="mb-4">Cetak Semua Data Pegawai <i class="ti ti-user"></i></h4>
                <a title="Cetak Semua Data" href="../laporan/data_pegawai.php?id_pegawai=<?php echo $row['id_pegawai']; ?>" class="btn btn-dark" target="_blank"><i class="mdi ti-check-box"></i></a>
              </div>
          </div>
      </div>
    <!-- Dark table end -->
  </div>
</div>
  <?php require_once("foot.php"); ?>