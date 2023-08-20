@extends('admin.index')
@section('title', 'Manage Jenis Langganan')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row justify-content-between">
            <h1 class="h3 mb-4 text-gray-800">Manage Jenis Langganan</h1>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive ">
            <table class="table " id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Banner</th>
                        <th>Jenis Member</th>
                        <th>Minimal Pembelian</th>
                        <th>Diskon</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>

                    </tr>
                </thead>

                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($jenisLangganan as $data)
                        <tr>
                            <td> {{ $no++ }}</td>
                            <td><img width="100px" src="{{ asset($data->gambar) }}"></td>
                            <td>{{ $data->nama_jenis }}</td>
                            <td>Rp. {{ number_format($data->nominal) }}</td>
                            <td>Rp. {{ number_format($data->diskon) }}</td>
                            <td style="width: 400px">{{ $data->deskripsi }}</td>

                            <td> <a href="/edit-paket/{{ $data->id }}">
                                    <i id="" style="color: green" class="fa fa-edit"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.container-fluid -->

    </div>


@stop
