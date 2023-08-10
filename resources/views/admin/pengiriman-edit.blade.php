@extends('admin.index')
@section('title', 'Tambah Menu')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Edit Pengiriman</h1>


        <!-- Topbar Search -->
        <div class="card">
            <div class="card-body ">
                <form class="user" method="POST" enctype="multipart/form-data" action="/pengiriman/{{ $pengiriman->id }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="form-group  mb-3">
                            <label for="nama_menu">Nama Kota</label>
                            <input type="text" name="kota" value="{{ $pengiriman->kota }}" class="form-control"
                                required id="exampleFirstName" placeholder="Nama Kota">
                        </div>
                        <div class="form-group mx-4 mb-3">
                            <label for="deskripsi">Ongkos Kirim</label>
                            <input type="number" name="ongkir" value="{{ $pengiriman->ongkir }}" class="form-control"
                                required id="exampleLastName" placeholder="Masukan Ongkos Kirim">
                        </div>

                        <div class="form-group mt-4">
                            <button class="btn btn-primary mt-2" type="submit">Simpan</button>
                        </div>
                    </div>


                </form>


            </div>
        </div>

    @stop
