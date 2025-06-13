<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index($idTamu)
    {
        $cart = DB::table('keranjang')
                    ->orWhere('id_tamu', $idTamu ?? null)
                    ->where('status', 0)
                    ->first();

        $items = [];
        if ($cart) {
            $items = DB::table('isi_keranjang')
                ->join('produk', 'isi_keranjang.id_produk', '=', 'produk.id')
                ->where('isi_keranjang.id_keranjang', $cart->id)
                ->select('isi_keranjang.*', 'produk.*', 'isi_keranjang.id AS idItem', 'produk.id AS idProduk') // pilih kolom yang diperlukan
                ->get();
        }

        $data = [
            'cart'  => $cart,
            'items' => $items,
            'idTamu' => $idTamu,
        ];

        return view('website.cart.index', $data);
    }

    public function store(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'idProduk' => 'required|exists:produk,id',
            'jumlahPesanan' => 'required|integer|min:1',
            // 'idTamu' => 'required|string|unique:pelanggan,id_tamu',
        ]);

        // $tamu  = DB::table('pelanggan')->where('id_tamu', $request->idTamu)->first();

        // if(!$tamu){
        //     DB::table('pelanggan')->insert([
        //         'id_tamu'   => $request->idTamu,
        //     ]);
        // }

        // 2. Ambil atau buat keranjang aktif
        $cart = DB::table('keranjang')
        ->where('id_tamu', $request->idTamu)
        ->where('status', 0)
        ->first();

        if (!$cart) {
            $id = DB::table('keranjang')->insertGetId([
                'id_tamu' => $request->idTamu,
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $cart = DB::table('keranjang')->where('id', $id)->first();
        }

        // 3. Ambil produk dan harga saat ini
        $product = DB::table('produk')->where('id', $request->idProduk)->first();
        $hargaSekarang = $product->harga; // sesuaikan nama kolom harga

        // 4. Cek apakah produk sudah ada di cart_items
        $cartItem = DB::table('isi_keranjang')->where('id_keranjang', $cart->id)
                    ->where('id_produk', $product->id)
                    ->first();

        if ($cartItem) {
            // Jika sudah ada, update jumlah
             DB::table('isi_keranjang')
            ->where('id', $cartItem->id)
            ->update([
                'jumlah' => $cartItem->jumlah + $request->jumlahPesanan,
            ]);
        } else {
            // Jika belum ada, buat baru
            DB::table('isi_keranjang')->insert([
                'id_keranjang' => $cart->id,
                'id_produk' => $product->id,
                'jumlah' => $request->jumlahPesanan,
                'harga' => $hargaSekarang,
            ]);
        }

        return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang.']);
    }

    public function updateItem(Request $request, $idItem)
    {
        $item = DB::table('isi_keranjang')
            ->where('id', $idItem)
            ->where('id_produk', $request->idProduk)
            ->update([
                'jumlah'    => $request->jumlah,
            ]);

        $getKeranjang = DB::table('isi_keranjang')
            ->where('isi_keranjang.id_keranjang', $request->idKeranjang)
            ->get();

        $hitungTotal = $getKeranjang->sum(function ($item) {
            return $item->jumlah * $item->harga;
        });
        
        $formattedTotalHarga = number_format($hitungTotal, 0, ',', '.');

        return response()->json([
            'message' => 'Jumlah Berhasil diperbarui!.',
            'totalHarga'    => $formattedTotalHarga,
        ]);
    }

    public function deleteItem($id)
    {
        $item = DB::table('isi_keranjang')->where('id', $id)->delete();

        return redirect()->back();
    }

    public function shipping($idTamu)
    {
        $cart = DB::table('keranjang')
                    ->where('id_tamu', $idTamu)
                    ->where('status', 0)
                    ->first();

        $items = [];
        if ($cart) {
            $items = DB::table('isi_keranjang')
                ->join('produk', 'produk.id', '=', 'isi_keranjang.id_produk')
                ->where('isi_keranjang.id_keranjang', $cart->id)
                ->select('isi_keranjang.*', 'produk.*', 'isi_keranjang.id AS idItem') // pilih kolom yang diperlukan
                ->get();
        }

        if(!$items)
        {
            return response()->json("Item tidak ditemukan");
        }

        $data = [
            'items' => $items,
            'cart' => $cart,
        ];

        return view('website.cart.shipping', $data);
    }

    public function checkout(Request $request)
    {
        try{

            $idTamu = $request->idTamu;
            $alamat = $request->alamat;

            $paymentMethod = $request->metodePembayaran;

            if ($paymentMethod == 'transfer') {
                $request->validate([
                    'buktiTransfer' => 'required',
                ]);
            }

            $tamu = DB::table('pelanggan')->where('id_tamu', $idTamu)->first();
            if ($tamu) {
                DB::table('pelanggan')
                    ->where('id_tamu', $idTamu)
                    ->update([
                        'nama'  => $request->nama,
                        'nomor_hp'  => $request->hp,
                        'alamat'    => $alamat
                    ]);
            }

            $cart = DB::table('keranjang')
                        ->where('id_tamu', $idTamu)
                        ->where('status', 0)
                        ->first();

            $items = [];
            if ($cart) {
                $items = DB::table('isi_keranjang')
                    ->join('produk', 'isi_keranjang.id_produk', '=', 'produk.id')
                    ->where('isi_keranjang.id_keranjang', $cart->id)
                    ->select('isi_keranjang.*', 'produk.*', 'isi_keranjang.id AS idItem') // pilih kolom yang diperlukan
                    ->get();
            }

            if (empty($items)) {
                return response()->json(['message' => 'Isi keranjang kosong.'], 400);
            }

            $tanggalHariIni = Carbon::now()->format('Ymd');
            $lastOrder = DB::table('pesanan')
            ->whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'desc')
            ->first();
            if ($lastOrder && preg_match('/\d{4}$/', $lastOrder->kode_pesanan, $matches)) {
                $lastNumber = (int)$matches[0];
            } else {
                $lastNumber = 0;
            }

            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
            $kodePesananBaru = 'fds-' . $tanggalHariIni . '-' . $newNumber;
            
            // Buat order
            if ($paymentMethod == 'transfer') {
                if ($request->hasFile('buktiTransfer')) {
                    $path = $request->file('buktiTransfer')->store('bukti-transfer', 'public');

                    $fileName = basename($path);
                } else {
                    $fileName = null;
                }

                $idPesanan = DB::table('pesanan')->insertGetId([
                    'id_tamu' => $idTamu,
                    'kode_pesanan' => $kodePesananBaru,
                    'total' => $items->sum(fn($item) => $item->jumlah * $item->harga),
                    'alamat_pengiriman' => $alamat,
                    'bukti_transfer' => $fileName,
                    'metode_pembayaran' => 1,
                    'status' => 0,
                ]);
            } else {
                $idPesanan = DB::table('pesanan')->insertGetId([
                    'id_tamu' => $idTamu,
                    'kode_pesanan' => $kodePesananBaru,
                    'total' => $items->sum(fn($item) => $item->jumlah * $item->harga),
                    'alamat_pengiriman' => $alamat,
                    'metode_pembayaran' => 0,
                    'status' => 0,
                ]);
            }


            // Pindahkan item dari keranjang ke order_items
            foreach ($items as $item) {
                DB::table('detail_pesanan')->insert([
                    'id_pesanan' => $idPesanan,
                    'id_produk' => $item->id_produk,
                    'jumlah' => $item->jumlah,
                    'harga' => $item->harga,
                ]);
            }

            $cart = DB::table('keranjang')
            ->where('id_tamu', $idTamu ?? null)
            ->where('status', 0)
            ->update([
                'status' => 1
            ]);

            return response()->json([
                'message'   => 'Checkout berhasil',
                'kodePesanan'   => $kodePesananBaru,
            ]);
        }catch (\Exception $e) {
            return response()->json([
                "status"  => 500,
                "message" => "Terjadi kesalahan. Silakan coba lagi nanti.",
                "error"   => $e->getMessage() // Opsional: Hapus ini pada production untuk alasan keamanan
            ], 500);
        }
    }

    public function orderConfirmation($kodePesanan)
    {
        $pesanan = DB::table('pesanan')->where('kode_pesanan', $kodePesanan)->first();
        $detailPesanan = DB::table('detail_pesanan')
            ->select([
                'detail_pesanan.*',
                'produk.nama AS namaProduk'
            ])
            ->where('id_pesanan', $pesanan->id)
            ->leftJoin('produk', 'produk.id', 'detail_pesanan.id_produk')
            ->get();

        $data = [
            'title' => 'Konfirmasi Order',
            'pesanan'   => $pesanan,
            'detailPesanan'   => $detailPesanan,
        ];

        return view('website.cart.order-confirmation', $data);
    }

}
