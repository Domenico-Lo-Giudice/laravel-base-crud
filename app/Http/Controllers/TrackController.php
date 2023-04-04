<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Track;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('term')) {
            $term = $request->get('term');
            $tracks = Track::where('title', 'LIKE', "%$term%")->paginate()->withQueryString();
        } else {
            
            $tracks = Track::paginate(8);

        }
        return view('tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tracks.create');
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
            'title' => 'required|string|unique:tracks|',
            'album' => 'required|unique:tracks|',
            'author' => 'required|string|',
            'editor' => 'required|string|',
            'length' => 'required|string|',
            'poster' => 'nullable|string|'

        ], [

            '*.required' => 'Il campo ":attribute" è obbligatorio',
            // 'album.required' => "L'album è obbligatorio"
        ]);


        $data = $request->all();

        $track = new Track;

        // METODO 1
        // $track->title = $data["title"];
        // $track->album = $data["album"]; 
        // $track->author = $data["author"]; 
        // $track->editor = $data["editor"];
        // $track->length = $data["length"]; 
        // $track->poster = $data["poster"]; 

        // METODO 2
        $track->fill($data); 

        $track->save();

        return redirect()->route('tracks.show', $track);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        // $track = Track::find($id);
        return view('tracks.show', compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
