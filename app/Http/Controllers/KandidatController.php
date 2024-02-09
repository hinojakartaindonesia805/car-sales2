<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;

class KandidatController extends Controller
{

    public function index(Request $request)
    {
        $id_kegiatan = $request->kegiatan;
        $data['page_title'] = 'Kandidat';
        $data['user'] = Kandidat::where('id_kegiatan',$id_kegiatan)->orderBy('id','desc')->get();
		return view('kandidat/kandidat',$data);
    }

    public function store(Request $request)
    {
        try {
            $data = new Kandidat();
            $data->id_kegiatan = $request->id_kegiatan;
            $data->nama = $request->name;
            $data->nik = $request->nik;
            $data->visi = $request->visi;
            $data->misi = $request->misi;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/foto_user/');
                $image->move($destinationPath, $name);
                $data->foto = $name;
            }
            $data->save();

            return redirect()->back()->with('success','Data has been created');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Data Failed created');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Kandidat::find($id);
            $data->id_kegiatan = $request->id_kegiatan;
            $data->nama = $request->name;
            $data->nik = $request->nik;
            $data->visi = $request->visi;
            $data->misi = $request->misi;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/foto_user/');
                $image->move($destinationPath, $name);
                $data->foto = $name;
            }
            $data->save();

            return redirect()->back()->with('success','Data has been updated');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('failed','Data Failed updated');
        }
    }

    public function delete($id)
    {
        try {
            $data = Kandidat::find($id);
            $data->delete();

            return redirect()->back()->with('success','Data has been delete');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Data Failed delete');
        }
    }
}
