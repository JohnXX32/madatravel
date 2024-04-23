<?php

namespace App\Http\Controllers;

use App\Models\flag;
use Illuminate\Http\Request;
use App\Models\Region;

class CRegion extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $query = Region::query();
        $region = $query->paginate(5);
        $region->appends(request()->query());
        return view('admins/region',['data0'=>$region]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "nom"=>"required",
            "image"=>"required",
        ]);
        $imgname='default.jpg';
        if (null !== $request->file('image')) {
            $imgname = $request->file('image')->getClientOriginalName();
        }
        $region = new Region;
        $region->nom_region = $request->input("nom");
        $region->image = $imgname;
        $region->save();
        return redirect("/Region");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\flag  $flag
     * @return \Illuminate\Http\Response
     */
    public function show(flag $flag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\flag  $flag
     * @return \Illuminate\Http\Response
     */
    public function edit(flag $flag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\flag  $flag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, flag $flag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\flag  $flag
     * @return \Illuminate\Http\Response
     */
    public function destroy(flag $flag)
    {
        //
    }
}
