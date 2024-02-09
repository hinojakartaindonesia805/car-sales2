@extends('layouts-fe.app')

@section('style-fe')
<style>

.wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.card {
  overflow: hidden;
  box-shadow: 0px 2px 20px var(--clr-gray-light);
  background: white;
  border-radius: 0.5rem;
  position: relative;
  width: 350px;
  margin: 1rem;
  transition: 250ms all ease-in-out;
  cursor: pointer;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0px 2px 40px var(--clr-gray-light);
}

.banner-img {
  position: absolute;
  object-fit: cover;
  height: 14rem;
  width: 100%;
}

.category-tag {
  font-size: 0.8rem;
  font-weight: bold;
  color: white;
  background: red;
  padding: 0.5rem 1.3rem 0.5rem 1rem;
  text-transform: uppercase;
  position: absolute;
  z-index: 1;
  top: 1rem;
  border-radius: 0 2rem 2rem 0;
}

.popular {
  background: var(--clr-popular);
}

.technology {
  background: var(--clr-technology);
}

.psychology {
  background: var(--clr-psychology);
}

.card-body {
  margin: 15rem 1rem 1rem 1rem;
}

.blog-hashtag {
  font-size: 0.9rem;
  font-weight: 500;
  color: var(--clr-link);
}

.blog-title {
  line-height: 1.5rem;
  margin: 1rem 0 0.5rem;
}

.blog-description {
  color: var(--clr-gray-med);
  font-size: 0.9rem;
}

.card-profile {
  display: flex;
  /* margin-top: 2rem; */
  align-items: center;
}

.profile-img {
  width: 60px;
  height: 60px;
  object-fit: cover;
  border-radius: 50%;
}

.card-profile-info {
  /* margin-left: 1rem; */
}

.profile-name {
  font-size: 1rem;
}

.profile-followers {
  color: var(--clr-gray-med);
  font-size: 0.9rem;
}

.btn-detail:hover{
  background: blue!important;
  color: white!important;
}
.btn-vote:hover{
  background: green!important;
  color: white!important;
}


</style>
@endsection

@section('content-fe')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('{{asset('fe/assets/img/page-header.jpg')}}');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>{{ $page_title }}</h2>
            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('kegiatan') }}">Kegiatan</a></li>
          <li>{{ $page_title }}</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <span>{{ $page_title }}</span>
      <h2>{{ $page_title }}</h2>
    </div>

  @if (count($kandidat) > 0)
  <div class="wrapper mb-5">
    @foreach ($kandidat as $item)
    <div class="card">
      <div class="card-banner">
        <p class="category-tag popular" style="background: orange">Kandidat</p>
        <img class="banner-img" src='{{ asset('assets/img/foto_user/'.$item->foto) }}' alt=''>
      </div>
      <div class="card-body">
        <div class="card-profile">
          <div class="card-profile-info" style="width: 100%;">
            <h3 class="profile-name">{{ $item->nama }}</h3>
            <p class="profile-followers">#{{ $kegiatan->kegiatan. ' '.$kegiatan->tahun }}</p>
            
            <button class="btn btn-primary mb-2 btn-detail"  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}" style="width: 100%;background: none;color: black;border: 2px solid blue;">Detail</button>
           
            @if ($vote == null)
              @if (date('Y-m-d') > $kegiatan->tanggal_dari && date('Y-m-d') <= $kegiatan->tanggal_sampai)
                  @if (date('H:i:s') > $kegiatan->waktu_dari && date('H:i:s') < $kegiatan->waktu_sampai )
                    <button class="btn btn-primary btn-vote" onclick="voting('{{$kegiatan->id}}','{{$item->id}}')" style="width: 100%;background: none;color: black;border: 2px solid green;">Vote</button>
                  @endif
              @endif
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @foreach ($kandidat as $item2)
  
      <div class="modal fade" id="exampleModal{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">VISI & MISI</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>VISI</h5>
              {{ $item2->visi }}
              <hr>
                <h5>MISI</h5>
              {{ $item2->misi }}
            </div>
          </div>
        </div>
      </div>
    @endforeach
  @else

      <center>
        <img src="{{ asset('kegiatan/no-data.png') }}" alt="">
      </center>
      
  @endif

</div>
@endsection

@section('script-fe')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
           
    function voting(id_kegiatan,id_kandidat) {
      var formData = {
          'id_kegiatan': id_kegiatan,
          'id_kandidat': id_kandidat,
      };


      console.log(formData);
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
          url: '{{ route("voting") }}',
          data: formData,
          dataType: 'json',
          success: function(data) {

              if (data.msg == 'berhasil') {
                  Swal.fire({
                      position: "center",
                      icon: "success",
                      title: data.reason,
                      showConfirmButton: false,
                      timer: 1500
                  });
                  $('.btn-vote').addClass('d-none');
                  // location.reload();
                  
              }else{
                  Swal.fire({
                      position: "center",
                      icon: "error",
                      title: data.reason,
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
    }
</script>
@endsection