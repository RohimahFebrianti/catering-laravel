!DOCTYPE html>
<html>

<head>
    <title>Laporan Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    {{-- daata menu --}}
    <center>
        <h5>Viima Catering</h5>
        <br>
        <h6><a target="#" href="#">Data Menu</a></h6>
    </center>



    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Menu</th>
                <th>Jenis Menu</th>
                <th>Kateogri</th>
                <th>Deskripsi</th>
                <th>Harga</th>

            </tr>
        </thead>
        <tbody>
            @php
            $no =1;
            @endphp
            @foreach ($menu as $data )

            <tr>
                <td> {{$no++}}</td>
                <td>{{$data->nama_menu}}</td>
                <td>{{$data->jenis_menu}}</td>
                <td>{{$data->kategori->kategori}}</td>
                <td>{{$data->deskripsi}}</td>
                <td>{{$data->harga}}</td>

            </tr>
            @endforeach

        </tbody>
    </table>
    {{-- feedback --}}

    <center>
        <h6><a target="#" href="#">Data Feedback</a></h5>
    </center>

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Isi Feedback</th>
                <th>Tanggal</th>
            </tr>
        </thead>

        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($feedbackUser as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->user->name}}</td>
                <td>{{$data->user->email}}</td>
                <td>{{$data->isi}}</td>
                <td>{{$data->created_at->format('d-m-Y')}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Data Pesanan --}}
    <center>
        <h6><a target="#" href="#">Data Pesanan</a></h5>
    </center>

    <table class='table table-bordered' id="dataTable" width="100%" cellspacing="0">
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
            </tr>
        </thead>

        <tbody>
            @php
            $no =1;
            @endphp
            @foreach ($pesananUser as $data )

            <tr>
                <td> {{$no++}}</td>
                <td>{{$data->user->name}}</td>
                <td>{{$data->nama_menu}}</td>
                <td>{{$data->no_pesanan}}</td>
                <td>{{$data->kategori->kategori}}</td>
                <td>{{$data->qty}} Pcs</td>
                <td>Rp. {{number_format($data->harga)}}</td>
                <td>Rp. {{number_format($data->diskon)}}</td>

                <td>Rp. {{number_format($data->harga * $data->qty - $data->diskon)}}</td>
                <td> {{$data->status == 'proses' ? "On progress" : "Diantar"}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- data User --}}

    <center>
        <h6><a target="#" href="#">Data User</a></h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama User</th>
                <th>email</th>
                <th>Level</th>
                <th>Member</th>
            </tr>
        </thead>

        <tbody>
            @php
            $no =1;
            @endphp
            @foreach ($dataUser as $data )

            <tr>
                <td> {{$no++}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->level}}</td>
                @if ($data->is_member == null)
                <td>non Member</td>



                @else
                <td style="color: green">Member</td>

                @endif

            </tr>
            @endforeach

        </tbody>
    </table>



</body>

</html>