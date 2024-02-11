@extends('layouts.user_type.auth')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                            <h5 class="mb-0">Daftar Agensi</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+&nbsp; Tambah Agensi</a>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Agensi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form role="form text-left" method="POST" action="{{ route('tambah-agensi') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Tipe Bisnis</label> <br>
                                            <select id="tipe_bisnis" class="form-control" name="tipe_bisnis" required>
                                                <option value="Perdagangan eceran">Perdagangan eceran</option>
                                                <option value="Jasa konsultasi">Jasa konsultasi</option>
                                                <option value="Manufaktur">Manufaktur</option>
                                                <option value="Teknologi informasi dan layanan terkait">Teknologi informasi dan layanan terkait</option>
                                                <option value="Restoran dan layanan makanan">Restoran dan layanan makanan</option>
                                                <option value="Jasa kecantikan dan perawatan pribadi">Jasa kecantikan dan perawatan pribadi</option>
                                                <option value="Perdagangan grosir">Perdagangan grosir</option>
                                                <option value="Perbankan dan keuangan">Perbankan dan keuangan</option>
                                                <option value="Pendidikan dan pelatihan">Pendidikan dan pelatihan</option>
                                                <option value="Hiburan dan rekreasi">Hiburan dan rekreasi</option>
                                                <option value="Konstruksi dan pembangunan">Konstruksi dan pembangunan</option>
                                                <option value="Transportasi dan logistik">Transportasi dan logistik</option>
                                                <option value="Penerbitan dan media">Penerbitan dan media</option>
                                                <option value="Pertanian dan peternakan">Pertanian dan peternakan</option>
                                                <option value="Kesehatan dan layanan medis">Kesehatan dan layanan medis</option>
                                                <option value="Real estat dan properti">Real estat dan properti</option>
                                                <option value="Otomotif dan perbaikan kendaraan">Otomotif dan perbaikan kendaraan</option>
                                                <option value="Lingkungan dan energi terbarukan">Lingkungan dan energi terbarukan</option>
                                                <option value="Layanan hukum dan konsultasi hukum">Layanan hukum dan konsultasi hukum</option>
                                                <option value="Layanan pembersihan dan perawatan rumah tangga">Layanan pembersihan dan perawatan rumah tangga</option>
                                            </select>
                                          @error('bisnis_tipe')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Name</label>
                                          <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                                          @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Foto</label> 
                                            <input name="foto" type="file" class="dropify" required data-height="200" data-max-file-size="500K" data-allowed-file-extensions="jpg png jpeg"     />
                                        @error('foto')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Email</label>
                                          <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                                          @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        <input type="hidden" value="Agensi" name="role">
                                        <div class="mb-3">
                                            <label for="">Password</label>
                                          <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-label="Password" aria-describedby="password-addon">
                                          @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                          <input type="hidden" value="on" name="agreement">
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
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Foto
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tipe Bisnis
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date
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
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <img style="max-width: 100px" src="{{ asset('assets/img/foto_user/'.$item->foto) }}" alt="">
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->bisnis_tipe }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->email }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at->format('d/m/Y') }}</span>
                                    </td>
                                    <td class="text-center">
                                    <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#modaledit{{ $item->id }}">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <a href="{{ route('delete-agensi',$item->id) }}" type="button" >
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
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Agensi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form role="form text-left" method="POST" action="{{ route('update-agensi',$item2->id) }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
                @csrf
                @php
                    $tipe_bisnis = array(
                        "Perdagangan eceran",
                        "Jasa konsultasi",
                        "Manufaktur",
                        "Teknologi informasi dan layanan terkait",
                        "Restoran dan layanan makanan",
                        "Jasa kecantikan dan perawatan pribadi",
                        "Perdagangan grosir",
                        "Perbankan dan keuangan",
                        "Pendidikan dan pelatihan",
                        "Hiburan dan rekreasi",
                        "Konstruksi dan pembangunan",
                        "Transportasi dan logistik",
                        "Penerbitan dan media",
                        "Pertanian dan peternakan",
                        "Kesehatan dan layanan medis",
                        "Real estat dan properti",
                        "Otomotif dan perbaikan kendaraan",
                        "Lingkungan dan energi terbarukan",
                        "Layanan hukum dan konsultasi hukum",
                        "Layanan pembersihan dan perawatan rumah tangga"
                    );
                @endphp     
                <div class="mb-3">
                    <label for="">Tipe Bisnis</label>
                    <select id="tipe_bisnis" class="form-control" name="tipe_bisnis" required>
                        @foreach ($tipe_bisnis as $tb)
                            <option value="{{ $tb }}" {{ $tb == $item2->bisnis_tipe ? 'selected' : '' }}>{{ $tb }}</option>
                        @endforeach
                    </select>
                  @error('bisnis_tipe')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="">Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') ?? $item2->name }}">
                @error('name')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') ?? $item2->email }}">
                @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="">Foto</label> 
                    <input name="foto" type="file" class="dropify" data-height="200" data-max-file-size="500K" data-allowed-file-extensions="jpg png jpeg"    
                                        data-default-file="{{ asset('assets/img/foto_user/'.$item2->foto) }}" value="{{$item2->foto}}" />
                @error('foto')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
                </div>
                <input type="hidden" value="Agensi" name="role">

                <div class="mb-3">
                    <label for="">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-label="Password" aria-describedby="password-addon">
                @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
                <input type="hidden" value="on" name="agreement">
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
@endforeach



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$('.select2').select2();
$('.dropify').dropify();

    $(document).ready(function () {
        $('#myDataTable').DataTable();
    });
</script>

@endsection