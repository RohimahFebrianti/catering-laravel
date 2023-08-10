@extends('admin.index')
@section('title', 'Tambah Menu')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Menu</h1>


     <!-- Topbar Search -->
     <div class="card-body p-2" style="margin-top:10%">
        <form class="user" method="POST" enctype="multipart/form-data" action="/prosesTambah">
            @csrf
            {{ method_field('POST') }}
            <div class="form-group row">
            <div class="form-group mb-3" style="margin-right: 100px">
                <label for="nama_menu">Nama Menu</label>
                <input style="width: 300px" type="text" name="nama_menu" class="form-control" id="exampleFirstName" placeholder="Nama Menu" >
            </div>
            <div class="form-group mb-3">
                <label for="deskripsi">Deskripsi</label>
                <input style="width: 500px" type="text" name="deskripsi" class="form-control" id="exampleLastName" placeholder="Deskripsi" >
            </div>
            </div>
            <div class="form-group row">
                <div class="form-group mb-3" style="width: 300px;margin-right: 100px" >
                    <label for="deskripsi">Harga</label>
                    <input type="text" name="harga" class="form-control" id="exampleFirstName"
                        placeholder="Harga" value="">
                </div>
                <label for="deskripsi"></label>
                <div class="form-group mb-3" style="width: 300px;" >
                    <label for="deskripsi">Kategori</label>
                    <select style="width: 500px" name="kategori_id"  class="form-control" id="exampleSelect">
                        <option value="">Pilih Jenis</option>
                        @foreach ($kategoriAll as $kategori )

                        <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group mb-3" style="width: 300px;margin-right: 100px" >
                <label for="deskripsi">Foto Menu</label>
                    <input style="width:300px" type="file" name="image" class="form-control form-control" id="exampleLastName"
                        placeholder="Pilih Gambar" value="">
                </div>

                <div class="form-group mb-3 mt-1">
                    <label for="jenis_menu">Jenis Menu</label>
                    <div>
                      <input type="radio" id="radio1" name="jenis_menu" value="terbaik">
                      <label for="radio1">Terbaik</label>
                    </div>
                    <div>
                      <input type="radio" id="radio2" name="jenis_menu" value="biasa">
                      <label for="radio2">Biasa</label>
                    </div>

                  </div>


                <div class="form-group mb-3" style="width: 300px;" >

        </div>

    </div>
    <div class="input-group-append justify-content-end" style=" margin-right: 160px;">
        <button class="btn btn-primary" type="submit">Tambah</button>
    </div>

    </div>

        </form>


</div>

@stop
