<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $produk = DB::table('produk')
        ->leftJoin('detail_pesanan', 'produk.id', '=', 'detail_pesanan.id_produk')
        ->select(
            'produk.*',
            DB::raw('COALESCE(SUM(detail_pesanan.jumlah), 0) AS total_terjual')
        )
        ->groupBy('produk.id')
        ->get();

        $pesanan = DB::table('pesanan')
            ->select([
                'pesanan.*',
                'pelanggan.nama AS namaPelanggan',
                'pelanggan.nomor_hp AS noHp',
            ])
            ->leftJoin('pelanggan', 'pelanggan.id_tamu', '=', 'pesanan.id_tamu')
            ->orderBy('pesanan.created_at', 'desc')
            ->limit(3)
            ->get();

        $semuaOrder = DB::table('pesanan')->count();
        $totalOrder = DB::table('pesanan')->sum('total');

        $pesananDiprosess = DB::table('pesanan')->whereIn('status', [1,2])->count();
        $totalPesananDiproses = DB::table('pesanan')->whereIn('status', [1,2])->sum('total');

        $orderTerkirim = DB::table('pesanan')->where('status', 3)->count();
        $totalOrderTerkirim = DB::table('pesanan')->where('status', 3)->sum('total');

        $totalOrderPending = DB::table('pesanan')->where('status', 0)->sum('total');
        $orderPending = DB::table('pesanan')->where('status', 0)->count();

        foreach ($pesanan as $row) {
            $detail = DB::table('detail_pesanan')
                ->leftJoin('produk', 'produk.id', '=', 'detail_pesanan.id_produk')
                ->where('id_pesanan', $row->id)
                ->select('produk.nama', 'detail_pesanan.jumlah')
                ->get();

            $row->detailPesanan = $detail->map(function ($item) {
                return $item->nama . ' <span class="badge bg-warning">' . $item->jumlah . 'x</span>';
            })->implode('<br>');
        }

        $labels = [];
        $chartPendapatan = [];
        $chartPesanan = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);

            $labels[] = $date->translatedFormat('D'); // Singkatan hari (Sen, Sel, Rab, dst)
            $chartPendapatan[] = DB::table('pesanan')
                ->whereDate('created_at', $date)
                ->sum('total');
            $chartPesanan[] = DB::table('pesanan')
                ->whereDate('created_at', $date)
                ->count();
        }

        $totalChartPendapatan = array_sum($chartPendapatan);
        $totalChartPesanan = array_sum($chartPesanan);

        $data = [
            'title' => 'Dashboard',
            'produk'    => $produk,
            'pesanan'    => $pesanan,
            'semuaOrder'    => $semuaOrder,
            'pesananDiprosess'    => $pesananDiprosess,
            'totalPesananDiproses'    => $totalPesananDiproses,
            'totalOrder'    => $totalOrder,
            'orderTerkirim'    => $orderTerkirim,
            'totalOrderTerkirim'    => $totalOrderTerkirim,
            'orderPending'    => $orderPending,
            'totalOrderPending'    => $totalOrderPending,
            'totalChartPendapatan'    => $totalChartPendapatan,
            'chartPendapatan'    => $chartPendapatan,
            'chartPesanan'    => $chartPesanan,
            'totalChartPesanan'    => $totalChartPesanan,
            'labels'    => $labels,
        ];

        return view('admin.dashboard.index', $data);
    }
}
