<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); require_once("../fungsi_rupiah.php"); ?>


<div class="main-content-inner">
  <div class="row">
    <!-- Dark table start -->
      <div class="col-4 mt-5">
          <div class="card">
              <div class="card-body">
                <h4 class="mb-4">Cetak Data Mutasi Pegawai <i class="ti ti-exchange-vertical"></i></h4>
            <div class="card-body">
              <?php $qrytahun = mysqli_query($koneksi, "SELECT * FROM mutasi INNER JOIN t_pegawai ON mutasi.id_pg=t_pegawai.id_pg INNER JOIN jabatan ON t_pegawai.id_jabatan=jabatan.id_jabatan GROUP BY YEAR(tgl_m) ASC"); ?>
                  <form action="../laporan/data_mutasi.php" method="post" target="_blank"> 
                    <table>
                      <label class="form-label" >Berdasarkan Bulan</label>
                        <div class="" style="margin-bottom: 10px;">
                          <!-- <select style="color: black;" name="bulan-cetak" class="form-control">
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
                          </select> -->
                        </div>
                        <label class="form-label">Berdasarkan Tahun</label>
                          <div class="" style="margin-bottom: 10px;">
                            <!-- <select style="color: black;" name="tahun-cetak" class="form-control">
                              <option readonly="">-PILIH TAHUN-</option>
                              <?php if(mysqli_num_rows($qrytahun)) { ?>
                              <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                              <option><?php $formatwaktu = $row["tgl_m"];echo date('Y',strtotime($formatwaktu)); ?></option>
                              <?php } ?>
                              <?php } ?>
                            </select> -->
                          </div>
                      <div class="" style="margin-bottom: 10px;">
                      <!-- <button type="submit" title="Cetak Data" name="cetak" class="btn btn-primary"><i class="mdi ti-check"></i></button> -->
                      <a title="Cetak Semua Data" href="../laporan/data_mutasi.php?id_mutasi=<?php echo $row['id_mutasi']; ?>" class="btn btn-dark" target="_blank"><i class="mdi ti-check-box"></i></a>
                    </div>
                </form>
              </div>
          </div>
      </div>
    <!-- Dark table end -->
  </div>
</div>
  <?php require_once("foot.php"); ?>