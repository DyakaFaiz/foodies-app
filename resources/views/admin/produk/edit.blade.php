@extends('layout.admin.main')

@section('content-admin')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ $title }} - {{ $produk->nama }}</h3>
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
                    <div class="text-tiny">{{ $title }} {{ $produk->nama }}</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('admin.produk.update', ['id' => $produk->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <fieldset class="name">
                    <div class="body-title">Nama Produk</div>
                    <input class="flex-grow" type="text" placeholder="Brand name" name="nama"
                        tabindex="0" value="{{ $produk->nama }}" aria-required="true" required>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Deskripsi</div>
                    <input class="flex-grow" type="text" placeholder="Dibuat dengan kain" name="deskripsi"
                        tabindex="0" value="{{ $produk->deskripsi }}" aria-required="true" required>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Harga</div>
                    <input class="flex-grow" type="number" placeholder="20000" name="harga"
                        tabindex="0" value="{{ $produk->harga }}" aria-required="true" required>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Foto</div>
                    <img 
                        src="{{ url('') }}/assets/images/produk/{{ $produk->foto }}" 
                        alt="Foto {{ $produk->nama }}" 
                        style="width: 300px; height: 400px; object-fit: cover;"
                        class="rounded shadow-sm" />
                    <button type="button" class="tf-button w108" id="btn-edit-foto">Ubah Foto</button>
                </fieldset>
                <fieldset id="edit-image" style="display: none">
                    <div class="body-title">Upload Foto</div>
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
                                <input type="file" id="myFile" name="fotoBaru" accept="image/*">
                            </label>
                        </div>
                    </div>
                </fieldset>

                <div class="bot" id="submit-btn-container" style="display: none;">
                    <div></div>
                    <button class="tf-button w208" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('custom-js-admin')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Toggle fieldset foto
    document.getElementById('btn-edit-foto').addEventListener('click', function (e) {
        e.preventDefault();
        const fieldset = document.getElementById('edit-image');
        fieldset.style.display = (fieldset.style.display === 'none' || fieldset.style.display === '') ? 'block' : 'none';
    });

    // Cek perubahan input
    const form = document.querySelector('.form-new-product');
    const inputs = form.querySelectorAll('input[type="text"], input[type="number"], input[type="file"]');
    const submitBtnContainer = document.getElementById('submit-btn-container');

    let originalValues = {};
    inputs.forEach(input => {
        originalValues[input.name] = input.type === 'file' ? null : input.value;
    });

    form.addEventListener('input', function () {
        let changed = false;
        inputs.forEach(input => {
            if (input.type === 'file') {
                if (input.files.length > 0) changed = true;
            } else {
                if (input.value !== originalValues[input.name]) changed = true;
            }
        });

        submitBtnContainer.style.display = changed ? 'flex' : 'none';
    });
});
</script>
@endsection

