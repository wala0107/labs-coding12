<?php

namespace App\Http\Controllers;

use App\Service;
use App\Icon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $icons = Icon::all();
        $services = Service::all();
        return view('service.viewService',compact('services','icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $icons = Icon::all();
        return view('service.addService',compact('icons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon_id'=> 'required',
            'titre'=>'required',
            'description'=>'required',
        ]);
        
        $service = new Service();
        $service->titre = $request->input('titre');
        $service->description = $request->input('description');
        $service->icon_id = $request->input('icon_id');
        $service->save();


        return redirect()->route('service.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $icons = Icon::all();
     
        return view('service.editService',compact('service','icons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'icon_id'=> 'required',
            'titre'=>'required',
            'description'=>'required',
        ]);
        
        $service->titre = $request->input('titre');
        $service->description = $request->input('description');
        $service->icon_id = $request->input('icon_id');
        $service->save();


        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index');
    }
}
