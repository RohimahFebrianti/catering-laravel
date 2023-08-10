@extends('home')
@section('title', 'Jenis')
@section('content')

<!-- ======= subscription Section ======= -->
<section id="chefs" class="chefs section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <p>Pilih <span>Jenis</span> Langganan</p>
        </div>

        <div class="row gy-4">
            @foreach($data as $paket)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="chef-member">
                    <div class="member-img">
                        <img src="{{asset($paket->gambar)}}" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <h4>Diskon Rp. {{$paket->diskon}}</h4>
                        <p>{{$paket->deskripsi}}</p>
                    </div>
                    <div class="d-flex justify-content-center mb-4" data-aos="fade-up" data-aos-delay="200">
                        <button style="color: white; background-color:coral; padding:4px; border-radius:8px"
                            href="#detail/{{$paket->id}}" data-id="{{$paket->id}}" onclick="showDialog()"
                            class="show-alert-delete-box">Join Langganan</button>
                    </div>
                </div>
            </div><!-- End Chefs Member -->
            @endforeach
        </div>

    </div>

</section><!-- End subscription Section -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var id = $(this).data("id");
        event.preventDefault();
        swal({
            title: "Apakah anda yakin join langganan?",
            icon: "warning",
            type: "success",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yeay, anda berhasil join!'
        }).then((willDelete) => {
            var token = $('meta[name="csrf-token"]').attr('content');
            if (willDelete) {
            $.ajax({
                url: 'konfirmasiLangganan/' + id, // Ganti dengan URL yang sesuai
                method: 'PUT',
                data: {
                    _token: token,
                    idPaket:id
                },
                success: function(response) {
                    // Berhasil, lakukan sesuatu (misalnya tampilkan pesan sukses)
                    // window.location.href=document.referrer;
                    window.location.href = '/jenis';
                },
                error: function(xhr) {
                    // Terjadi kesalahan, lakukan sesuatu (misalnya tampilkan pesan error)
                }
            });
        }
        });
});
</script>

@endsection
