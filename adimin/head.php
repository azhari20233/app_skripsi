<?php require_once ('../koneksi.php');
 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id_admin']) || (trim($_SESSION['id_admin']) == '')) { ?>
<script>
window.location = "../";
</script>
<?php 
}
$session_id=$_SESSION['id_admin'];

$user_query = mysqli_query($koneksi, "SELECT * FROM t_admin WHERE id_admin = '$session_id'")or die(mysqli_error($koneksi));
$user_row = mysqli_fetch_array($user_query);

$_SESSION['message'] = "Hallo";
$_SESSION['msg_type'] = "berhasil";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BKAD KAB.TAPIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='../gambar/tapin.png' rel='icon' type='image/x-icon'/>
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="../assets/css/export.css" type="text/css" media="all" />
     <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.jqueryui.min.css">
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="../gambar/tapin.png" width="55" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="index.php"><i class="ti-dashboard"></i> <span>dashboard</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Data Master
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="jabatan.php">Jabatan</a></li>
                                    <li><a href="pegawai.php">Pegawai</a></li>
                                    <!-- <li><a href="tr.php">Transportasi & Biaya</a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti ti-calendar"></i><span>Absensi & Gaji</span></a>
                                <ul class="collapse">
                                    <li><a href="absensi.php">Absensi</a></li>
                                    <li><a href="gaji.php">Gaji Pegawai</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-briefcase"></i><span>Kenaikan Jabatan</span></a>
                                <ul class="collapse">
                                    <li><a href="kenaikan_jabatan.php">Kenaikan Jabatan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-briefcase"></i><span>Pensiun</span></a>
                                <ul class="collapse">
                                    <li><a href="pensiun.php">Pensiun</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa ti-email"></i>
                                    <span>Surat Dinas</span></a>
                                <ul class="collapse">
                                    <!-- <li><a href="masuk.php">Surat Masuk</a></li>
                                    <li><a href="sppd.php">Surat Perintah Perjalanan Dinas</a></li>
                                    <li><a href="spt.php">Surat Perintah Tugas</a></li> -->
                                    <li><a href="kegiatan.php">Surat Agenda/Kegiatan</a></li>
                                    <!-- li><a href="hkegiatan.php">Laporan Hasil Kegiatan</a></li> -->
                                    <li><a href="cuti.php">Surat Pengajuan Cuti</a></li>
                                    <li><a href="mutasi.php">Surat Mutasi Pegawai</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Laporan Data
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="#" title="Cetak Tabel" class="" data-toggle="modal" data-target="#pegawaic">Pegawai</a></li>
                                    <li><a href="#" title="Cetak Tabel" class="" data-toggle="modal" data-target="#gajic">Gaji Pegawai</a></li>
                                    <!-- li><a href="#" title="Cetak Tabel" class="" data-toggle="modal" data-target="#masukc">Surat Masuk</a></li>
                                    <li><a href="#" title="Cetak Tabel" class="" data-toggle="modal" data-target="#sppdc">Surat Perintah Perjalanan Dinas</a></li>
                                    <li><a href="#" title="Cetak Tabel" class="" data-toggle="modal" data-target="#sptc">Surat Perintah Tugas</a></li> -->
                                    <li><a href="#" title="Cetak Tabel" class="" data-toggle="modal" data-target="#mutasic">Surat Mutasi Pegawai</a></li>
                                    <li><a href="#" title="Cetak Tabel" class="" data-toggle="modal" data-target="#kegiatanc">Agenda / Kegiatan</a></li>
                                    <!-- li><a href="#" title="Cetak Tabel" class="" data-toggle="modal" data-target="#hkegiatanc">Laporan Hasil Kegiatan</a></li> -->
                                    <li><a href="#" title="Cetak Tabel" class="" data-toggle="modal" data-target="#cutic">Pengajuan Cuti Pegawai</a></li>
                                    <li><a href="#" title="Cetak Tabel" class="" data-toggle="modal" data-target="#pensiunc">Pensiun</a></li>
                                    <li><a href="#" title="Cetak Tabel" class="" data-toggle="modal" data-target="#kinerjac">Penilaian Kinerja Pegawai</a></li>
                                    <br><br>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
                <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <!-- <img class="avatar user-thumb" src="../assets/images/author/avatar.png" alt="avatar"> -->
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $user_row['username'];?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <!-- <a class="dropdown-item" href="#">Message</a> -->
                                <a class="dropdown-item" href="../logout.php" onClick="javascript: return confirm('Yakin Ingin Logout?');">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->

