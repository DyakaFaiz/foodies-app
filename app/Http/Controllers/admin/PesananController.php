<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use function Laravel\Prompts\select;

class PesananController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('pesanan')
            ->select([
                'pesanan.*',
                'pelanggan.nama AS namaPelanggan',
                'pelanggan.nomor_hp AS noHp',
            ])
            ->leftJoin('pelanggan', 'pelanggan.id_tamu', '=', 'pesanan.id_tamu')
            ->orderBy('pesanan.created_at', 'desc');

        // Tambahkan filter pencarian
        if ($request->filled('q')) {
            $q = $request->q;

            $query->where(function ($sub) use ($q) {
                $sub->where('pelanggan.nama', 'like', '%' . $q . '%')
                    ->orWhere('pelanggan.nomor_hp', 'like', '%' . $q . '%')
                    ->orWhere('pesanan.kode_pesanan', 'like', '%' . $q . '%')
                    ->orWhere('pesanan.alamat_pengiriman', 'like', '%' . $q . '%')
                    ->orWhere('pesanan.total', 'like', '%' . $q . '%')
                    ->orWhere('pesanan.status', 'like', '%' . $q . '%')
                    ->orWhere('pesanan.id_tamu', 'like', '%' . $q . '%')
                    ->orWhereExists(function ($exists) use ($q) {
                        $exists->select(DB::raw(1))
                            ->from('detail_pesanan')
                            ->join('produk', 'produk.id', '=', 'detail_pesanan.id_produk')
                            ->whereRaw('detail_pesanan.id_pesanan = pesanan.id')
                            ->where(function ($sub2) use ($q) {
                                $sub2->where('produk.nama', 'like', '%' . $q . '%')
                                    ->orWhere('detail_pesanan.jumlah', 'like', '%' . $q . '%');
                            });
                    });
            });
        }

        $pesanan = $query->get();

        // Ambil detail pesanan untuk setiap baris
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

        $data = [
            'title' => 'Pesanan',
            'pesanan' => $pesanan,
        ];

        return view('admin.pesanan.index', $data);
    }


    public function setuju(Request $request, $id)
    {
        $pesanan = DB::table('pesanan')->where('id', $id)->update([
            'status' => 1
        ]);

        return redirect()->back()->with('success', 'Berhasil menyetujui pesanan.');
    }

    public function kirimPesanan(Request $request, $id)
    {
        $pesanan = DB::table('pesanan')->where('id', $id)->update([
            'status' => 2,
            'waktu_pengiriman' => now()
        ]);

        return redirect()->back()->with('success', 'Berhasil mengirim pesanan.');
    }

    public function selesai(Request $request, $id)
    {
        $pesanan = DB::table('pesanan')->where('id', $id)->update([
            'status' => 3,
            'waktu_selesai' => now()
        ]);

        return redirect()->back()->with('success', 'Pesanan selesai.');
    }
}
