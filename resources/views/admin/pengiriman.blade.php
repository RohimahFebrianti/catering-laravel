@extends('admin.index')
@section('title', 'Master Menu')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row justify-content-between">
            <h1 class="h3 mb-4 text-gray-800">Data Pengiriman</h1>
            <h1 class="h4 mb-4 btn btn-success"><a style="color: white" href="/pengiriman/create">Tambah Pengiriman</a></h1>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kota</th>
                        <th>Ongkos</th>

                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($pengiriman as $data)
                        <tr>
                            <td> {{ $no++ }}</td>
                            <td>{{ $data->kota }}</td>
                            <td>{{ $data->ongkir }}</td>

                            <td> <a href="pengiriman/{{ $data->id }}/edit"><i style="color: green"
                                        class="fa fa-edit"></i></a>
                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                    data-bs-target="#confirmationModalHapus"
                                    onclick="setConfirmationModalDataHapus('{{ $data->id }}', '{{ $data->kota }}')">
                                    <i style="color: red;" class="fa fa-trash"></i>
                                </a>


                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            {{ $pengiriman->links() }}
        </div>


        <!-- /.container-fluid -->

    </div>
    <div class="modal fade" id="confirmationModalHapus" tabindex="-1" aria-labelledby="confirmationModalLabelHapus"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Hy, Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="hapusForm" method="POST">
                    @method('delete')
                    @csrf
                    <p style="padding-left: 20px" id="confirmationModalTextHapus"></p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Ya!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function setConfirmationModalDataHapus(id, kota) {
            const formElement = document.getElementById('hapusForm');
            formElement.action = "{{ url('pengiriman') }}/" + id;


            const modalTextElement = document.getElementById('confirmationModalTextHapus');
            modalTextElement.innerHTML = `Anda Yakin Akan Menghapus Data <strong>${kota}</strong> ?.`;


        }
    </script>
@stop
{{-- @push('after-script')
<script>
    function setConfirmationModalDataHapus(dataName) {
      const formElement = document.getElementById('hapusForm');
      formElement.action = "{{ url('delete/') }}/" + dataName;


      const modalTextElement = document.getElementById('confirmationModalTextHapus');
      modalTextElement.innerHTML = `Anda Yakin Akan Menghapus Data <strong>${dataName}</strong> ?.`;


    }
  </script>
@endpush --}}
