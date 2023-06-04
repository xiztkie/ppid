<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">TOTAL PERMOHONAN DATA</p>
                                    <h4 class="mb-2"><?= $countpermohonan; ?></h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class=" fas fa-file-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">PERMOHONAN BARU</p>
                                    <h4 class="mb-2"><?= $countbaru; ?></h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="fas fa-cloud-download-alt font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">PERMOHONAN SELESAI</p>
                                    <h4 class="mb-2"><?= $countselesai; ?></h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="fas fa-check-double font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">TOTAL DATA INFOPUBLIK</p>
                                    <h4 class="mb-2"><?= $countinfopublik; ?></h4>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="fas fa-database font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div id="chart" class="apex-charts" ></div>
                        </div>
                    </div><!--end card-->
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div id="chart1" class="apex-charts" ></div>
                        </div>
                    </div><!--end card-->
                </div>
            </div>
            <script>
                var kategori = <?php echo json_encode($namainstansi); ?>;
                var jumlah = <?php echo json_encode($jumlahpermohonan); ?>;

                var options = {
                    chart: {
                        type: 'bar',
                    },
                    series: [{
                        name: 'Jumlah',
                        data: jumlah,
                    }],
                    xaxis: {
                        categories: kategori,
                    },
                    plotOptions: {
                        bar: {
                            barHeight: '80%' // Set proporsi tinggi batang grafik relatif terhadap tinggi kartu
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            </script>
            <script>
                var kategori = <?php echo json_encode($namainstansi); ?>;
                var jumlah = <?php echo json_encode($jumlahpermohonan); ?>;

                var options = {
                    chart: {
                        type: 'donut',
                    },
                    series: jumlah,
                    labels: kategori,
                };

                var chart = new ApexCharts(document.querySelector("#chart1"), options);
                chart.render();
            </script>



            <!-- end row -->