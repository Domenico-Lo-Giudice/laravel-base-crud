<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $data = $this->validation($request->all());
        
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
    public function edit(Track $track)
    {
        // dd($track);
        return view('tracks.edit', compact('track'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {

        $data = $this->validation($request->all(), $track->id);
        $track->update($data);
        return redirect()->route('tracks.show', $track);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $track->delete();
        return redirect()->route('tracks.index');
    }

    private function validation($data, $id = null) {
        $unique_title_validation =  ($id) ? "|unique:tracks,title, $id" : "|unique:tracks";
        $unique_album_validation =  ($id) ? "|unique:tracks,album, $id" : "|unique:tracks";

        $validator = Validator::make(
            $data,

            [
                'title' => "required|string" . $unique_title_validation,
                'album' => "required|string|" . $unique_album_validation,
                'author' => 'required|string|',
                'editor' => 'required|string|',
                'length' => 'required|string|',
                'poster' => 'nullable|string|'  
    
            ], [
    
                '*.required' => 'Il campo ":attribute" è obbligatorio',
                // 'album.required' => "L'album è obbligatorio"
            ]
        
        )->validate();

        return $validator;
        
    }
}