<?php 
    $qrytahun = mysqli_query($koneksi, "SELECT * FROM t_pegawai INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan");
     ?>
  <div class="modal fade" id="pegawaic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../laporan/data_pegawai.php" method="post" target="_blank"> 
          
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="../laporan/data_pegawai.php?id_pegawai=<?php echo $row['id_pegawai']; ?>" class="btn btn-primary" target="_blank">Cetak Semua</a>
        </div>
      </div>
    </div>
  </div>

<?php 
    // $qrytahun = mysqli_query($koneksi, "SELECT * FROM gaji INNER JOIN absensi ON gaji.id_absensi=absensi.id_absensi INNER JOIN t_pegawai ON absensi.id_pg=t_pegawai.id_pg GROUP BY YEAR(tgl_gaji) ASC");
    $qrytahun = mysqli_query($koneksi, "SELECT tahun FROM gaji GROUP BY tahun");
     ?>
  <div class="modal fade" id="gajic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../laporan/data_gaji.php" method="post" target="_blank"> 
          <table>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label" >Berdasarkan Bulan</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="bulan-cetak" class="form-control">
                  <option readonly="">-PILIH BULAN-</option>
                  <option value="Januari">Januari</option>
                  <option value="Februari">Februari</option>
                  <option value="Maret">Maret</option>
                  <option value="April">April</option>
                  <option value="Mei">Mei</option>
                  <option value="Juni">Juni</option>
                  <option value="Juli">Juli</option>
                  <option value="Agustus">Agustus</option>
                  <option value="September">September</option>
                  <option value="Oktober">Oktober</option>
                  <option value="November">November</option>
                  <option value="Desember">Desember</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Berdasarkan Tahun</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="tahun-cetak" class="form-control">
                  <option readonly="">-PILIH TAHUN-</option>
                  <?php if(mysqli_num_rows($qrytahun)) { ?>
                  <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                  <option><?php echo $row['tahun'] ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>

              <button type="submit" name="cetak" class="btn btn-primary btn-sm">CETAK</button>
            <div align="">
            </div>
              
          </table>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="../laporan/data_gaji.php?id_gaji=<?php echo $row['id_gaji']; ?>" class="btn btn-primary" target="_blank">Cetak Semua</a>
        </div>
      </div>
    </div>
  </div>

  <?php 
    $qrytahun = mysqli_query($koneksi, "SELECT * FROM spt INNER JOIN sppd ON spt.id_sppd=sppd.id_sppd INNER JOIN masuk ON sppd.id_masuk=masuk.id_masuk INNER JOIN t_pegawai ON masuk.nip=t_pegawai.nip INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan GROUP BY YEAR(tgl_masuk) ASC");
     ?>
  <div class="modal fade" id="masukc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../laporan/data_masuk.php" method="post" target="_blank"> 
          <table>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label" >Berdasarkan Bulan</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="bulan-cetak" class="form-control">
                  <option readonly="">-PILIH BULAN-</option>
                  <option value="-01-">Januari</option>
                  <option value="-02-">Februari</option>
                  <option value="-03-">Maret</option>
                  <option value="-04-">April</option>
                  <option value="-05-">Mei</option>
                  <option value="-06-">Juni</option>
                  <option value="-07-">Juli</option>
                  <option value="-08-">Agustus</option>
                  <option value="-09-">September</option>
                  <option value="-10-">Oktober</option>
                  <option value="-11-">November</option>
                  <option value="-12-">Desember</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Berdasarkan Tahun</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="tahun-cetak" class="form-control">
                  <option readonly="">-PILIH TAHUN-</option>
                  <?php if(mysqli_num_rows($qrytahun)) { ?>
                  <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                  <option><?php $formatwaktu = $row["tgl_masuk"];echo date('Y',strtotime($formatwaktu)); ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>

              <button type="submit" name="cetak" class="btn btn-primary btn-sm">CETAK</button>
            <div align="">
            </div>
              
          </table>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="../laporan/data_masuk.php?id_masuk=<?php echo $row['id_masuk']; ?>" class="btn btn-primary" target="_blank">Cetak Semua</a>
        </div>
      </div>
    </div>
  </div>

    <?php 
    $qrytahun = mysqli_query($koneksi, "SELECT * FROM sppd INNER JOIN masuk ON sppd.id_masuk=masuk.id_masuk INNER JOIN t_pegawai ON masuk.nip=t_pegawai.nip INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan INNER JOIN transportasi ON sppd.id_tr=transportasi.id_tr GROUP BY YEAR(tgl_berangkat) ASC");
     ?>
  <div class="modal fade" id="sppdc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../laporan/data_sppd.php" method="post" target="_blank"> 
          <table>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label" >Berdasarkan Bulan</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="bulan-cetak" class="form-control">
                  <option readonly="">-PILIH BULAN-</option>
                  <option value="-01-">Januari</option>
                  <option value="-02-">Februari</option>
                  <option value="-03-">Maret</option>
                  <option value="-04-">April</option>
                  <option value="-05-">Mei</option>
                  <option value="-06-">Juni</option>
                  <option value="-07-">Juli</option>
                  <option value="-08-">Agustus</option>
                  <option value="-09-">September</option>
                  <option value="-10-">Oktober</option>
                  <option value="-11-">November</option>
                  <option value="-12-">Desember</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Berdasarkan Tahun</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="tahun-cetak" class="form-control">
                  <option readonly="">-PILIH TAHUN-</option>
                  <?php if(mysqli_num_rows($qrytahun)) { ?>
                  <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                  <option><?php $formatwaktu = $row["tgl_berangkat"];echo date('Y',strtotime($formatwaktu)); ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>

              <button type="submit" name="cetak" class="btn btn-primary btn-sm">CETAK</button>
            <div align="">
            </div>
              
          </table>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="../laporan/data_sppd.php?id_sppd=<?php echo $row['id_sppd']; ?>" class="btn btn-primary" target="_blank">Cetak Semua</a>
        </div>
      </div>
    </div>
  </div>

<?php 
    $qrytahun = mysqli_query($koneksi, "SELECT * FROM spt INNER JOIN sppd ON spt.id_sppd=sppd.id_sppd INNER JOIN masuk ON sppd.id_masuk=masuk.id_masuk INNER JOIN t_pegawai ON masuk.nip=t_pegawai.nip INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan GROUP BY YEAR(tgl_spt) ASC");
     ?>
  <div class="modal fade" id="sptc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../laporan/data_spt.php" method="post" target="_blank"> 
          <table>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label" >Berdasarkan Bulan</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="bulan-cetak" class="form-control">
                  <option readonly="">-PILIH BULAN-</option>
                  <option value="-01-">Januari</option>
                  <option value="-02-">Februari</option>
                  <option value="-03-">Maret</option>
                  <option value="-04-">April</option>
                  <option value="-05-">Mei</option>
                  <option value="-06-">Juni</option>
                  <option value="-07-">Juli</option>
                  <option value="-08-">Agustus</option>
                  <option value="-09-">September</option>
                  <option value="-10-">Oktober</option>
                  <option value="-11-">November</option>
                  <option value="-12-">Desember</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Berdasarkan Tahun</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="tahun-cetak" class="form-control">
                  <option readonly="">-PILIH TAHUN-</option>
                  <?php if(mysqli_num_rows($qrytahun)) { ?>
                  <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                  <option><?php $formatwaktu = $row["tgl_spt"];echo date('Y',strtotime($formatwaktu)); ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>

              <button type="submit" name="cetak" class="btn btn-primary btn-sm">CETAK</button>
            <div align="">
            </div>
              
          </table>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="../laporan/data_spt.php?id_spt=<?php echo $row['id_spt']; ?>" class="btn btn-primary" target="_blank">Cetak Semua</a>
        </div>
      </div>
    </div>
  </div>

  <?php 
    $qrytahun = mysqli_query($koneksi, "SELECT * FROM mutasi INNER JOIN t_pegawai ON mutasi.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan GROUP BY YEAR(tgl_sk) ASC");
     ?>
  <div class="modal fade" id="mutasic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../laporan/data_mutasi.php" method="post" target="_blank"> 
          <table>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label" >Berdasarkan Bulan</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="bulan-cetak" class="form-control">
                  <option readonly="">-PILIH BULAN-</option>
                  <option value="-01-">Januari</option>
                  <option value="-02-">Februari</option>
                  <option value="-03-">Maret</option>
                  <option value="-04-">April</option>
                  <option value="-05-">Mei</option>
                  <option value="-06-">Juni</option>
                  <option value="-07-">Juli</option>
                  <option value="-08-">Agustus</option>
                  <option value="-09-">September</option>
                  <option value="-10-">Oktober</option>
                  <option value="-11-">November</option>
                  <option value="-12-">Desember</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Berdasarkan Tahun</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="tahun-cetak" class="form-control">
                  <option readonly="">-PILIH TAHUN-</option>
                  <?php if(mysqli_num_rows($qrytahun)) { ?>
                  <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                  <option><?php $formatwaktu = $row["tgl_sk"];echo date('Y',strtotime($formatwaktu)); ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>

              <button type="submit" name="cetak" class="btn btn-primary btn-sm">CETAK</button>
            <div align="">
            </div>
              
          </table>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="../laporan/data_mutasi.php?id_mutasi=<?php echo $row['id_mutasi']; ?>" class="btn btn-primary" target="_blank">Cetak Semua</a>
        </div>
      </div>
    </div>
  </div>

<?php 
    $qrytahun = mysqli_query($koneksi, "SELECT * FROM kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan GROUP BY YEAR(tgl_kegiatan) ASC");
     ?>
  <div class="modal fade" id="kegiatanc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../laporan/data_kegiatan.php" method="post" target="_blank"> 
          <table>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label" >Berdasarkan Bulan</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="bulan-cetak" class="form-control">
                  <option readonly="">-PILIH BULAN-</option>
                  <option value="-01-">Januari</option>
                  <option value="-02-">Februari</option>
                  <option value="-03-">Maret</option>
                  <option value="-04-">April</option>
                  <option value="-05-">Mei</option>
                  <option value="-06-">Juni</option>
                  <option value="-07-">Juli</option>
                  <option value="-08-">Agustus</option>
                  <option value="-09-">September</option>
                  <option value="-10-">Oktober</option>
                  <option value="-11-">November</option>
                  <option value="-12-">Desember</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Berdasarkan Tahun</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="tahun-cetak" class="form-control">
                  <option readonly="">-PILIH TAHUN-</option>
                  <?php if(mysqli_num_rows($qrytahun)) { ?>
                  <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                  <option><?php $formatwaktu = $row["tgl_kegiatan"];echo date('Y',strtotime($formatwaktu)); ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>

              <button type="submit" name="cetak" class="btn btn-primary btn-sm">CETAK</button>
            <div align="">
            </div>
              
          </table>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="../laporan/data_kegiatan.php?id_kegiatan=<?php echo $row['id_kegiatan']; ?>" class="btn btn-primary" target="_blank">Cetak Semua</a>
        </div>
      </div>
    </div>
  </div>

<?php 
    $qrytahun = mysqli_query($koneksi, "SELECT * FROM monitoring INNER JOIN kegiatan ON kegiatan.id_kegiatan=monitoring.id_kegiatan INNER JOIN t_pegawai ON kegiatan.nip=t_pegawai.nip GROUP BY YEAR(tgl_akhir) ASC");
     ?>
  <div class="modal fade" id="hkegiatanc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../laporan/data_hkegiatan.php" method="post" target="_blank"> 
          <table>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label" >Berdasarkan Bulan</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="bulan-cetak" class="form-control">
                  <option readonly="">-PILIH BULAN-</option>
                  <option value="-01-">Januari</option>
                  <option value="-02-">Februari</option>
                  <option value="-03-">Maret</option>
                  <option value="-04-">April</option>
                  <option value="-05-">Mei</option>
                  <option value="-06-">Juni</option>
                  <option value="-07-">Juli</option>
                  <option value="-08-">Agustus</option>
                  <option value="-09-">September</option>
                  <option value="-10-">Oktober</option>
                  <option value="-11-">November</option>
                  <option value="-12-">Desember</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Berdasarkan Tahun</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="tahun-cetak" class="form-control">
                  <option readonly="">-PILIH TAHUN-</option>
                  <?php if(mysqli_num_rows($qrytahun)) { ?>
                  <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                  <option><?php $formatwaktu = $row["tgl_akhir"];echo date('Y',strtotime($formatwaktu)); ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>

              <button type="submit" name="cetak" class="btn btn-primary btn-sm">CETAK</button>
            <div align="">
            </div>
              
          </table>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="../laporan/data_hkegiatan.php?id_monitoring=<?php echo $row['id_monitoring']; ?>" class="btn btn-primary" target="_blank">Cetak Semua</a>
        </div>
      </div>
    </div>
  </div>

<?php 
    $qrytahun = mysqli_query($koneksi, "SELECT * FROM cuti INNER JOIN t_pegawai ON cuti.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan GROUP BY YEAR(tgl_aw) ASC");
     ?>
  <div class="modal fade" id="cutic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../laporan/data_cuti.php" method="post" target="_blank"> 
          <table>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label" >Berdasarkan Bulan</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="bulan-cetak" class="form-control">
                  <option readonly="">-PILIH BULAN-</option>
                  <option value="-01-">Januari</option>
                  <option value="-02-">Februari</option>
                  <option value="-03-">Maret</option>
                  <option value="-04-">April</option>
                  <option value="-05-">Mei</option>
                  <option value="-06-">Juni</option>
                  <option value="-07-">Juli</option>
                  <option value="-08-">Agustus</option>
                  <option value="-09-">September</option>
                  <option value="-10-">Oktober</option>
                  <option value="-11-">November</option>
                  <option value="-12-">Desember</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Berdasarkan Tahun</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="tahun-cetak" class="form-control">
                  <option readonly="">-PILIH TAHUN-</option>
                  <?php if(mysqli_num_rows($qrytahun)) { ?>
                  <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                  <option><?php $formatwaktu = $row["tgl_aw"];echo date('Y',strtotime($formatwaktu)); ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>

              <button type="submit" name="cetak" class="btn btn-primary btn-sm">CETAK</button>
            <div align="">
            </div>
              
          </table>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="../laporan/data_cuti.php?id_cuti=<?php echo $row['id_cuti']; ?>" class="btn btn-primary" target="_blank">Cetak Semua</a>
        </div>
      </div>
    </div>
  </div>

<?php 
    $qrytahun = mysqli_query($koneksi, "SELECT YEAR(tgl_pensiun) AS tahun_pensiun FROM t_pensiun GROUP BY YEAR(tgl_pensiun)
    ")?>
  <div class="modal fade" id="pensiunc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../laporan/data_pensiun.php" method="post" target="_blank"> 
          <table>
            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Berdasarkan Tahun</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select style="color: black;" name="tahun-cetak" class="form-control">
                  <option readonly="">-PILIH TAHUN-</option>
                  <?php if(mysqli_num_rows($qrytahun)) { ?>
                  <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                  <option><?php 
                    $formatwaktu = $row["tahun_pensiun"];
                    echo date('Y',strtotime($formatwaktu)); 
                    ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>

              <button type="submit" name="cetak" class="btn btn-primary btn-sm">CETAK</button>
            <div align="">
            </div>
              
          </table>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="../laporan/data_pensiun.php?id_pensiun=<?php echo $row['id_pensiun']; ?>" class="btn btn-primary" target="_blank">Cetak Semua</a>
        </div>
      </div>
    </div>
  </div>



  <?php 
    $qrytahun = mysqli_query($koneksi, "SELECT YEAR(tanggal) AS tahun_absen FROM absen_pegawai GROUP BY YEAR(tanggal)
    ")?>
  <div class="modal fade" id="kinerjac" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../laporan/data_kinerja.php" method="post" target="_blank"> 
          <table>
          <div class="form-group row">
              <label class="col-sm-5 col-form-label" >Berdasarkan Bulan</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select required style="color: black;" name="bulan-cetak" class="form-control">
                  <option readonly="">-PILIH BULAN-</option>
                  <option value="-01-">Januari</option>
                  <option value="-02-">Februari</option>
                  <option value="-03-">Maret</option>
                  <option value="-04-">April</option>
                  <option value="-05-">Mei</option>
                  <option value="-06-">Juni</option>
                  <option value="-07-">Juli</option>
                  <option value="-08-">Agustus</option>
                  <option value="-09-">September</option>
                  <option value="-10-">Oktober</option>
                  <option value="-11-">November</option>
                  <option value="-12-">Desember</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-5 col-form-label">Berdasarkan Tahun</label>
            </div>
              <div class="col-sm-12" style="margin-bottom: 10px;">
                <select required style="color: black;" name="tahun-cetak" class="form-control">
                  <option readonly="">-PILIH TAHUN-</option>
                  <?php if(mysqli_num_rows($qrytahun)) { ?>
                  <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                  <option><?php 
                    $formatwaktu = $row["tahun_absen"];
                    echo date('Y',strtotime($formatwaktu)); 
                    ?></option>
                  <?php } ?>
                  <?php } ?>
                </select>
              </div>
            </div>

              
            <div align="">
            </div>
              
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="cetak" class="btn btn-primary btn-sm">CETAK BULANAN</button>
        </div>
        </form>
      </div>
    </div>
  </div>