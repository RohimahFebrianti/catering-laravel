@extends('home')
@section('title', 'Dashboard page')
@section('content')
    <section class="menu">
        <div class="container" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{ asset($menuById->gambar) }}" class="img-fluid" alt="Gambar" style="height: 200px;">
                    </div>
                    <div class="col-lg-4 mt-2">
                        <h2>Detail Pesanan</h2>
                        {{-- <p>{{ $menuById->nama_menu }}</p> --}}
                        <p>{{ $menuById->deskripsi }}</p>
                        {{-- <p>Rp. {{ $menuById->harga }}</p> --}}

                        <div class="row">


                            <div id="qty" class="col mb-3">
                                <label for="" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity-input" required name="quantity"
                                    min="1" placeholder="Masukkan angka" step="1">
                                {{-- <button class="btn btn-primary" type="button">Submit</button> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="inputPassword" class="form-label">Paket Langganan</label>
                                <select name="paket" id="paket_user" class="form-select">
                                    <option value="1">1 Hari</option>
                                    <option value="3">3 Hari</option>
                                    <option value="5">5 Hari</option>
                                    <option value="6"> 1 Minggu</option>
                                    <option value="12"> 2 Minggu</option>
                                    <option value="18"> 3 Minggu</option>
                                    <option value="24"> 1 Bulan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="inputPassword" class="form-label">Kota / Kecamatan</label>
                                <select name="kota" id="ongkir_user" class="form-select">
                                    <option value="">Pilih Kota / Kecamatan</option>
                                    @foreach ($pengiriman as $item)
                                        <option value="{{ $item->id }}">{{ $item->kota . ' - ' . $item->ongkir }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputPassword" class="form-label">Alamat Lengkap</label>
                                <input type="text-area" class="form-control" id="inputAlamat" required
                                    placeholder="Masukkan Alamat">
                            </div>
                        </div>

                    </div>
                    {{-- <div class="container"> --}}

                    <div class="col mt-2 ml-3 border mt-4">
                        <div class="col">
                            <div class="col-lg-12 text-center">
                                {{-- <label for="inputEmail" class="form-label">Email</label> --}}
                                <p style="font-weight: bold;  margin-top:20px">
                                    Pesanan Saya {{ $menuById->nama_menu }}
                                </p>



                                {{-- <p id="perkali">0 x .. </p> --}}




                                {{-- <input type="email" class="form-control" id="inputEmail" placeholder="Masukkan email"> --}}
                            </div>
                            <div class="container">
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <p>Harga Paket </p>
                                    </div>
                                    <div class="col">
                                        <p style="color: grey; font-weight: bold">
                                            {{ ' Rp ' . $menuById->harga }}</p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="container">
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <p>Langganan</p>
                                    </div>
                                    <div class="col-6" id="langganan" name="langganan">
                                        <p style="color: grey; font-weight: bold">1 hari</p>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <p>Subtotal</p>
                                    </div>
                                    <div class="col-6" id="hargaKali" name="hargakali">
                                        <p style="color: grey; font-weight: bold">Rp. 0</p>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <p style="">Ongkos Kirim</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="color: grey; font-weight: bold; " id="ongkir_hasil">Rp.
                                            0</p>
                                    </div>

                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <p style="">Diskon</p>
                                    </div>
                                    <div class="col-6">
                                        <p style="color: grey; font-weight: bold; " id="diskon_user_show">Rp.
                                            {{ number_format($isDiskon) }}</p>
                                        <input type="hidden" name="diskon_user_hidden" id="diskon_user_hidden"
                                            value="{{ $isDiskon }}">
                                    </div>

                                </div>

                                <div class="row justify-content-between">
                                    <div class="col-6">
                                        <p>Total :</p>
                                    </div>
                                    <div class="col-6">
                                        <p id='hasil' name='hasil' style="color: grey; font-weight: bold">Rp. 0</p>
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
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(amount);
            }
            // Tangkap peristiwa input pada elemen input dengan ID 'quantity-input'
            $('#quantity-input').on('input', function() {
                var quantity = $(this).val(); // Dapatkan nilai jumlah dari input
                var harga = {{ $menuById->harga }};
                var diskon = {{ $isDiskon }};
                var subtotal = harga * quantity;
                var total = subtotal - diskon;
                var hargaConvertRupiah = formatCurrency(harga);
                var formattedSubTotal = formatCurrency(subtotal);
                var formattedTotal = formatCurrency(total);

                // Lakukan perubahan pada elemen lain di halaman
                $('#perkali').text(quantity + ' x ' + hargaConvertRupiah);
                $('#hargakali').text(formattedSubTotal);
                $('#hasil').text(formattedTotal);
                var ongkir_user = $('#ongkir_user').val();

                if (ongkir_user) {
                    var ongkir = ongkir_user;
                    var token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({

                        url: '{{ route('check-ongkir') }}', // ke web.php
                        type: 'POST',

                        data: {
                            _token: token,
                            // Kirim data yang diperlukan ke controller
                            id: ongkir,

                        },
                        success: function(response) {
                            var hargaConvertRupiah = formatCurrency(response.data.ongkir ?? 0);
                            $('#ongkir_hasil').text(hargaConvertRupiah);
                            var quantity = $('#quantity-input')
                                .val(); // Dapatkan nilai jumlah dari input
                            var ongkir = response.data.ongkir ?? 0;
                            var harga = {{ $menuById->harga }};
                            var diskon = document.getElementById("diskon_user_hidden").value;
                            var subtotal = harga * quantity;
                            var total = parseInt(subtotal - diskon) + parseInt(ongkir);
                            var hargaConvertRupiah = formatCurrency(harga);
                            var formattedSubTotal = formatCurrency(subtotal);
                            var formattedTotal = formatCurrency(total);
                            $('#hasil').text(formattedTotal);
                        },
                        error: function(xhr) {


                        }
                    });
                }
            });
            $('#ongkir_user').on('change', function() {
                var ongkir = $(this).val();
                var token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({

                    url: '{{ route('check-ongkir') }}', // ke web.php
                    type: 'POST',

                    data: {
                        _token: token,
                        // Kirim data yang diperlukan ke controller
                        id: ongkir,

                    },
                    success: function(response) {
                        var hargaConvertRupiah = formatCurrency(response.data.ongkir ?? 0);
                        $('#ongkir_hasil').text(hargaConvertRupiah);
                        var quantity = $('#quantity-input')
                            .val(); // Dapatkan nilai jumlah dari input
                        var ongkir = response.data.ongkir ?? 0;
                        var harga = {{ $menuById->harga }};
                        var diskon = document.getElementById("diskon_user_hidden").value;
                        var subtotal = harga * quantity;
                        var total = parseInt(subtotal - diskon) + parseInt(ongkir);
                        var hargaConvertRupiah = formatCurrency(harga);
                        var formattedSubTotal = formatCurrency(subtotal);
                        var formattedTotal = formatCurrency(total);
                        $('#hasil').text(formattedTotal);
                    },
                    error: function(xhr) {


                    }
                });
            })
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
                        _token: token,
                        // Kirim data yang diperlukan ke controller
                        quantity: $('#quantity-input').val(),
                        alamat: $('#inputAlamat').val(),
                        nama_menu: "{{ $menuById->nama_menu }}",
                        kategori_id: "{{ $menuById->kategori_id }}",
                        menu_id: "{{ $menuById->id }}",
                        deskripsi: "{{ $menuById->deksripsi }}",
                        harga: {{ $menuById->harga }},
                        subtotal: parseInt(getSubTotal.replace(/[^\d]+/g, "")),
                        diskon: {{ $isDiskon }},
                        total: parseInt(getTotal.replace(/[^\d]+/g, "")),
                    },
                    success: function(response) {

                        var whatsappUrl =
                            'https://wa.me/6285864438047?text=Saya%20ingin%20memesan ' +
                            encodeURIComponent("{{ $menuById->nama_menu }}");
                        window.location.href = whatsappUrl;
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
