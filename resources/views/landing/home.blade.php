@extends('layouts-fe.app')

@section('style-fe')

@endsection

@section('content-fe')
@include('sweetalert::alert')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Pilih Kandidat Terbaikmu!</h2>
          <p data-aos="fade-up" data-aos-delay="100">Facere distinctio molestiae nisi fugit tenetur repellat non praesentium nesciunt optio quis sit odio nemo quisquam. eius quos reiciendis eum vel eum voluptatem eum maiores eaque id optio ullam occaecati odio est possimus vel reprehenderit</p>

          <form action="#" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
            <input type="text" id="nik" name="nik" class="form-control" placeholder="CEK DATA NIK">
            <button type="button" class="btn btn-primary" id="submit-button">Search</button>
          </form>

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">
            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $santri }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Santri</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span data-purecounter-start="0" data-purecounter-end="{{ $kegiatan }}" data-purecounter-duration="1" class="purecounter"></span>
                  <p>Kegiatan</p>
                </div>
              </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $kandidat }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Kandidat</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $suara }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Suara</p>
              </div>
            </div><!-- End Stats Item -->

          </div>
        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>
  </section>
  <!-- End Hero Section -->
@endsection

@section('script-fe')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $('#submit-button').click(function(){
            let nik = $('#nik').val();
            // Mengambil data dari form atau dari elemen HTML lainnya
            var formData = {
                'nik': nik,
            };

            let timerInterval;
                Swal.fire({
                title: "Sedang Proses Data!",
                html: "Mohon tunggu beberapa saat!",
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log("I was closed by the timer");
                    }
                });
            $.ajax({
                type: 'GET',
                url: '{{ route("cek-data") }}',
                data: formData,
                dataType: 'json',
                success: function(data) {

                    if (data.msg == 'Data NIK tersedia!') {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }else{
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }

                    // Handle respon dari server jika berhasil
                    console.log(data);
                },
                error: function(xhr, status, error) {
                    // Handle respon dari server jika terjadi kesalahan
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

@endsection