<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tracks =Track::all();
        return view('tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        //
        $request->validate([
            'name' => 'required|unique:tracks',
            "image"=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image_path=null;
        if($request->hasfile('image')){
            $image = $request->file('image');
            $image_path = $image->store('images', 'tracks_images');
//            $image_path = $image->store('image', 'tracks');
        }
        $request_data = $request->all();
        $request_data['image'] = $image_path;

        $track = Track::create($request_data);
        return to_route('tracks.index')->with('success', 'Track created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
        return view("tracks.show", compact("track"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        //
    }
}
