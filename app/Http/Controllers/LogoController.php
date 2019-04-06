<?php

namespace App\Http\Controllers;

use App\Logo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! $request->hasFile('path')) return;
        $path = $request->file('path')->store('logos');

        $file = new Logo;
        $file->path = $path;

         Auth::user()->logo()->create($file->toArray());

         return redirect()->back();
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        $logo->delete();
        return redirect()->back();
    }
}
