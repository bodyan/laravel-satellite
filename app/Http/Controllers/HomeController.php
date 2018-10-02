<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satellite;
use App\Transponder;
use App\Channel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satellites = Satellite::with('transponders.channels')
            ->whereHas('approvedChannels')
            ->orderBy('satellites.longitude', 'ASC')
            ->get();

        return view('home', ['satellites' => $satellites]);
    }
}
