<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mmControlers extends Controller
{
    public function beritaKsi()
    {
        return view('mm.beritaKsi');
    }
    public function profilKelulusanKSI()
    {
        return view('mm.profilKelulusanKSI');
    }
    public function profilDosen()
    {
        return view('mm.profilDosen');
    }
    public function home()
    {
        return view('mm.home');
    }

}