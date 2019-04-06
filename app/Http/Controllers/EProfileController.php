<?php

namespace App\Http\Controllers;

use App\eProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->type === 'provider') {
            return view('employer.index', compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\eProfile  $eProfile
     * @return \Illuminate\Http\Response
     */
    public function show(eProfile $eProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\eProfile  $eProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(eProfile $eProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\eProfile  $eProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, eProfile $eProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\eProfile  $eProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(eProfile $eProfile)
    {
        //
    }
}
