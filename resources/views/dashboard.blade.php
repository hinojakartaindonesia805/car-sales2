@extends('layouts.user_type.auth')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</div>
  <div class="row mt-4">
      <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card" style="background-image: linear-gradient(310deg,aqua,blue)">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-lg-12">
                <div class="d-flex flex-column h-100">
                  <center>
                    <h2 class="font-weight-bolder" style="color: white">Selamat Datang di Dashboard Sekertaris</h2>
                  </center>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  
@endsection
@push('dashboard')




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


<script>
$(document).ready(function () {
        $('#myDataTable').DataTable();
        $('#myDataTable2').DataTable();
        $('#myDataTable3').DataTable();
    });

$("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
  </script>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

<script>
  $(document).ready(function() {
    filter()
    setInterval(filter, 5000);
    // setInterval(syncData2, 5000);
  });

  function filter() {
      let kegiatan = $('#kegiatan-input').val();
      console.log(kegiatan);

      syncData(kegiatan);
      syncData2(kegiatan);
  }
  
  function syncData(kegiatan) {
    var formData = {
      
    };
  
    console.log(formData);
    $.ajax({
        type: 'GET',
        url: '{{ url("hasil-json") }}'+'/'+kegiatan,
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
  function syncData2(kegiatan) {
    var formData = {
      
    };
  
    console.log(formData);
    $.ajax({
        type: 'GET',
        url: '{{ url("hasil-json") }}'+'/'+kegiatan,
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
            name: 'Total Suara',
            colorByPoint: true,
            data: data.series2
        }]
    });
  }
  
  
  </script>
@endpush

