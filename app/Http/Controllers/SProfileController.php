<?php

namespace App\Http\Controllers;

use App\sProfile;
use App\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->type === 'seeker') {
            $keywords = Keyword::all();
            return view('seeker.index', compact('user', 'keywords'));
        }

        abort(403, 'Unauthorized action.');

       
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

        
        $inputs = new sProfile($request->all());
        $inputs['user_id'] = Auth::user()->id;

        sProfile::updateOrCreate(
            ['user_id' => Auth::user()->business_id],
            $inputs->toArray()
        );
        
        return back();
    }

    public function keywords(Request $request)
    {
        $user = Auth::user();
        $user->keywords()->attach($request->keywords);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sProfile  $sProfile
     * @return \Illuminate\Http\Response
     */
    public function show(sProfile $sProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sProfile  $sProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(sProfile $sProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sProfile  $sProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sProfile $sProfile)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sProfile  $sProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(sProfile $sProfile)
    {
        //
    }
}
