@extends('layouts.user_type.auth')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
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
    <form action="" method="get">
    <div class="row">
            <div class="col-lg-4">
                <select name="status" class="form-control" id="" required>
                    <option value="All" >Semua Status</option>
                    <option value="1" >Aktif</option>
                    <option value="2" >Tidak Aktif</option>
                </select>
            </div>
            <div class="col-lg-4">
            <button class="btn btn-primary" type="submit">Filter</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0 mb-2">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Daftar Admin</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+&nbsp; Tambah Admin</a>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form role="form text-left" method="POST" action="{{ route('tambah-user') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Name</label>
                                          <input type="text" class="form-control" placeholder="Name" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                                          @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                          @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" id="" required>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Status</label>
                                            <select name="status" class="form-control" id="" required>
                                                <option value="1" >Aktif</option>
                                                <option value="2" >Tidak Aktif</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3 keterangan-div-create" >
                                            <label for="">Keterangan</label> 
                                            <textarea name="reason_non_aktif" class="form-control" id="" cols="30" rows="10"></textarea>
                                        @error('reason_non_aktif')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="">Foto</label> 
                                            <input name="foto" type="file" class="dropify" data-height="200" data-max-file-size="500K" data-allowed-file-extensions="jpg png jpeg"     />
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
                                        <input type="hidden" value="Admin" name="role">
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
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jenis Kelamin
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        role
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aktif/Tidak Aktif
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
                                        @if ($item->foto != null)
                                        <img style="max-width: 100px" src="{{ asset('assets/img/foto_user/'.$item->foto) }}" alt="">
                                        @else
                                        <img style="max-width: 100px" src="../assets/img/blank-logo.png" alt="..." class="w-100 border-radius-lg shadow-sm">
                                        @endif
                                    </td>
                                   
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->email }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->jenis_kelamin }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->role }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $item->created_at->format('d/m/Y') }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if ($item->status == 2)
                                             <span class="badge bg-danger" data-bs-toggle="tooltip">Tidak Aktif</span>
                                             <a href="#" type="button" title="Klik untuk lihat reason!" data-bs-toggle="modal" data-bs-target="#reason{{ $item->id }}">
                                                <i class="fas fa-edit	text-secondary"></i>
                                            </a>
                                        @else
                                             <span class="badge bg-success">Aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                    <a href="#" type="button" onclick="editStatus('{{$item->status}}')" data-bs-toggle="modal" data-bs-target="#modaledit{{ $item->id }}">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <a href="{{ route('delete-user',$item->id) }}" type="button" >
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form role="form text-left" method="POST" action="{{ route('update-user',$item2->id) }}" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
                @csrf
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
                <div class="mb-3">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="" required>
                        <option value="Laki-Laki" {{ $item2->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ $item2->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Status</label>
                    <select name="status" class="form-control" id="" required>
                        <option value="1" {{ $item2->status == '1' ? 'selected' : '' }}>Aktif</option>
                        <option value="2" {{ $item2->status == '2' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 keterangan-div" >
                    <label for="">Keterangan</label> 
                    <textarea name="reason_non_aktif" class="form-control" id="" cols="30" rows="10">{{ $item2->reason_non_aktif  }}</textarea>
                @error('reason_non_aktif')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
                </div>

                <input type="hidden" value="Admin" name="role">

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
<div class="modal fade" id="reason{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Keterangan Tidak Aktif</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            @csrf
        <div class="modal-body">
             {{ $item2->reason_non_aktif ?? 'Tidak ada keterangan' }}
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
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

<script>
$('.dropify').dropify();

function editStatus(id){
    console.log('====================================');
    console.log(id);
    console.log('====================================');
    // Sembunyikan div saat halaman dimuat
    if (id == 2) {
        $('.keterangan-div').show();
    }else{
        $('.keterangan-div').hide();
    }

    // Tambahkan event listener untuk memantau perubahan pada dropdown
    if ($(this).val() === '2') {
        $('.keterangan-div').show();
    } else {
        $('.keterangan-div').hide();
    }
}

    $(document).ready(function () {
        $('#myDataTable').DataTable();
        $('.keterangan-div-create').hide();
        // Tambahkan event listener untuk memantau perubahan pada dropdown
        $('select[name="status"]').change(function() {
            console.log($(this).val());
            if ($(this).val() === '2') {
                $('.keterangan-div').show();
                $('.keterangan-div-create').show();
            } else {
                $('.keterangan-div').hide();
                $('.keterangan-div-create').hide();
            }
        });

    });

    
</script>

@endsection