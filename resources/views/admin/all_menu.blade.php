@extends('admin.index')
@section('title', 'Master Menu')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row justify-content-between">
        <h1 class="h3 mb-4 text-gray-800">Data Menu</h1>
        <h1 class="h4 mb-4 btn btn-success"><a style="color: white" href="/tambahMenu">Tambah Menu</a></h1>
    </div>

</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>Nama Menu</th>
                    <th>Jenis Menu</th>
                    <th>Kateogri</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $no =1;
                @endphp
                @foreach ($dataMenu as $data )

                <tr>
                    <td> {{$no++}}</td>
                    <td> <img width="100px;" src="{{asset($data->gambar)}}"></td>
                    <td>{{$data->nama_menu}}</td>
                    <td>{{$data->jenis_menu}}</td>
                    <td>{{$data->kategori->kategori}}</td>
                    <td>{{$data->deskripsi}}</td>
                    <td>Rp. {{number_format($data->harga)}}</td>
                    <td> <a href="editMenu/{{$data->id}}"><i style="color: green" class="fa fa-edit"></i></a>
                        <a href="delete/{{$data->id}}"><i style="color: red" class="fa fa-trash"></i></a>

                </tr>
                @endforeach

            </tbody>
        </table>
        {{$dataMenu->links()}}
    </div>


<!-- /.container-fluid -->

</div>

@stop
