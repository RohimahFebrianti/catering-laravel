@extends('admin.index')
@section('title', 'User Data')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row justify-content-between">
        <h1 class="h3 mb-4 text-gray-800">Data User</h1>
    </div>

</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
        {{$dataUser->links()}}
    </div>


<!-- /.container-fluid -->

</div>

@stop
