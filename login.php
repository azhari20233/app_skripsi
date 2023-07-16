<?php 
  session_start();
  require "koneksi.php";
  error_reporting(0);
  $username  = $_REQUEST['username'];
  $password = $_REQUEST['password'];

  if(isset($_POST['login'])){

  $admin = mysqli_query($koneksi, "SELECT * FROM t_admin WHERE username='$username' AND password='$password'") or die(mysqli_error($koneksi));
  $cek = mysqli_fetch_array($admin);

if($cek['level'] == 'admin'){
      $_SESSION['id_admin'] =$cek['id_admin'];
      $_SESSION['level']   =$cek['level'];
      ?> <script>window.location='adimin/index.php'</script> <?php
    }else if($cek['level'] == 'atasan'){
      $_SESSION['id_admin'] =$cek['id_admin'];
      $_SESSION['level']   =$cek['level'];
      ?> <script>window.location='atasans/index.php'</script> <?php
    }else if($cek['level'] == 'pegawai'){
      $_SESSION['id_admin'] = $cek['id_admin'];
      $_SESSION['level'] = $cek['level'];
      ?> <script>window.location='pegawai/index.php'</script> <?php
    }else{
      ?><script>alert('Gagal Login');window.location="index.html"; </script><?php
    }
  }
?>