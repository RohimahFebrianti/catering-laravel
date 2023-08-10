@extends('admin.index')
@section('title', 'User Pesanan')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row justify-content-between">
        <h1 class="h3 mb-4 text-gray-800">Pesanan User</h1>
    </div>

</div>
@if($pesananUser->isEmpty())
<div class="card-body">
  <center>Belum ada data</center>
</div>
@else
<div class="card-body">
  <div class="table-responsive tab-content ">
      <table class="table " id="dataTable" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th>No.</th>
                  <th>User</th>
                  <th>Nama Menu</th>
                  <th>No. Faktur</th>
                  <th>Kategori</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Diskon</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Aksi</th>
              </tr>
          </thead>

          <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($pesananUser as $data)
              <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->user->name}} </td>
                  <td>{{ $data->nama_menu }}</td>
                  <td>{{ $data->no_pesanan }}</td>
                  <td>{{ $data->kategori->kategori }}</td>
                  <td>{{ $data->qty }} Pcs</td>
                  <td>Rp. {{ number_format($data->harga) }}</td>
                  <td>Rp. {{ number_format($data->diskon) }}</td>
                  <td>Rp. {{ number_format($data->harga * $data->qty - $data->diskon) }}</td>
                  <td>{{ $data->status == 'proses' ? "On progress" : "Diantar" }}</td>
                  <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#confirmationModal" onclick="setConfirmationModalData('{{ $data->id }}')">
                      <i id="editLink" style="color: green" class="fa fa-edit"></i>
                    </a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#confirmationModalHapus" onclick="setConfirmationModalDataHapus('{{ $data->id }}')">
                      <i id="deleteLink" style="color: red" class="fa fa-trash"></i>
                    </a>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
      {{ $pesananUser->links() }}
  </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Hy, Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateForm" method="POST">
          @csrf
          @method('PUT')
          <p style="padding-left: 20px" id="confirmationModalText"></p>
          <p style="padding-left: 20px" id="confirmationModalText"></p>
          <!-- Tambah elemen untuk menampilkan data alamat -->
          <p style="padding-left: 20px"><strong>Nama Pemesan:</strong> <span id="namaPenerima"></span></p>
          <p style="padding-left: 20px"><strong>Alamat Pengiriman:</strong> <span id="alamatPengiriman"></span></p>
       
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success">Ya, Sudah!</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="confirmationModalHapus" tabindex="-1" aria-labelledby="confirmationModalLabelHapus" aria-hidden="true">
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
  // parshiing daata alamat user
  function setConfirmationModalDataAlamat(dataId) {
     

      // Ambil data alamat dari server berdasarkan ID yang diklik
      fetch(`get-alamat-pengiriman-byID/${dataId}`)
        .then(response => response.json())
        .then(data => {
          // Tampilkan data alamat di dalam modal
          const modalAlamatElement = document.getElementById('alamatPengiriman');
          const modalPenerimalement = document.getElementById('namaPenerima');
          modalAlamatElement.innerHTML = data.alamat;
          modalPenerimalement.innerHTML = data.userPenerima;
        })
        .catch(error => {
          console.error('Error:', error);
        });

      const modalTextElement = document.getElementById('confirmationModalText');
      modalTextElement.innerHTML = `Pesanan dengan ID <strong>${dataId}</strong> sudah siap diantar ?.`;
    }

  // 
    function setConfirmationModalData(dataId) {
      const formElement = document.getElementById('updateForm');
      formElement.action = "{{ url('update-pesanan-user') }}/" + dataId;
      
      const modalTextElement = document.getElementById('confirmationModalText');
      setConfirmationModalDataAlamat(dataId);
      modalTextElement.innerHTML = `Pesanan dengan ID <strong>${dataId}</strong> sudah siap diantar ?.`;
    }

    function setConfirmationModalDataHapus(dataName) {
      const formElement = document.getElementById('hapusForm');
      formElement.action = "{{ url('delete-pesanan-user') }}/" + dataName;


      const modalTextElement = document.getElementById('confirmationModalTextHapus');
      modalTextElement.innerHTML = `Anda Yakin Akan Menghapus Data <strong>${dataName}</strong> ?.`;

    
    }
  
    // document.addEventListener('DOMContentLoaded', function() {
    //   const mId = document.getElementById('idNya');
    //   const dataName = mId.innerHTML.trim();
    //   const linkElement = document.querySelector('.btn-success a');
    //   linkElement.href = "delete-pesanan-user/" + dataName;
    // });
</script>
@endif
@endsection
