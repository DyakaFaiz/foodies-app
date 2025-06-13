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
                    <div class="text-tiny">{{ $title }}</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                {{-- <div class="wg-filter flex-grow">
                    <form class="form-search">
                        <fieldset class="name">
                            <input type="text" placeholder="Search here..." class="" name="name"
                                tabindex="2" value="" aria-required="true" required="">
                        </fieldset>
                        <div class="button-submit">
                            <button class="" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div> --}}
                <a class="tf-button style-1 w208 ms-auto" href="{{ route('admin.produk.add') }}"><i
                        class="icon-plus"></i>Tambah</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>    
                    <tbody>
                        @foreach ($produk as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="pname">
                                    <div class="image">
                                        <img src="{{ url('') }}/assets/images/produk/{{ $row->foto }}" alt="Foto {{ $row->nama }}" class="image">
                                    </div>
                                    <div class="name">
                                        <a href="#" class="body-title-2">{{ $row->nama }}</a>
                                        <div class="text-tiny mt-3">{{ $row->nama }}</div>
                                    </div>
                                </td>
                                <td>{{ $row->deskripsi }}</td>
                                <td>{{ number_format($row->harga, 0, ',', '.'); }}</td>
                                <td>
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
                                </td>
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