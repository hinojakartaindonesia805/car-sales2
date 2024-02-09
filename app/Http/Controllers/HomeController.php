<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Kegiatan;
use App\Models\Suara;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function dashboard(Request $request){
        $data['page_title'] = 'Dashboard';
        
        $data['santri'] = User::where('role','Santri')->get()->count();
        $data['kegiatan'] = Kegiatan::get()->count();
        $data['kandidat'] = Kandidat::get()->count();
        $data['suara'] = Suara::get()->count();
        $data['kegiatan_all'] = Kegiatan::get();

		return view('dashboard',$data);
    }

    public function home(Request $request){
        $data['page_title'] = 'Home';

        $nik = $request->nik;
        $data['santri'] = User::where('role','Santri')->get()->count();
        $data['kegiatan'] = Kegiatan::get()->count();
        $data['kandidat'] = Kandidat::get()->count();
        $data['suara'] = Suara::get()->count();

		return view('landing.home',$data);
    }
    public function cekData(Request $request){

        $nik = $request->nik;

        if ($nik != null) {
            if ($request->status == null) {
                $search = User::where('nik',$nik)->first();
                if ($search != null) {
                    return response()->json([
                        'msg' => 'Data NIK tersedia!'
                    ]);
                }else{
                    return response()->json([
                        'msg' => 'Data NIK tidak tersedia!'
                    ]);
                }
            }
        }
    }
    public function kegiatan(Request $request){
        $data['page_title'] = 'Kegiatan';
        $data['kegiatan'] = Kegiatan::get();
		return view('landing.kegiatan',$data);
    }
    public function kandidat($id){
        $data['page_title'] = 'Kandidat';

        if (Auth::check() == null) {
            return redirect('/login');
        }
        $data['kegiatan'] = Kegiatan::find($id);
        $data['vote'] = Suara::where('id_kegiatan',$id)->where('id_user',Auth::user()->id)->first();
        $data['page_title'] = 'Kandidat '.$data['kegiatan']->kegiatan.' '.$data['kegiatan']->tahun;
        $data['kandidat'] = Kandidat::where('id_kegiatan',$id)->orderBy('id','asc')->get();
		return view('landing.kandidat',$data);
    }

    public function vote(Request $request){
        $id_kegiatan = $request->id_kegiatan;
        $id_kandidat = $request->id_kandidat;
        $vote = new Suara();
        $vote->id_user = Auth::user()->id;
        $vote->id_kandidat = $id_kandidat;
        $vote->id_kegiatan = $id_kegiatan;
        $vote->tanggal_waktu = date('Y-m-d H:i:s');
        $vote->tanggal = date('Y-m-d');
        if ($vote->save()) {
            return response()->json([
                'msg' => 'berhasil',
                'reason' => 'Berhasil Vote Kandidat!'
            ]);
        }else{
            return response()->json([
                'msg' => 'gagal!',
                'reason' => 'Gagal Vote Kandidat!'
            ]);
        }
    }


    public function hasil($id){
        $data['page_title'] = 'QuickCount Hasil';
        // dd($data);
        $data['kegiatan'] = Kegiatan::find($id);
        $data['vote'] = Suara::where('id_kegiatan',$id)->where('id_user',Auth::user()->id)->first();
        $data['page_title'] = 'Kandidat '.$data['kegiatan']->kegiatan.' '.$data['kegiatan']->tahun;
        $data['kandidat'] = Kandidat::where('id_kegiatan',$id)->orderBy('id','desc')->get();

		return view('landing.quickcount',$data);
    }
    public function hasilJson($id){
        $data['page_title'] = 'QuickCount Hasil';
        // dd($data);
        $data['kegiatan'] = Kegiatan::find($id);
        $data['vote'] = Suara::where('id_kegiatan',$id)->where('id_user',Auth::user()->id)->first();
        $data['page_title'] = 'Kandidat '.$data['kegiatan']->kegiatan.' '.$data['kegiatan']->tahun;
        $data['kandidat'] = Kandidat::where('id_kegiatan',$id)->orderBy('id','asc')->get();


         // Waktu dan tanggal dari hasil yang diberikan
         $tanggal_dari = $data['kegiatan']->tanggal_dari;
         $tanggal_sampai = $data['kegiatan']->tanggal_sampai;
            // Array untuk menyimpan rentang tanggal
            $rentang_tanggal = [];
            $data_kandidat = [];

            // Ubah tanggal dari dan tanggal sampai ke dalam objek DateTime untuk memudahkan manipulasi
            $start_date = new DateTime($tanggal_dari);
            $end_date = new DateTime($tanggal_sampai);

            // Mulai looping dari tanggal awal hingga tanggal akhir
            while ($start_date <= $end_date) {
                // Tambahkan tanggal saat ini ke dalam array
                $rentang_tanggal[] = $start_date->format('Y-m-d');
                // Tambahkan 1 hari ke tanggal saat ini
                $start_date->modify('+1 day');
            }

          // Loop melalui kandidat
          if (count($data['kandidat']) > 0) {
            foreach ($data['kandidat'] as $value) {
                $series_kandidat = [
                    'name' => $value->nama,
                    'marker' => [
                        'symbol' => 'square' // Atur symbol sesuai keinginan Anda
                    ],
                    'data' => [] // Array untuk menyimpan data suara
                ];
                $jumlah_suara2 = Suara::where('id_kandidat', $value->id)
                ->where('id_kegiatan', $id)
                ->count();
                

                $series2_kandidat = [
                    'name' => $value->nama,
                    'y' => $jumlah_suara2 // Array untuk menyimpan data suara
                ];

                // Loop melalui rentang tanggal
                foreach ($rentang_tanggal as $tgl) {
                    $rt = new DateTime($tgl);
                    // Hitung jumlah suara untuk kandidat pada tanggal tertentu
                    $jumlah_suara = Suara::where('tanggal', $rt->format('Y-m-d'))
                                        ->where('id_kandidat', $value->id)
                                        ->where('id_kegiatan', $id)
                                        ->count();
                    // Tambahkan jumlah suara ke dalam data suara kandidat
                    $series_kandidat['data'][] = $jumlah_suara;
                }

                               // Tambahkan series kandidat ke dalam array series
                $series[] = $series_kandidat;
                $series2[] = $series2_kandidat;
            }
          }
          
        return response()->json([
            'msg' => 'berhasil',
            'tanggal' => $rentang_tanggal,
            'series1' => $series ?? [],
            'series2' => $series2 ?? [],
        ]);
    }



    public function random(Request $request)
    {
       
        try {
            $attributes = request()->validate([
                'name' => ['required', 'max:50'],
                'role' => ['required'],
                'nik' => ['required'],
                'jenis_kelamin' => ['required'],
                'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
                'password' => ['required', 'min:5', 'max:20'],
            ]);
            
            $attributes['password'] = bcrypt($attributes['password'] );
            User::create($attributes);  

            return redirect()->back()->with('success','Berhasil Register!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Gagal Register');
        }
    }
}
