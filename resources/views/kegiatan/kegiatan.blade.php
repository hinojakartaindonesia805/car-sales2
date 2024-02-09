@extends('layouts.user_type.auth')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<div>
 
    @if($errors->any())
        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
            <span class="alert-text text-white">
            {{$errors->first()}}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif
    @if(session('success'))
        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
            <span class="alert-text text-white">
            {{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif
    @if(session('failed'))
        <div class="m-3  alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert">
            <span class="alert-text text-white">
            {{ session('failed') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0 mb-2">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{ $page_title ?? '' }}</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+&nbsp; New {{ $page_title }}</a>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New {{ $page_title ?? '' }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form role="form text-left" method="POST" action="{{ route('tambah-kegiatan') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Kegiatan</label>
                                        <input type="text" class="form-control" placeholder="Kegiatan" name="kegiatan" id="name" aria-label="Name" aria-describedby="name" value="{{ old('kegiatan') }}">
                                        @error('kegiatan')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="">Tahun</label>
                                        <input type="number" class="form-control" placeholder="Tahun Ex: {{ date('Y') }}" name="tahun" id="datepicker" aria-label="Name" aria-describedby="name" value="{{ old('kegiatan') }}">
                                        @error('kegiatan')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                        </div>

                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="">Tanggal Dari</label>
                                                <input type="date" class="form-control" placeholder="Tahun Ex: {{ date('Y') }}" name="tanggal_dari" id="datepicker" aria-label="Name" aria-describedby="name" value="{{ old('kegiatan') }}">
                                                @error('kegiatan')
                                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="">Tanggal Sampai</label>
                                                <input type="date" class="form-control" placeholder="Tahun Ex: {{ date('Y') }}" name="tanggal_sampai" id="datepicker" aria-label="Name" aria-describedby="name" value="{{ old('kegiatan') }}">
                                                @error('kegiatan')
                                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="">Waktu Dari</label>
                                                <input type="time" class="form-control" placeholder="Tahun Ex: {{ date('Y') }}" name="waktu_dari" id="datepicker" aria-label="Name" aria-describedby="name" value="{{ old('kegiatan') }}">
                                                @error('kegiatan')
                                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="">Waktu Sampai</label>
                                                <input type="time" class="form-control" placeholder="Tahun Ex: {{ date('Y') }}" name="waktu_sampai" id="datepicker" aria-label="Name" aria-describedby="name" value="{{ old('kegiatan') }}">
                                                @error('kegiatan')
                                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
  
                    </div>
                </div>
     
                <div class="card-body px-3 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="myDataTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kegiatan
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tahun
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Waktu
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kandidat
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Data Suara
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kegiatan as $item)
                                    <tr>
                                            
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->kegiatan }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->tahun }}</p>
                                        </td>
                                        
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $item->tanggal_dari.' - '.$item->tanggal_sampai }}
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $item->waktu_dari.' - '.$item->waktu_sampai }}
                                            </p>
                                        </td>
                                        <td class="text-center">
                                            @if ($item->tahun > date('Y') )
                                                <span class="badge bg-info">Belum Mulai</span>
                                            @else
                                            {{-- {{dd(date('Y-m-d') > $item->tanggal_sampai)}} --}}
                                                @if (date('Y-m-d') > $item->tanggal_sampai)
                                                    <span class="badge bg-success">Selesai1</span>
                                                @else
                                                    @if (date('Y-m-d') > $item->tanggal_dari &&  date('Y-m-d') <= $item->tanggal_sampai)
                                                        @if (date('H:i:s') > $item->waktu_dari && date('H:i:s') < $item->waktu_sampai )
                                                        <span class="badge bg-warning">Berjalan</span>
                                                        @else
                                                        <span class="badge bg-danger">Belum Mulai Jam</span>
                                                        @endif
                                                    @else
                                                        <span class="badge bg-success">Selesai</span>
                                                    @endif
                                                @endif
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <a class="btn btn-primary" href="{{ url('kandidat-management?kegiatan='.$item->id) }}">Kandidat</a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-primary" href="{{ route('data-suara',$item->id) }}">Lihat</a>
                                        </td>
                                        
                                        <td class="text-center">
                                        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#modaledit{{ $item->id }}">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <a href="{{ route('delete-kegiatan',$item->id) }}" type="button" >
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </a>
                                        </td>
                                    </tr>
                                @endforeach

                      

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($kegiatan as $item2)
<div class="modal fade" id="modaledit{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $page_title ?? '' }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form role="form text-left" method="POST" action="{{ route('update-kegiatan',$item2->id) }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="">Kegiatan</label>
            <input type="text" class="form-control" placeholder="Kegiatan" name="kegiatan" id="name" aria-label="Name" aria-describedby="name" value="{{ old('kegiatan') ?? $item2->kegiatan }}">
            @error('kegiatan')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
            </div>
            
            <div class="mb-3">
                <label for="">Tahun</label>
            <input type="number" class="form-control" placeholder="Tahun Ex: {{ date('Y') }}" name="tahun" id="datepicker" aria-label="Name" aria-describedby="name" value="{{ old('tahun') ?? $item2->tahun }}">
            @error('kegiatan')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
            @enderror
            </div>

            
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="">Tanggal Dari</label>
                    <input type="date" class="form-control" placeholder="Tahun Ex: {{ date('Y') }}" name="tanggal_dari" id="datepicker" aria-label="Name" aria-describedby="name" value="{{ old('tanggal_dari') ?? $item2->tanggal_dari }}">
                    @error('kegiatan')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="">Tanggal Sampai</label>
                    <input type="date" class="form-control" placeholder="Tahun Ex: {{ date('Y') }}" name="tanggal_sampai" id="datepicker" aria-label="Name" aria-describedby="name" value="{{ old('tanggal_sampai') ?? $item2->tanggal_sampai }}">
                    @error('kegiatan')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="">Waktu Dari</label>
                    <input type="time" class="form-control" placeholder="Tahun Ex: {{ date('Y') }}" name="waktu_dari" id="datepicker" aria-label="Name" aria-describedby="name" value="{{ old('waktu_dari') ?? $item2->waktu_dari }}">
                    @error('kegiatan')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="">Waktu Sampai</label>
                    <input type="time" class="form-control" placeholder="Tahun Ex: {{ date('Y') }}" name="waktu_sampai" id="datepicker" aria-label="Name" aria-describedby="name" value="{{ old('waktu_sampai') ?? $item2->waktu_sampai }}">
                    @error('kegiatan')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
            </div>
                
        </div>
        
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
        </div>
    </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal2{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visi & Misi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <center>
                <h5>VISI</h5>
            </center>
            {{ $item2->visi }}
            <center>
                <h5>MISI</h5>
            </center>
            {{ $item2->misi }}
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

@endforeach



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myDataTable').DataTable();
    });

        
    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
</script>

@endsection