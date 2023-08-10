@extends('home')
@section('title', 'Dashboard page')
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center section-bg">
  <div class="container">
    <div class="row justify-content-between gy-5">
      <div
        class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
        <h2 data-aos="fade-up">Selamat Datang Di <br>Viima Catering</h2>
        <p data-aos="fade-up" data-aos-delay="100">Di sini Anda dapat menemukan berbagai macam masakan Indonesia. Dengan
          rasa yang sangat otentik dan sangat cocok untuk lidah siapapun.</p>
        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
          <a href="/menu" class="btn-pesan-sekarang">Pesan Sekarang</a>
        </div>
      </div>
      <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
        <img src="assets/img/tradisional.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
      </div>
    </div>
  </div>
</section><!-- End Hero Section -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Pelajari Lebih Lanjut</h2>
      <p>Tentang Kami<span></p>
    </div>

    <div class="row gy-4">
      <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/about.jpg) ;"
        data-aos="fade-up" data-aos-delay="150">
      </div>
      <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
        <div class="content ps-0 ps-lg-5">
          <p class="fst-italic">
            Kami dengan bangga menyajikan layanan catering makanan yang unik dan berkualitas tinggi untuk memenuhi
            segala kebutuhan kuliner Anda. Kami memahami bahwa setiap acara istimewa membutuhkan makanan yang lezat,
            indah, dan disajikan dengan penuh keahlian. Itulah sebabnya, tim kami yang berpengalaman telah merancang
            menu yang beragam dan kreatif, sesuai dengan preferensi Anda.
          </p>
        </div>
      </div>
    </div>
  </div>
</section><!-- End About Section -->

<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      {{-- <h2>Gallery</h2> --}}
      <p>Menu <span>Terbaik</span></p>
    </div>

    <div class="gallery-slider swiper">
        <div class="swiper-wrapper align-items-center">
          @php
            $counter = 0; // Inisialisasi counter
          @endphp
          @foreach ($data as $datas)
            @php
              if ($counter >= 2) break; // Hentikan loop jika sudah dua gambar ditampilkan
              $counter++; // Increment counter
            @endphp
            <div class="swiper-slide">
              <a class="glightbox" data-gallery="images-gallery" href="{{$datas->gambar}}">
                <img src="{{$datas->gambar}}" class="img-fluid" alt="">
              </a>
            </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
      </div>

  </div>
</section><!-- End Gallery Section -->
@endsection
