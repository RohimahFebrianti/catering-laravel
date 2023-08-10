@extends('home')
@section('title', 'Profile')
@section('content')

<!-- ======= Contact Section ======= -->
<br>
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

       

       

        <div class="row gy-4">

            <div class="col-md-6">
         

           

          

           

        </div>

        <form action="/update-profile/{{Auth::user()->id}}" method="POST" class="php-email-form p-3 p-md-4">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xl-6 form-group">
                    <input type="text" value="{{ Auth::user()->name }}" name="name" class="form-control form-control-user" id="name" placeholder="Masukkan Nama Anda" required>
                </div>
                <div class="col-xl-6 form-group">
                    <input type="email" value="{{ Auth::user()->email }}" class="form-control form-control-user" name="email" id="email" placeholder="Masukkan Email Anda" required>
                </div>
                <div class="col-xl-6 form-group">
                    <input type="password"  name="password" value="{{Auth::user()->password}}" class="form-control form-control-user" id="password" placeholder="Masukkan Password Anda" required placeholder="ubah password">
                </div>
            </div>

         

            <div class="text-center"><button type="submit">Update</button></div>
        </form>
        <!--End Contact Form -->

    </div>
</section><!-- End Contact Section -->
@endsection
