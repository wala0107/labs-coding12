<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonials.viewTestimonial',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('testimonials.addTestimonial');
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
            'img'=> 'required',
            'nom'=>'required',
            'prenom'=>'required',
            'role'=>'required',
            'company'=>'required',
            'text'=>'required',
        ]);
        $testimonial = new Testimonial();
        $img = $request->file('img');
        $newName = Storage::disk('public')->put('',$img);
        $testimonial->img = $newName ;
        $testimonial->nom = $request->input('nom');
        $testimonial->prenom = $request->input('prenom');
        $testimonial->role = $request->input('role');
        $testimonial->company = $request->input('company');
        $testimonial->text = $request->input('text');
        $testimonial->save();
        return redirect()->route('testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('testimonials.editTestimonial',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'role'=>'required',
            'company'=>'required',
            'text'=>'required',
        ]);

        if($request->hasFile('img')){
            $img = $request->file('img');
            $newName = Storage::disk('public')->put('',$img);
            Storage::disk('public')->delete($testimonial->img);
            $testimonial->img = $newName ;
        }
        $testimonial->nom = $request->input('nom');
        $testimonial->prenom = $request->input('prenom');
        $testimonial->role = $request->input('role');
        $testimonial->company = $request->input('company');
        $testimonial->text = $request->input('text');
       
        $testimonial->save();
        return redirect()->route('testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        
        Storage::disk('public')->delete($testimonial->img);
        $testimonial->delete();
        return redirect()->route('testimonial.index');
    }
}
