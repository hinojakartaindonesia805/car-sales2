<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\DataBarang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function dashboard(Request $request){
        $data['page_title'] = 'Dashboard';

		return view('dashboard',$data);
    }

}
