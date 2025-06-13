@extends('layout.main')

@section('content')
<section class="my-account container">
    <h2 class="page-title">Detail Pesanan</h2>
    <div class="row">
        <div class="col-lg-10">
            <div class="wg-box mt-5 mb-5">
            <div class="row">
                <div class="col-6">
                <h5>Detail Pesanan</h5>
                </div>
                <div class="col-6 text-right">
                <a class="btn btn-sm btn-danger" href="{{ url()->previous() }}">Kembali</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-transaction">
                <tbody>
                    <tr>
                        <th>Kode Pesanan</th>
                        <td>{{ $pesanan->kodePesanan }}</td>
                        <th>No HP</th>
                        <td>{{ $pesanan->noHp }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pesanan</th>
                        <td>{{ \Carbon\Carbon::parse($pesanan->tanggalPemesanan)->format('d M Y') }}</td>
                        <th>Tanggal Pengiriman</th>
                        <td>{{ isset($pesanan->tanggalPengiriman) ? \Carbon\Carbon::parse($pesanan->tanggalPengiriman)->format('d-m-Y') : "-" }}</td>
                    </tr>
                    <tr>
                        <th>Status Pesanan</th>
                        <td colspan="5">
                            @if ($pesanan->status == 0)
                                <span class="badge bg-info">Menunggu</span>
                            @elseif ($pesanan->status == 1)
                                <span class="badge bg-info">Diproses</span>
                            @elseif ($pesanan->status == 2)
                                <span class="badge bg-primary">Dikirim</span>
                            @elseif ($pesanan->status == 3)
                                <span class="badge bg-success">Selesai</span>
                            @elseif ($pesanan->status == 9)
                                <span class="badge bg-danger">Dibatalkan</span>
                            @else
                                <span class="badge bg-secondary">Tidak diketahui</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
            <div class="wg-box wg-table table-all-user">
            <div class="row">
                <div class="col-6">
                <h5>Produk Pesanan</h5>
                </div>
                <div class="col-6 text-right">

                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>Nama</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $items as $row)                        
                        <tr>
                            <td class="pname">
                                <div class="image">
                                <img src="{{ url('') }}/assets/images/home/demo3/{{ $row->foto }}" alt=""
                                    class="image" width="160">
                                </div>
                                <div class="name">
                                <a href="{{ url('') }}/assets/images/home/demo3/{{ $row->foto }}" target="_blank" class="body-title-2">{{ $row->nama }}</a>
                                </div>
                            </td>
                            <td class="text-center">{{ number_format($row->harga, 0, ',', '.'); }}</td>
                            <td class="text-center">{{ $row->jumlah }}</td>
                        </tr>
                    @endforeach

                </tbody>
                </table>
            </div>
            </div>
            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

            </div>

            <div class="wg-box mt-5">
            <h5>Alamat Pengiriman</h5>
            <div class="my-account__address-item col-md-6">
                <div class="my-account__address-item__detail">
                    <p>{{ $pesanan->alamatPengiriman }}</p>
                </div>
            </div>
            </div>

            <div class="wg-box mt-5">
            <h5>Transaksi</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-transaction">
                <tbody>
                    <tr>
                        <th>Total</th>
                        <td>Rp. {{ number_format($pesanan->total, 0, ',', '.'); }}</td>
                        <th>Metode Pembayaran</th>
                        <td>
                            {{ $pesanan->metodePembayaran == 0 ? 'Cash on Delivery' : 'Transfer' }}
                            @if ($pesanan->metodePembayaran == 1)
                                <a href="{{ asset('storage/bukti-transfer/' . $pesanan->buktiTransfer) }}" target="_blank" class="px-2 bg-info rounded fst-italic">bukti</a>
                            @endif
                        </td>
                        <th>Status</th>
                        <td>
                            @if ($pesanan->status == 0)
                                <span class="badge bg-info">Menunggu</span>
                            @elseif ($pesanan->status == 1)
                                <span class="badge bg-info">Diproses</span>
                            @elseif ($pesanan->status == 2)
                                <span class="badge bg-primary">Dikirim</span>
                            @elseif ($pesanan->status == 3)
                                <span class="badge bg-success">Selesai</span>
                            @elseif ($pesanan->status == 9)
                                <span class="badge bg-danger">Dibatalkan</span>
                            @else
                                <span class="badge bg-secondary">Tidak diketahui</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>

            <div class="wg-box mt-5 text-right">
            {{-- <form action="http://localhost:8000/account-order/cancel-order" method="POST">
                <input type="hidden" name="_token" value="3v611ELheIo6fqsgspMOk0eiSZjncEeubOwUa6YT" autocomplete="off">
                <input type="hidden" name="_method" value="PUT"> <input type="hidden" name="order_id" value="1">
                <button type="submit" class="btn btn-danger">Cancel Order</button>
            </form> --}}
            </div>
        </div>

    </div>
</section>
@endsection

@section('custom-js')

@endsection