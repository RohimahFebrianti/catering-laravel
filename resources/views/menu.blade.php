@extends('home')
@section('title', 'Menu')
@section('content')

@if(session('toast'))
<div class="toast">{{ session('toast') }}</div>
@endif

<!-- ======= Menu Section ======= -->
<section id="menu" class="menu">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            {{-- <h2>Our Menu</h2> --}}
            <p>Periksa Menu Yang Tersedia Di <span>Viima Catering</span></p>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

            <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                    <h4>Harian</h4>
                </a>
            </li><!-- End tab nav item -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                    <h4>Prasmanan</h4>
                </a><!-- End tab nav item -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                    <h4>Snack box</h4>
                </a>
            </li><!-- End tab nav item -->

        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

            <div class="tab-pane fade active show" id="menu-starters">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>Harian</h3>
                </div>

                <div class="row gy-5">

                    @foreach($data as $item_menu)
                    <div class="col-lg-4 menu-item">
                        <a href="assets/img/menu/{{$item_menu->gambar}}" class="glightbox">
                            <img src="{{$item_menu->gambar}}" class="menu-img img-fluid rounded-circle" alt=""
                                style="height: 200px;">
                        </a>
                        <h4>{{$item_menu->nama_menu}}</h4>
                        <p class="ingredients">
                            {{$item_menu->deskripsi}}
                        </p>
                        <p class="price">
                            Rp. {{$item_menu->harga}}
                        </p>
                        <div class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                            <a href="/detail/{{$item_menu->id}}" class="btn-pesan-sekarang">Pesan Sekarang</a>
                        </div>
                    </div><!-- Menu Item -->
                    @endforeach




                </div>
            </div><!-- End Harian Menu Content -->

            <div class="tab-pane fade" id="menu-breakfast">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>Prasmanan</h3>
                </div>

                <div class="row gy-5">

                    @foreach($data2 as $item_menu)
                    <div class="col-lg-4 menu-item">
                        <a href="assets/img/menu/{{$item_menu->gambar}}" class="glightbox">
                            <img src="{{$item_menu->gambar}}" class="menu-img img-fluid rounded-circle" alt=""
                                style="height: 200px;">
                        </a>
                        <h4>{{$item_menu->nama_menu}}</h4>
                        <p class="ingredients">
                            {{$item_menu->deskripsi}}
                        </p>
                        <p class="price">
                            Rp. {{$item_menu->harga}}
                        </p>
                        <div class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                            <a href="/detail/{{$item_menu->id}}" class="btn-pesan-sekarang">Pesan Sekarang</a>
                        </div>
                    </div><!-- Menu Item -->
                    @endforeach



                </div>
            </div><!-- End Prasmanan Menu Content -->

            <div class="tab-pane fade" id="menu-lunch">

                <div class="tab-header text-center">
                    <p>Menu</p>
                    <h3>Snack Box</h3>
                </div>

                <div class="row gy-5">

                    @foreach($data3 as $item_menu)
                    <div class="col-lg-4 menu-item">
                        <a href="assets/img/menu/{{$item_menu->gambar}}" class="glightbox">
                            <img src="{{$item_menu->gambar}}" class="menu-img img-fluid rounded-circle" alt=""
                                style="height: 200px;">
                        </a>
                        <h4>{{$item_menu->nama_menu}}</h4>
                        <p class="ingredients">
                            {{$item_menu->deskripsi}}
                        </p>
                        <p class="price">
                            Rp. {{$item_menu->harga}}
                        </p>
                        <div class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                            <a href="detail/{{$item_menu->id}}" class="btn-pesan-sekarang">Pesan Sekarang</a>
                        </div>
                    </div><!-- Menu Item -->
                    @endforeach
                </div>
            </div><!-- End Snackbox Menu Content -->
        </div>
    </div>
</section><!-- End Menu Section -->
@endsection