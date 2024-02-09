<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Suara;
use Illuminate\Http\Request;

class SuaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data['page_title'] = 'Suara Voting';
        $data['kegiatan'] = Kegiatan::find($id);
        $data['suara'] = Suara::where('id_kegiatan',$data['kegiatan']->id)->orderBy('id','desc')->get();
		return view('kegiatan/vote',$data);
    }

}
