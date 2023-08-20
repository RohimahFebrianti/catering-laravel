@extends('admin.index')

@section('title', 'Edit Paket')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h4 mb-4 text-gray-800">Edit Paket {{ $jenisLangganan->nama_jenis }}</h1>

        <!-- Topbar Search -->
        <div class="card-body" style="margin-top:10%">
            <form class="user" method="POST" enctype="multipart/form-data"
                action="/updatePaketProses/{{ $jenisLangganan->id }}">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_menu">Jenis Member</label>
                        <input type="text" name="nama_jenis" class="form-control" id="exampleFirstName"
                            placeholder="Nama Menu" value="{{ $jenisLangganan->nama_jenis }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="deskripsi">Foto Banner</label>
                        <input type="file" name="image" class="form-control" id="exampleLastName"
                            placeholder="Pilih Gambar" value="{{ $jenisLangganan->gambar }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="diskon">Diskon</label>
                        <input type="number" name="diskon" class="form-control" id="diskon" placeholder="Diskon"
                            value="{{ $jenisLangganan->diskon }}">
                    </div>
                    <div class="col-md-6">
                        <label for="diskon">Minimal Pembelian</label>
                        <input type="number" name="nominal" class="form-control" id="nominal"
                            placeholder="Minimal Pembelian" value="{{ $jenisLangganan->nominal }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="exampleLastName" placeholder="Deskripsi" rows="5">{{ $jenisLangganan->deskripsi }}</textarea>
                </div>



                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@stop
