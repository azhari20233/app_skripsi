<?php require_once("head.php"); ?>

            <div class="main-content-inner">
                <div class="row">
                    <!-- seo fact area start -->
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-4 mt-5 mb-3">
                                <a href="absensi.php">
                                    <div class="card">
                                        <div class="seo-fact bg-dark">
                                            <div class="p-4 d-flex justify-content-between align-items-center">
                                                <div class="seofct-icon"><i class="ti ti-check-box"></i> Absensi</div>
                                            </div>
                                            <canvas id="seolinechart2" height="50"></canvas>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-4 mt-5 mb-3">
                                <a href="cuti.php">
                                    <div class="card">
                                        <div class="seo-fact bg-dark">
                                            <div class="p-4 d-flex justify-content-between align-items-center">
                                                <div class="seofct-icon"><i class="ti ti-control-pause"></i> Cuti</div>
                                            </div>
                                            <canvas id="seolinechart1" height="50"></canvas>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- seo fact area end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <?php require_once("foot.php"); ?>
