@extends('layout.admin.main')

@section('custom-css-admin')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trix@2.1.15/dist/trix.min.css">
@endsection

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
                    <div class="text-tiny">{{ $title }}</div>
                </li>
            </ul>
        </div>
        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ route('admin.profil.update', ['id' => $profil->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <fieldset class="name">
                    <div class="body-title">Alamat</div>
                    <input class="flex-grow" type="text" name="alamat"
                        tabindex="0" value="{{ $profil->alamat }}" aria-required="true" required>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Nomor HP</div>
                    <input class="flex-grow" type="text" name="noHp"
                        tabindex="0" aria-required="true" value="{{ $profil->no_hp }}" required>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Email</div>
                    <input class="flex-grow" type="email" name="email"
                        tabindex="0" aria-required="true" value="{{ $profil->email }}" required>
                </fieldset>
                <fieldset class="name">
                    <div class="body-title">Rekening</div>
                    <input id="rekening" type="hidden" name="rekening" value="{{ old('rekening', $profil->rekening) }}">
                    
                    <div class="trix-container" style="margin-top: 10px;">
                        <trix-editor input="rekening" style="min-height: 150px;"></trix-editor>
                    </div>
                </fieldset>


                {{-- <fieldset id="edit-image">
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
                </fieldset> --}}

                <div class="bot" id="submit-btn-container">
                    <div></div>
                    <button class="tf-button w208" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('custom-js-admin')
<script src="https://cdn.jsdelivr.net/npm/trix@2.1.15/dist/trix.umd.min.js"></script>
@endsection