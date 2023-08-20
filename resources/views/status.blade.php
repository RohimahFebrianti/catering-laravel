@extends('home')
@section('title', 'Status')
@section('content')

<!-- ======= DElivery Section ======= -->

<section id="events" class="events">

    <div class="container-fluid" data-aos="fade-up">
        <br>
        @if($lastCheckout == null)
        <br>
        <p style="text-align: center;margin-bottom:200px; justify-content:center">Anda Belum Memiliki Riwayat Transaksi</p>
      @else
    <div class="invoice-judul"><h3>Invoice</h3></div>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-4">
          <!-- Bagian 1 -->
          <div class="invoice-kepada">
            <h6>Kepada : {{$user->name}}</h6><br>
            <h6 style="">Status :
                @if($lastCheckout->status == 'proses')
                <a style="color: red">{{$lastCheckout->status}}</a>
                @else
                <a style="color: green">{{$lastCheckout->status}}</a>
                @endif
            </h6><br>

        </div>

        </div>
        <div class="col-sm-4">
          <!-- Bagian 2 -->
          <div class="invoice-kepada">
            @if ($lastCheckout->status == 'proses')
              <h6>Tanggal Checkout : <span> {{$lastCheckout->created_at}}</span></h6><br>
            @elseif ($lastCheckout->status == 'kirim')
              <h6>Tanggal Checkout : <span> {{$lastCheckout->created_at}}</span></h6><br>
              <h6>Tanggal Kirim : <span> {{$lastCheckout->updated_at}}</span></h6><br>
            @endif
          </div>

        </div>
        <div class="col-sm-4">
            <div class="invoice-kepada">
                <h6>No Invoice : {{$no_onvoice}}</h6><br>
            </div>
            <div class="invoice-kepada">
                @php
                    $formattedDate = date("d-m-Y", strtotime($lastCheckout->created_at));
                @endphp
                <h6>Tanggal Invoice : {{$formattedDate}}</h6><br>
            </div>


        </div>
       </div>
       <table class="table table-bordered" style="margin-left:100px;margin-right:200px;width:90%;position:relative">
        <thead>
          <tr>
            <th>No</th>
            <th>Jenis Paket</th>
            <th>Deskripsi</th>
            <th>Qty</th>
            <th>Harga Menu</th>
            <th>Jumlah Hari</th>
            <th>Subtotal</th>
            <th>Ongkir</th>
            <th>Diskon</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
            @php
            $no =1;
            @endphp

            @foreach ($data_pesanan as $data )
          <tr>

            <td>{{$no++}}</td>
            <td>{{$data->nama_menu}}</td>
            <td>{{$data->deskripsi}}</td>
            <td>{{$data->qty}}</td>
            <td>{{$data->harga}}</td>
            <td>{{$data->qty_paket}}</td>
            <td style="font-size: 2">Rp. {{number_format($data->subtotal)}}</td>
            <td>Rp. {{number_format($data->ongkir)}}</td>
            <td>Rp. {{number_format($data->diskon)}}</td>
            <td>Rp. {{number_format($data->total)}}</td>

            {{-- <td>Rp. {{number_format($data->harga * $data->qty * $data->qty_paket + * $data->ongkir - $data->diskon)}}</td> --}}

        </tr>
        @endforeach
          <!-- Data lainnya -->
        </tbody>
      </table>
    </div>
    @endif

  </section><!-- End Events Section -->
@endsection