@extends('Layout.template')
@section('content')
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <?php if (session('sukses')) {    ?>
            <div class="alert alert-success alert-dismissible fade in mb-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Selamat</strong> <?= session('sukses'); ?>
            </div>
        <?php } ?>
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!--/ project charts -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body ">
                            <div class="card-header mt-2 mb-1 " style="text-align: center;">
                                <h4>GRAFIK PENGELUARAN DAN PEMASUAKAN UANG KAS MUSHOLLA ATTAUBAH</h4>
                            </div>
                            <canvas id="myChart" height="100"></canvas>
                            <?php
                            $total_pemasukan = 0;
                            $total_pengeluaran = 0;
                            $nama_bulan = ' ';
                            foreach ($pemasukan as $gt) :
                                $pemasukankas[] = $gt->pemasukan;
                                $total_pemasukan = $total_pemasukan + $gt->pemasukan;
                                $seleksi =  $gt->bulan_kas;
                                if ($seleksi == '1') {
                                    $nama_bulan = 'januari';
                                } elseif ($seleksi == '2') {
                                    $nama_bulan = 'Februari';
                                } elseif ($seleksi == '3') {
                                    $nama_bulan = 'Maret';
                                } elseif ($seleksi == '4') {
                                    $nama_bulan = 'April';
                                } elseif ($seleksi == '5') {
                                    $nama_bulan = 'Mei';
                                } elseif ($seleksi == '6') {
                                    $nama_bulan = 'Juni';
                                } elseif ($seleksi == '7') {
                                    $nama_bulan = 'Juli';
                                } elseif ($seleksi == '8') {
                                    $nama_bulan = 'Agustus';
                                } elseif ($seleksi == '9') {
                                    $nama_bulan = 'September';
                                } elseif ($seleksi == '10') {
                                    $nama_bulan = 'Oktober';
                                } elseif ($seleksi == '11') {
                                    $nama_bulan = 'November';
                                } elseif ($seleksi == '12') {
                                    $nama_bulan = 'Desember';
                                }
                                $bulan[] = $nama_bulan;
                            endforeach;


                            foreach ($pengeluaran as $gb) :
                                $pengeluaran_kas[] = $gb->pengeluaran;
                                $total_pengeluaran = $total_pengeluaran + $gb->pengeluaran;
                            endforeach;

                            ?>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-xs-4 text-xs-center">
                                    <span class="text-muted">Pemasukan</span>
                                    <h2 class="block font-weight-normal">{{"Rp " . number_format($total_pemasukan, 0, ',', '.')}}</h2>
                                    <progress class="progress progress-xs mt-2 progress-success" value="{{($total_pemasukan / 1000000000) * 100 }}" max="100"></progress>
                                </div>
                                <div class="col-xs-4 text-xs-center">
                                    <span class="text-muted">Pengeluaran</span>
                                    <h2 class="block font-weight-normal"><?= "Rp " . number_format($total_pengeluaran, 0, ',', '.'); ?></h2>
                                    <progress class="progress progress-xs mt-2 progress-danger" value="{{ ($total_pengeluaran / $total_pemasukan) * 100 }}" max="100"></progress>
                                </div>
                                <div class="col-xs-4 text-xs-center">
                                    <span class="text-muted">Saldo</span>
                                    <h2 class="block font-weight-normal"><?= "Rp " . number_format($total_pemasukan - $total_pengeluaran, 0, ',', '.'); ?></h2>
                                    <progress class="progress progress-xs mt-2 progress-success" value="<?php $saldo = $total_pemasukan - $total_pengeluaran;
                                                                                                        echo ($saldo / 1000000000) * 100; ?>" max="100"></progress>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ project charts -->
        </div>
    </div>
</div>
<!-- cdn chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>

<script type="text/javascript">
    var ctx2 = document.getElementById('myChart').getContext('2d');
    //var ctx2 = $('#myChart');
    var myChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($bulan); ?>,
            datasets: [{
                    label: "Pemasukan",
                    data: <?php echo json_encode($pemasukankas); ?>,
                    backgroundColor: "transparent",
                    borderColor: "#eeda54",
                    borderWidth: 2,
                },
                {
                    label: "Pengeluaran",
                    data: <?php echo json_encode($pengeluaran_kas); ?>,
                    backgroundColor: "transparent",
                    borderColor: "#40cae4",
                },
            ]
        }
    });
</script>
@endsection