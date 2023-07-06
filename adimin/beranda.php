<?php 
  
  require_once("head.php");
$koneksi = mysqli_connect("localhost","root","","pkl_tapin");
  $surat = mysqli_query($koneksi, "SELECT * FROM surat");
  $kegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan");
  $tugas = mysqli_query($koneksi, "SELECT * FROM spt");
  $sppd = mysqli_query($koneksi, "SELECT * FROM sppd");

  $data = mysqli_num_rows($surat);
  $data1 = mysqli_num_rows($kegiatan);
  $data2 = mysqli_num_rows($tugas);
  $data3 = mysqli_num_rows($sppd);
?>
<?php 
    if(isset($_GET['pesan'])){
      if($_GET['pesan']=="ubahprofil"){
        ?>
          <script src="../js/sweetalert.min.js"></script>
          <script type="text/javascript">
            function alert1(){
              swal("Profil Berhasil Di Ubah!", "Klik OK!", "success");
            } alert1();
          </script>
        <?php 
      }
    }
    ?>


    <style>
      
      .tengah {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
    </style>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-home"></i> Home</h1>
          </div>

          <!-- Content Row -->
          <di class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="tampil_masuk.php" style="text-decoration: none;">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Daftar Surat Masuk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-th-list fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="tampil_kegiatan.php" style="text-decoration: none;">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Daftar Rencana Kegiatan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data1 ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-th-list fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="tampil_tugas.php" style="text-decoration: none;">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Daftar SPT</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data2 ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-th-list fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="tampil_sppd.php" style="text-decoration: none;">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Daftar SPPD</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data3 ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-th-list fa-2x text-secondary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>

            <div class="tengah">
              <br>
              <img width="1150px" src="../gambar/bgbg.jpeg" height="auto" />            
            </div>

          </div>

          <!-- Content Row -->

          
      </div>
      <!-- End of Main Content -->


         <?php 
  require_once("foot.php");
?>

    