<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['transaksi'] = Transaksi::where('status', 'SELESAI')->sum('total');
        $data['transaksi2'] = Transaksi::count();
        $data['mobil'] = Mobil::count();
        $data['user'] = User::count();
        return view('home', $data);
    }
}
