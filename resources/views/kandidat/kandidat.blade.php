@extends('layouts.user_type.auth')

@section('content')
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
                                <form role="form text-left" method="POST" action="{{ route('tambah-kandidat') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                        @csrf
                                        @php
                                            $id_kegiatan = Request::get('kegiatan') ?? '';
                                        @endphp
                                        <input type="hidden" name="id_kegiatan" value="{{ $id_kegiatan }}">
                                        <div class="mb-3">
                                            <label for="">Name</label>
                                          <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                                          @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">NIK</label> 
                                        <input type="number" class="form-control" placeholder="NIK" name="nik" id="nik" aria-label="nik" aria-describedby="email-addon" value="{{ old('nik')}}">
                                        @error('nik')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Foto</label> 
                                        <input type="file" class="form-control" placeholder="NIK" name="foto" id="nik" aria-label="nik" aria-describedby="email-addon" value="{{ old('nik')}}">
                                        @error('foto')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">VISI</label> 
                                            <textarea name="visi" class="form-control" cols="30" rows="10"></textarea>
                                        @error('visi')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">MISI</label> 
                                            <textarea name="misi" class="form-control" cols="30" rows="10"></textarea>
                                        @error('misi')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
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
                                        Foto
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Kandidat
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NIK
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Visi & Misi
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                <tr>
                                        
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ asset('assets/img/foto_user/'.$item->foto) }}" style="max-width: 100px" alt="">
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->nama }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->nik }}</p>
                                    </td>
                                    <td class="text-center">
                                      
                                         <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal2{{ $item->id }}">
                                            Visi & Misi
                                        </button>
                                        
                                        

                                    </td>
                                    
                                    <td class="text-center">
                                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#modaledit{{ $item->id }}">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <a href="{{ route('delete-kandidat',$item->id) }}" type="button" >
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

@foreach ($user as $item2)
<div class="modal fade" id="modaledit{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit {{ $page_title ?? '' }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form role="form text-left" method="POST" action="{{ route('update-kandidat',$item2->id) }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
                @csrf
                <input type="hidden" name="id_kegiatan" value="{{ $id_kegiatan }}">

                <div class="mb-3">
                    <label for="">Nama Kandidat</label>
                  <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') ?? $item2->nama  }}">
                  @error('nama')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="">NIK</label> 
                <input type="number" class="form-control" placeholder="NIK" name="nik" id="nik" aria-label="nik" aria-describedby="email-addon" value="{{ old('nik') ?? $item2->nik }}">
                @error('nik')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="">Foto</label> <br>
                        <img src="{{ asset('assets/img/foto_user/'.$item2->foto) }}" style="max-width: 100px" alt="">
                    <br>
                <input type="file" class="form-control" placeholder="NIK" name="foto" id="nik" aria-label="nik" aria-describedby="email-addon" value="{{ old('nik')}}">
                @error('foto')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="">VISI</label> 
                    <textarea name="visi" class="form-control" cols="30" rows="10">{{ $item2->visi }}</textarea>
                @error('visi')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="">MISI</label> 
                    <textarea name="misi" class="form-control" cols="30" rows="10">{{ $item2->misi }}</textarea>
                @error('misi')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
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
</script>

@endsection