<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satellite;

class SatelliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satellites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Satellite::create([
            'name' => $request->name,
            'longitude' => $request->longtitude
        ]);

        return redirect()->view('satellites.show', ['satellite' => Satellite::find(1)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Satellite $satellite)
    {
        return view('satellites.show', ['satellite' => Satellite::find($satellite->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $satellite
     * @return \Illuminate\Http\Response
     */
    public function edit(Satellite $satellite)
    {
        return view('satellites.edit', ['satellite' => Satellite::find($satellite->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Satellite $satellite)
    {
        dump($satellite); exit();
        $data = Satellite::find($satellite->id);
        $data->name = $satellite->name;
        $data->longtitude = $satellite->longtitude;
        $data->save();

        return view('satellites.show', ['satellite' => Satellite::find($satellite->id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Satellite $satellite)
    {
        
        Satellite::destroy($satellite->id);
        return redirect()->route('home');
    }    
}
