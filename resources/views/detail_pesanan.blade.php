@extends('home')
@section('title', 'Dashboard page')
@section('content')
<section class="menu">
  <div class="container" data-aos="fade-up">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <img src="{{asset($menuById->gambar)}}" class="img-fluid" alt="Gambar" style="height: 200px;">
        </div>
        <div class="col-lg-4 mt-2">
          <h2>Detail Pesanan</h2>
          <p>{{$menuById->nama_menu}}</p>
          <p>{{$menuById->deskripsi}}</p>
          <p>Rp. {{$menuById->harga}}</p>

          <div class="row">

            {{-- <label for="inputNumber" class="form-label">Angka</label> --}}
            {{-- komparasi --}}
            {{-- type member (diskon) --}}
            {{-- type kategori , exmp: prasmanan ? --}}

            {{-- end of komparasi--}}
            <div id="qty" class="input-group mb-3 lg-4">
              <input type="number" class="form-control" id="quantity-input" name="quantity" min="1"
                placeholder="Masukkan angka" step="1">
              {{-- <button class="btn btn-primary" type="button">Submit</button> --}}
            </div>
          </div>

        </div>
        {{-- <div class="container"> --}}

          <div class="col mt-2 ml-3 border mt-4">
            <div class="col">
              <div class="col-lg-12">
                {{-- <label for="inputEmail" class="form-label">Email</label> --}}
                <p style="font-weight: bold; justify-content:center; margin-left:120px; margin-top:20px">Pesanan Saya
                </p>
                <p style="font-weight: bold">{{$menuById->nama_menu}}</p>



                <p id="perkali">0 x .. </p>



                <div class="container">
                  <div class="row justify-content-between">
                    <div class="col">
                      <p>Subtotal</p>
                    </div>
                    <div class="col" id="hargaKali" name="hargakali">
                      <p style="color: grey; font-weight: bold"></p>
                    </div>
                  </div>
                </div>
                {{-- <input type="email" class="form-control" id="inputEmail" placeholder="Masukkan email"> --}}
              </div>
              <div class="col">
                <label for="inputPassword" class="form-label">Alamat</label>
                <input type="text-area" class="form-control" id="inputAlamat" placeholder="Masukkan Alamat">
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="container">
                <div class="row justify-content-between">
                  <div class="col">
                    <p style="margin-top:40px">Diskon</p>
                  </div>
                  <div class="col">
                    <p style="color: grey; font-weight: bold; margin-top:40px">Rp. {{number_format($isDiskon)}}</p>
                  </div>

                </div>

                <div class="row justify-content-between">
                  <div class="col">
                    <p>Total :</p>
                  </div>
                  <div class="col">
                    <p id='hasil' name='hasil' style="color: grey; font-weight: bold">0</p>
                  </div>
                </div>

              </div>

            </div>
            <div class="container mb-4">
              <div class="col-lg-12 btn-sub" id="proses-simpan">
                <label for="inputSubmit" class="invisible">Submit</label>
                <a href="" class="btn btn-primary">Checkout</a>
              </div>
            </div>

          </div>


        </div>
      </div>

    </div>

</section>


<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
   $(document).ready(function() {
    function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
  }
      // Tangkap peristiwa input pada elemen input dengan ID 'quantity-input'
      $('#quantity-input').on('input', function() {
        var quantity = $(this).val(); // Dapatkan nilai jumlah dari input
        var harga = {{$menuById->harga}};
        var diskon = {{$isDiskon}};
        var subtotal = harga * quantity;
        var total = subtotal - diskon;
        var hargaConvertRupiah = formatCurrency(harga);
        var formattedSubTotal = formatCurrency(subtotal);
        var formattedTotal = formatCurrency(total);

        // Lakukan perubahan pada elemen lain di halaman
        $('#perkali').text(quantity + ' x ' + hargaConvertRupiah);
        $('#hargaKali').text(formattedSubTotal);
        $('#hasil').text(formattedTotal);
      });

      $('#inputAlamat').on('input', function() {
        var alamat = $(this).val();
        console.log(alamat);
      });
      // simpan ke controller

      $('#proses-simpan').click(function(e) {
        e.preventDefault(); // Mencegah perilaku tombol submit default
          // console.log(token);
          var token = $('meta[name="csrf-token"]').attr('content');
          var getSubTotal = document.getElementById("hargaKali").innerHTML;
          var getTotal = document.getElementById("hasil").innerHTML;
        $.ajax({

          url: '{{ route('a') }}', // ke web.php
          type: 'POST',

          data: {
            _token : token,
            // Kirim data yang diperlukan ke controller
            quantity: $('#quantity-input').val(),
            alamat: $('#inputAlamat').val(),
            nama_menu: "{{$menuById->nama_menu}}",
            kategori_id: "{{$menuById->kategori_id}}",
            menu_id: "{{$menuById->id}}",
            deskripsi:"{{$menuById->deksripsi}}",
            harga: {{$menuById->harga}},
            subtotal:  parseInt(getSubTotal.replace(/[^\d]+/g, "")),
            diskon: {{$isDiskon}},
            total:  parseInt(getTotal.replace(/[^\d]+/g, "")),
          },
          success: function(response) {
          
            var whatsappUrl = 'https://wa.me/6285864438047?text=Saya%20ingin%20memesan ' + encodeURIComponent("{{$menuById->nama_menu}}");
            window.location.href=whatsappUrl;
            localStorage.setItem('pesanSukses', 'Pesan SUKSES ditampilkan!');

            var pesanSukses = localStorage.getItem('pesanSukses');
            console.log("ok");
          },
          error: function(xhr) {


          }
        });
      });

    });
    document.addEventListener('DOMContentLoaded', function() {
  // Periksa apakah ada pesan SUKSES dalam localStorage
  var pesanSukses = localStorage.getItem('pesanSukses');
  
  if (pesanSukses) {
    // Jika ada pesan SUKSES, tampilkan pesan tersebut di halaman destinasi
    window.location.href = '/status';
    
    // Setelah menampilkan pesan, hapus data dari localStorage agar tidak ditampilkan kembali ketika halaman dimuat kembali
    localStorage.removeItem('pesanSukses');
  }
});
</script>
@endsection