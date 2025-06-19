@extends('layout.admin.main')

@section('content-admin')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="tf-section-2 mb-30">
            <div class="flex gap20 flex-wrap-mobile">
                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Total Pesanan</div>
                                    <h4>{{ $semuaOrder }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Total Pesanan Diproses</div>
                                    <h4>{{ $pesananDiprosess }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Pesanan Terkirim</div>
                                    <h4>{{ $orderTerkirim }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Pesanan Tertunda</div>
                                    <h4>{{ $orderPending }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Jumlah Total</div>
                                    <h4>{{ number_format($totalOrder, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Jumlah Total Pesanan Diproses</div>
                                    <h4>{{ number_format($totalPesananDiproses, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Jumlah Pesanan Terkirim</div>
                                    <h4>{{ number_format($totalOrderTerkirim, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Jumlah Pesanan Tertunda</div>
                                    <h4>{{ number_format($totalOrderPending, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Pendapatan Minggu Ini</h5>
                    {{-- <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);">This Week</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Last Week</a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
                <div class="flex flex-wrap gap40">
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t1"></div>
                                <div class="text-tiny">Pendapatan</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>{{ number_format($totalChartPendapatan, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t3"></div>
                                <div class="text-tiny">Pesanan</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>{{ $totalChartPesanan }}</h4>
                        </div>
                    </div>
                </div>
                <div id="line-chart-8"></div>
            </div>

        </div>
        <div class="tf-section mb-30">

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Pesanan terbaru</h5>
                    {{-- <div class="dropdown default">
                        <a class="btn btn-secondary dropdown-toggle" href="#">
                            <span class="view-all">View all</span>
                        </a>
                    </div> --}}
                </div>
                <div class="wg-table table-all-user">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>OrderNo</th>
                                    <th>Nama</th>
                                    <th class="text-center">Pesanan</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">No HP</th>
                                    <th class="text-center">Pembayaran</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $row)
                                    <tr>
                                        <td class="text-center">{{ $row->kode_pesanan }}</td>
                                        <td class="text-center">{{ $row->namaPelanggan }}</td>
                                        <td class="text-center">{!! $row->detailPesanan !!}</td>
                                        <td class="text-center">{{ $row->alamat_pengiriman }}</td>
                                        <td class="text-center">{{ $row->noHp }}</td>
                                        <td class="mb-1">
                                            @if($row->metode_pembayaran == 0)
                                                <span class="badge bg-primary">COD</span>
                                            @elseif($row->metode_pembayaran == 1)
                                                <span class="badge bg-info">Transfer</span>
                                            @else
                                                <span class="badge bg-dark">Tidak Diketahui</span>
                                            @endif
                                                <span class="badge bg-success">{{ number_format($row->total, 0, ',', '.') }}</span>
                                        </td>

                                        <td>
                                            @php
                                                $statusList = [
                                                    0 => ['label' => 'Menunggu', 'class' => 'secondary'],
                                                    1 => ['label' => 'Diproses', 'class' => 'warning'],
                                                    2 => ['label' => 'Dikirim', 'class' => 'info'],
                                                    3 => ['label' => 'Selesai', 'class' => 'success'],
                                                ];
                                            @endphp

                                            <span class="badge bg-{{ $statusList[$row->status]['class'] }}">
                                                {{ $statusList[$row->status]['label'] }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

@section('custom-js-admin')
<script>
    (function ($) {

        var tfLineChart = (function () {

            var chartBar = function () {

                var options = {
                    series: [
                        {
                            name: 'Pendapatan',
                            type: 'column',
                            data: {!! json_encode($chartPendapatan) !!}
                        },
                        {
                            name: 'Pesanan',
                            type: 'line',   
                            data: {!! json_encode($chartPesanan) !!}
                        }
                    ],
                    chart: {
                        height: 350,
                        type: 'line'
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '10px',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show: false,
                    },
                    colors: ['#2377FC', '#FF5200'],
                    stroke: {
                        width: [0, 1]
                    },
                    xaxis: {
                        categories: {!! json_encode($labels) !!},
                    },
                    yaxis: [
                        {
                            title: {
                                text: 'Pendapatan',
                                offsetX: -18
                            },
                            labels: {
                                formatter: function (val) {
                                    return 'Rp. ' + val.toLocaleString('id-ID');
                                }
                            }
                        },
                        {
                            opposite: true,
                            title: {
                                text: 'Jumlah Pesanan',
                                offsetX: 18
                            }
                        }
                    ],
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: [
                            {
                                formatter: function (val) {
                                    return 'Rp. ' + val.toLocaleString('id-ID');
                                }
                            },
                            {
                                formatter: function (val) {
                                    return val + ' pesanan';
                                }
                            }
                        ]
                    }

                };

                chart = new ApexCharts(
                    document.querySelector("#line-chart-8"),
                    options
                );
                if ($("#line-chart-8").length > 0) {
                    chart.render();
                }
            };

            /* Function ============ */
            return {
                init: function () { },

                load: function () {
                    chartBar();
                },
                resize: function () { },
            };
        })();

        jQuery(document).ready(function () { });

        jQuery(window).on("load", function () {
            tfLineChart.load();
        });

        jQuery(window).on("resize", function () { });
    })(jQuery);
</script>
@endsection