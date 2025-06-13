@extends('layout.admin.main')

@section('content-admin')
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
                    <a href="#">
                        <div class="text-tiny">Produk</div>
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
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('admin.produk.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <fieldset class="name">
                    <div class="body-title">Nama Produk</div>
                    <input class="flex-grow" type="text" placeholder="Risol Mayo" name="nama" value="{{ old('nama') }}"
                        tabindex="0" aria-required="true" required>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Deskripsi</div>
                    <input class="flex-grow" type="text" placeholder="Dibuat dengan mayo" name="deskripsi" value="{{ old('deskripsi') }}"
                        tabindex="0" aria-required="true" required>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Harga</div>
                    <input class="flex-grow" type="number" placeholder="20000" name="harga" value="{{ old('harga') }}"
                        tabindex="0" aria-required="true" required>
                </fieldset>
                <fieldset id="edit-image">
                    <div class="body-title">Upload images</div>
                    <div class="upload-image flex-grow">
                        <div class="item" id="imgpreview" style="display:none">
                            <img src="upload-1.html" class="effect8" alt="">
                        </div>
                        <div id="upload-file" class="item up-load">
                            <label class="uploadfile" for="myFile">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">Seret gambar Anda di sini atau pilih <span
                                        class="tf-color">klik untuk cari</span></span>
                                <input type="file" id="myFile" name="foto" accept="image/*">
                            </label>
                        </div>
                    </div>
                </fieldset>

                <div class="bot" id="submit-btn-container">
                    <div></div>
                    <button class="tf-button w208" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection