@extends('admin.index')
@section('title', 'Edit Menu')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Menu {{$dataMenu->nama_menu}}</h1>


     <!-- Topbar Search -->
     <div class="card-body p-2" style="margin-top:10%">
        <form class="user" method="POST" enctype="multipart/form-data" action="/updateProses/{{$dataMenu->id}}/">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group row">
            <div class="form-group mb-3" style="margin-right: 100px">
                <label for="nama_menu">Nama Menu</label>
                <input style="width: 300px" type="text" name="nama_menu" class="form-control" id="exampleFirstName" placeholder="Nama Menu" value="{{$dataMenu->nama_menu}}">
            </div>
            <div class="form-group mb-3">
                <label for="deskripsi">Deskripsi</label>
                <input style="width: 500px" type="text" name="deskripsi" class="form-control" id="exampleLastName" placeholder="Deskripsi" value="{{$dataMenu->deskripsi}}">
            </div>
            </div>
            <div class="form-group row">
                <div class="form-group mb-3" style="width: 300px;margin-right: 100px" >
                    <label for="deskripsi">Harga</label>
                    <input type="text" name="harga" class="form-control" id="exampleFirstName"
                        placeholder="Harga" value="{{$dataMenu->harga}}">
                </div>
                <label for="deskripsi"></label>
                <div class="form-group mb-3" style="width: 300px;" >
                    <label for="deskripsi">Kategori</label>
                    <select style="width: 500px" name="kategori_id"  class="form-control" id="exampleSelect">
                        <option value="{{$dataMenu->kategori->id}}">{{$dataMenu->kategori->kategori}}</option>
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
                        placeholder="Pilih Gambar" value="{{$dataMenu->gambar}}">
                </div>
                <div class="form-group mb-3 mt-1">
                    <label for="jenis_menu">Jenis Menu</label>
                    <div>
                      <input type="radio" id="radio1" name="jenis_menu" value="terbaik" <?php echo ($dataMenu->jenis_menu === 'terbaik') ? 'checked' : ''; ?>>
                      <label for="radio1">Terbaik</label>
                    </div>
                    <div>
                      <input type="radio" id="radio2" name="jenis_menu" value="biasa" <?php echo ($dataMenu->jenis_menu === 'biasa') ? 'checked' : ''; ?>>
                      <label for="radio2">Biasa</label>
                    </div>
                  </div>


                <div class="form-group mb-3" style="width: 300px;" >

        </div>

    </div>
    <div class="input-group-append justify-content-end" style=" margin-right: 160px;">
        <button class="btn btn-primary" type="submit">Edit </button>

        </div>
    </div>

    </div>

        </form>


</div>

@stop
