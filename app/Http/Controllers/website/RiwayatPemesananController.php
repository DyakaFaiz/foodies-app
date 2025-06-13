<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class RiwayatPemesananController extends Controller
{
    public function index()
    {
        $idTamu = session()->get('idTamu');

        $pesanan = DB::table('pesanan')
            ->select([
                'pesanan.*',
                'pesanan.kode_pesanan AS kodePesanan',
                'pesanan.created_at AS tanggalPemesanan',
                'pesanan.waktu_pengiriman AS tanggalPengiriman',
                'pelanggan.nama AS namaPelanggan',
                'pelanggan.nomor_hp AS noHp',
                'pelanggan.alamat AS alamatPelanggan',
            ])
            ->where('pesanan.id_tamu', $idTamu)
            ->leftJoin('pelanggan', 'pelanggan.id_tamu', '=', 'pesanan.id_tamu')
            ->get();

        $data = [
            'pesanan'   => $pesanan
        ];
        return view('website.order.index', $data);
    }

    public function show($idPesanan)
    {
        $pesanan = DB::table('pesanan')
            ->select([
                'pesanan.*',
                'pesanan.created_at AS tanggalPemesanan',
                'pesanan.waktu_pengiriman AS tanggalPengiriman',
                'pesanan.alamat_pengiriman AS alamatPengiriman',
                'pesanan.metode_pembayaran AS metodePembayaran',
                'pelanggan.nama AS namaPelanggan',
                'pelanggan.nomor_hp AS noHp',
                'pelanggan.alamat AS alamatPelanggan',
                'pesanan.bukti_transfer AS buktiTransfer',
                'pesanan.kode_pesanan AS kodePesanan',
            ])
            ->where('pesanan.id', $idPesanan)
            ->leftJoin('pelanggan', 'pelanggan.id_tamu', '=', 'pesanan.id_tamu')
            ->first();

        $items = DB::table('detail_pesanan')
            ->select([
                'detail_pesanan.*',
                'produk.*'
            ])
            ->where('detail_pesanan.id_pesanan', $idPesanan)
            ->leftJoin('produk', 'produk.id', '=', 'detail_pesanan.id_produk')
            ->get();

        $data = [
            'pesanan'  => $pesanan,
            'items'  => $items,
        ];

        return view('website.order.show', $data);
    }
}
