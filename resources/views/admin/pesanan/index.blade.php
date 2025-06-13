@extends('layout.admin.main')

@section('content-admin')
@php
    use Carbon\Carbon;
@endphp
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ $title }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="#">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{ $title }}</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <form class="form-search" method="GET" action="{{ route('admin.pesanan.index') }}">
                        <fieldset class="name">
                            <input type="text" placeholder="Cari pelanggan atau produk..." class="" name="q"
                                value="{{ request('q') }}">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 68px;">Nama</th>
                            <th style="width: 250px;">Pesanan</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>    
                    <tbody>
                        @foreach ($pesanan as $row)
                            <tr>
                                <td>{{ $row->kode_pesanan }}</td>
                                <td>{{ $row->namaPelanggan }}</td>
                                <td>{!! $row->detailPesanan !!}</td> {{-- Pakai {!! !!} agar <br> tampil --}}
                                <td>{{ $row->alamat_pengiriman }}</td>
                                <td>{{ $row->noHp }}</td>
                                <td class="mb-1">
                                    @if($row->metode_pembayaran == 0)
                                        <span class="badge bg-primary">COD</span>
                                    @elseif($row->metode_pembayaran == 1)
                                        <span class="badge bg-info">Transfer</span>
                                        <a href="{{ asset('storage/bukti-transfer/' . $row->bukti_transfer) }}" target="_blank" class="px-4 border-bottom  fw-bold rounded fst-italic">bukti</a>
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
                                <td>
                                    @if ($row->status == 0)
                                        <form action="{{ route('admin.pesanan.setuju', $row->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-outline-success">
                                                <i class="bi bi-check-circle"></i> Setuju
                                            </button>
                                        </form>
                                    @elseif ($row->status == 1)
                                        <form action="{{ route('admin.pesanan.kirim', $row->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning">
                                                <i class="bi bi-truck"></i> Kirim Pesanan
                                            </button>
                                        </form>
                                    @elseif ($row->status == 2)
                                        <form action="{{ route('admin.pesanan.selesai', $row->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success">
                                                <i class="bi bi-check2-square"></i> Selesaikan pesanan 
                                            </button>
                                        </form>
                                    @elseif ($row->status == 3)
                                        @php
                                            $waktu = Carbon::parse($row->waktu_selesai)->translatedFormat('d F Y H:i:s');
                                        @endphp

                                        <span class="badge bg-dark">{{ $waktu }}</span>

                                    @else
                                        <span class="text-muted">Tidak ada aksi</span>
                                    @endif
                                </td>

                                {{-- <td>
                                    <div class="list-icon-function gap-0">
                                        <a href="{{ route('admin.produk.edit', ['id' => $row->id]) }}">
                                            <div class="item edit">
                                                <i class="icon-edit-3"></i>
                                            </div>
                                        </a>
                                        <form action="{{ route('admin.produk.delete', ['id' => $row->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="item text-danger delete" style="border: none; background: none;">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

            </div>
        </div>
    </div>
</div>
@endsection