@extends('admin.index')
@section('title', 'Admin')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="/generate-report" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <a href="/pesanan-user"> <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Pemasukan</div></a>
                            <a href="/pesanan-user">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{$total_pemasukan}}</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <a href="/allmenu">Menu</a></div>
                           <a href="/allmenu"> <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_menu}} data</div></a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tasks fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="/feedback-user">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Feedback
                                </div>
                            </a>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$feedback}}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="/data-user"><div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Member</div></a>
                                <a href="/data-user">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_member}}</div>
                                </a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="row">
        <!-- Card -->
        <div class="col-xl-6 mb-4">
            <div class="card shadow h-100 py-2 d-flex justify-content-center align-items-center">
                <div class="card-body text-center">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik</h6>
                    <div>
                        <canvas id="summaryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 mb-4">
            <div class="card shadow h-100 py-2 d-flex justify-content-center align-items-center">
                <div class="card-body text-center">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik</h6>
                    <div>
                        <canvas id="summaryChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data dari PHP
    var totalPemasukan =  parseInt({{$total_pemasukan}});
    var totalMenu = {{$total_menu}};

    // Menggambar grafik lingkaran
    var summaryChart = new Chart(document.getElementById('summaryChart'), {
        type: 'pie',
        data: {
            labels: ['Pemasukan', 'Menu'],
            datasets: [{
                data: [totalPemasukan,  totalMenu,],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                ]
            }]
        }
    });

</script>
<script>
    // Data dari PHP
    var totalMember = {{$total_member}};
    var totalFeedback = {{$feedback}};

    // Menggambar grafik lingkaran
    var summaryChart2 = new Chart(document.getElementById('summaryChart2'), {
        type: 'pie',
        data: {
            labels: ['Feedback','Member'],
            datasets: [{
                data: [totalFeedback,  totalMember,],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(255, 206, 86, 0.5)'
                ]
            }]
        }
    });

</script>
@stop
