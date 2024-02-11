<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $data['page_title'] = 'Daftar Customer';
        $data['user'] = User::where('role','Customer')->orderBy('id','desc')->get();
		return view('customer/customer',$data);
    }

    public function detail($id)
    {
        $data['customer'] = User::find($id);
        $data['page_title'] = 'Detail '.$data['customer']->name;
        return view('customer/detail-customer',$data);
    }
}
