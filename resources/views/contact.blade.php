@extends('home')
@section('title', 'Kontak | Feedback')
@section('content')

<!-- ======= Contact Section ======= -->
<br>
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">

            <p>Kontak <span></span></p>
        </div>

        <div class="mb-3">
            <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

            <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                    <i class="icon bi bi-map flex-shrink-0"></i>
                    <div>
                        <h3>Alamat Kami</h3>
                        <p>Jl. Sukamulya Cikutra, Bandung</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="icon bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Kami</h3>
                        <p>viima@gmail.com</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                    <i class="icon bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Hubungi Kami</h3>
                        <p>+62 858 6443 8047</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                    <i class="icon bi bi-share flex-shrink-0"></i>
                    <div>
                        <h3>Jam Buka</h3>
                        <div><strong>Senin - Sabtu :</strong> 09.00 Pagi - 06.00 Malam;
                            <br><strong>Minggu :</strong> Tutup
                        </div>
                    </div>
                </div>
            </div><!-- End Info Item -->

        </div>

        <form action="/kirim-masukkan/{{Auth::user()->id}}" method="POST" class="php-email-form p-3 p-md-4">
            @csrf
            <div class="section-header">

                <p>Feedback <span></span></p>
            </div>
            <div class="row">
                <div class="col-xl-6 form-group">
                    <input type="text" value="{{Auth::user()->name}}" name="name"  class="form-control" id="name" placeholder="Masukkan Nama Anda" required>
                </div>
                <div class="col-xl-6 form-group">
                    <input type="email" value="{{Auth::user()->email}}" class="form-control" name="email" id="email" placeholder="Masukkan Email Anda" required>
                </div>
            </div>

            <div class="form-group">
                <textarea class="form-control" name="isi" rows="5" placeholder="Isi Pesan" required></textarea>
            </div>

            <div class="text-center"><button type="submit">Kirim</button></div>
        </form>
        <!--End Contact Form -->

    </div>
</section><!-- End Contact Section -->
@endsection
