@extends('layout.main')

@section('content')
<section class="my-account container">
    <h2 class="page-title">Orders</h2>
    <div class="row">
        <div class="col-lg-10">
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="min-width: 100px;">Order No</th>
                                <th style="min-width: 120px;">Name</th>
                                <th class="text-center" style="min-width: 120px;">Phone</th>
                                <th class="text-center" style="min-width: 100px;">Total</th>
                                <th class="text-center" style="min-width: 120px;">Status</th>
                                <th class="text-center" style="min-width: 130px;">Order Date</th>
                                <th class="text-center" style="min-width: 130px;">Delivered On</th>
                                <th class="text-center" style="min-width: 80px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $row)
                            <tr>
                                <td class="text-center">{{ $row->kodePesanan }}</td>  
                                <td>{{ $row->namaPelanggan }}</td>
                                <td class="text-center">{{ $row->noHp }}</td>
                                <td class="text-center">Rp. {{ number_format($row->total, 0, ',', '.'); }}</td>
                                <td class="text-center">
                                    @if ($row->status == 0)
                                        <span class="badge bg-info">Menunggu</span>
                                    @elseif ($row->status == 1)
                                        <span class="badge bg-warning">Diproses</span>
                                    @elseif ($row->status == 2)
                                        <span class="badge bg-primary">Dikirim</span>
                                    @elseif ($row->status == 3)
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif ($row->status == 9)
                                        <span class="badge bg-danger">Dibatalkan</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak diketahui</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ \Carbon\Carbon::parse($row->tanggalPemesanan)->format('d M Y') }}
                                </td>
                                <td class="text-center">{{ $row->tanggalPengiriman != null ? \Carbon\Carbon::parse($row->tanggalPengiriman)->format('d M Y') : '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('show-riwayat', ['idPesanan' => $row->id]) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">                
                
            </div>
        </div>
        
    </div>
</section>
@endsection

@section('custom-js')

@endsection