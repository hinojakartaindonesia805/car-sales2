@extends('layouts-fe.app')

@section('style-fe')
<style>

.wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.card1 {
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

.card1:hover {
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

.card-body1 {
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
            <h2>QuickCount Hasil Pemilihan</h2>
            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li>QuickCount</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <div class="section-header">
    <span>QuickCount</span>
    <h2>QuickCount</h2>
  </div>
  

  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <div id="pie"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <div id="chartQuick"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section-header">
    <span>Kandidat</span>
    <h2>Kandidat</h2>
  </div>
  
  @if (count($kandidat) > 0)
      
  <div class="wrapper mb-5">
    @foreach ($kandidat as $item)
    <div class="card card1">
      <div class="card-banner">
        <p class="category-tag popular" style="background: orange">Kandidat</p>
        <img class="banner-img" src='{{ asset('assets/img/foto_user/'.$item->foto) }}' alt=''>
      </div>
      <div class="card-body card-body1">
        <div class="card-profile">
          <div class="card-profile-info" style="width: 100%;">
            <h3 class="profile-name">{{ $item->nama }}</h3>
            <p class="profile-followers">#{{ $kegiatan->kegiatan. ' '.$kegiatan->tahun }}</p>
            
            <button class="btn btn-primary mb-2 btn-detail"  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}" style="width: 100%;background: none;color: black;border: 2px solid blue;">Detail</button>
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


@endsection

@section('script-fe')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
  syncData()
  syncData2()
  setInterval(syncData, 5000);
  setInterval(syncData2, 5000);
});

function syncData() {
  var formData = {
    
  };

  console.log(formData);
  $.ajax({
      type: 'GET',
      url: '{{ url("hasil-json") }}'+'/'+{{ $kegiatan->id }},
      data: formData,
      dataType: 'json',
      success: function(data) {

          if (data.msg == 'berhasil') {
              updateChart(data);
          }
          console.log(data);
      },
      error: function(xhr, status, error) {
          // Handle respon dari server jika terjadi kesalahan
          console.error(xhr.responseText);
      }
  });
}
function syncData2() {
  var formData = {
    
  };

  console.log(formData);
  $.ajax({
      type: 'GET',
      url: '{{ url("hasil-json") }}'+'/'+{{ $kegiatan->id }},
      data: formData,
      dataType: 'json',
      success: function(data) {

          if (data.msg == 'berhasil') {
              updatePie(data);
          }
          console.log(data);
      },
      error: function(xhr, status, error) {
          // Handle respon dari server jika terjadi kesalahan
          console.error(xhr.responseText);
      }
  });
}

function updateChart(data) {
  // Data retrieved https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature
  Highcharts.chart('chartQuick', {
      chart: {
          type: 'spline'
      },
      title: {
          text: 'QuickCount Perolehan Suara'
      },
      subtitle: {
          text: ''
      },
      xAxis: {
          categories: data.tanggal,
          accessibility: {
              description: 'Months of the year'
          }
      },
      yAxis: {
          title: {
              text: 'Suara'
          },
          labels: {
              format: ''
          }
      },
      tooltip: {
          crosshairs: true,
          shared: true
      },
      plotOptions: {
          spline: {
              marker: {
                  radius: 4,
                  lineColor: '#666666',
                  lineWidth: 1
              }
          }
      },
      series: data.series1
  });
}

function updatePie(data) {
  console.log(data.series2);
  // Data retrieved from https://netmarketshare.com/
  // Build the chart
  Highcharts.chart('pie', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'QuickCount Perolehan Suara',
          align: 'left'
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}</b>'
      },
      accessibility: {
          point: {
              valueSuffix: ''
          }
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: false
              },
              showInLegend: true
          }
      },
      series: [{
          name: 'Total Vote',
          colorByPoint: true,
          data: data.series2
      }]
  });
}


</script>
@endsection