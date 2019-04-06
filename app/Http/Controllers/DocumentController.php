<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'path' => 'required|mimes:doc,docx,',
        ]);

        $name = Str::slug($request->user()->name , '-');

        $path = $request->file('path')->storeAs(
            'resume', $name . '.docx' );

        $file = new Document;
        $file->path = $path;

         Auth::user()->document()->create($file->toArray());

         return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $resume)
    {


        $resume->delete();
        return redirect()->back();
    }

    public function download(Document $document)
    {
        return Storage::download($document->path );

    }
}
