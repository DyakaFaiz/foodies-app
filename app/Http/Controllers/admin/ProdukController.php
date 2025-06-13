<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = DB::table('produk')->get();

        $data = [
            'title' => 'Daftar Produk',
            'produk'    => $produk
        ];
        return view('admin.produk.index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Produk',
        ];
        return view('admin.produk.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:5024'
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . preg_replace('/\s+/', '_', $foto->getClientOriginalName());

            // Pindahkan file ke direktori tujuan
            $foto->move(public_path('assets/images/produk/'), $namaFoto);

            // Simpan ke database
            DB::table('produk')->insert([
                'nama' => $request->nama,
                'slug' => Str::slug($request->nama),
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'foto' => $namaFoto,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
        }

        return redirect()->back()->with('error', 'Foto produk harus diisi.');
    }

    public function edit($id)
    {
        $produk = DB::table('produk')->where('id', $id)->first();

        $data = [
            'title' => 'Edit Produk',
            'produk'    => $produk
        ];
        return view('admin.produk.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $produk = DB::table('produk')->where('id', $id)->first();

        $data = [
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ];

        if ($request->hasFile('fotoBaru')) {
            $foto = $request->file('fotoBaru');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('assets/images/produk/'), $namaFoto);
            $data['foto'] = $namaFoto;
        }

        DB::table('produk')->where('id', $id)->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Ambil data produk berdasarkan ID
        $produk = DB::table('produk')->where('id', $id)->first();

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        // Hapus file gambar jika ada
        $path = public_path('assets/images/produk/') . $produk->foto;
        if (file_exists($path) && is_file($path)) {
            unlink($path);
        }

        // Hapus data dari database
        DB::table('produk')->where('id', $id)->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }

}
