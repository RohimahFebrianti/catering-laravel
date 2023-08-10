@extends('admin.index')

@section('title', 'Feedback Data')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row justify-content-between">
        <h1 class="h3 mb-4 text-gray-800">Feedback User</h1>
    </div>
</div>

<div class="card-body ">
    <div class="table-responsive">
        @if ($feedbackUser->isEmpty())
        <p class="d-flex justify-content-center align-items-center">No data</p>
        @else
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Isi Feedback</th>
                    <th>Tanggal</th>
                    <th>Delete</th>
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
                    <td>
                        <a href="/delete-feedback/{{$data->id}}">
                            <i id="" style="color: green" class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$feedbackUser->links()}}
        @endif
    </div>
</div>
@stop
