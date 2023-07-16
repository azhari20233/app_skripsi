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

$user_query = mysqli_query($koneksi, "SELECT * FROM t_admin INNER JOIN t_pegawai ON t_admin.id_pg=t_pegawai.id_pg WHERE id_admin = '$session_id'")or die(mysqli_error($koneksi));
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
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti ti-calendar"></i><span>Absensi & Cuti</span></a>
                                <ul class="collapse">   
                                    <li><a href="absensi.php">Absensi</a></li>
                                    <li><a href="cuti.php">Cuti</a></li>
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
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $user_row['nama_lengkap'];?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <!-- <a class="dropdown-item" href="#">Message</a> -->
                                <a class="dropdown-item" href="../logout.php" onClick="javascript: return confirm('Yakin Ingin Logout?');">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->