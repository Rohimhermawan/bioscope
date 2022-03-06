<?php

namespace App\Http\Controllers;

use App\Models\participant;
use App\Models\Poster;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexP(request $request)
    {
        $data = poster::all();
        $id = [];
        foreach ($data as $e) {
            $id[] = $e->id; 
        }
        return view('voting', compact('data', 'id'));
    }
    
    public function indexA()
    {
        
        $data = poster::all();
        return view('admin.poster.index', compact('data'));
    }

    public function indexB()
    {
        $data = poster::all();
        $x = 0;
        $id = [];
        $pembayaran = [];
        foreach ($data as $e) {
            $id[] = $e->id;
            $pembayaran[$x] = $e->user->pembayaran;
            settype($pembayaran[$x], "string"); 
            $x++;
        }
        return view('admin.poster.data-hasil', compact('data', 'id', 'pembayaran'));
    }
    public function indexC()
    {
        return view('voting');
    }
    public function voting(request $request, $id, $userId) {
        $data = poster::find($id);
        if($request->cookie($id) == 'sudah') {
            $likes = $data->likes - 1;
            Cookie::queue(cookie::make($id, 'cancel', 60*24*14));
            poster::where('id', $id)
                ->update([
                    'likes' => $likes,
                ]);
            return redirect('vote-poster')->with('success', 'Jumlah likes'. $data->user->name .' sudah berkurang.');
        } else {
            $likes = $data->likes + 1;
            Cookie::queue(cookie::make($id, 'sudah', 30));
            poster::where('id', $id)
                ->update([
                    'likes' => $likes,
                ]);
            return redirect('vote-poster')->with('success', 'Jumlah likes '. $data->user->name .' sudah bertambah. Yuk ajak yang lainnya untuk vote');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id[] = poster::get('user_id');
        $data = participant::where([
            ['cabang', '=', 'poster'],
            ['user_id', '!=', $id]
        ])->get();
        return view('admin.poster.create', compact('data'));
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
            'user_id' => 'required|numeric',
            'poster' => 'required|max:1000',
        ]);
         $fileNameToStore = null;
        if ($request->file('poster')) {
            
            $filenameWithExt = $request->file('poster')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('poster')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // // Upload Image
            $path = $request->file('poster')->storeAs('public/poster', $fileNameToStore, 'local');
        }
        $fileNameToStore = isset($fileNameToStore) ? $fileNameToStore : ''; //add a default value here

        poster::create([
            'user_id' => $request->user_id,
            'poster' => $fileNameToStore,
        ]);

    return redirect('poster')->with('success','Poster created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = poster::find($id);
        return view('admin.poster.edit', compact('data'));
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
        $request->validate([
            'poster' => 'max:1000',
        ]);
         $fileNameToStore = null;
        if ($request->file('poster')) {
            
            $filenameWithExt = $request->file('poster')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('poster')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // // Upload Image
            $path = $request->file('poster')->storeAs('public/poster', $fileNameToStore, 'local');
        }
        $fileNameToStore = isset($fileNameToStore) ? $fileNameToStore : $request->riwayat; //add a default value here

        poster::where('id', $id)
            ->update([
                'poster' => $fileNameToStore,
            ]);

    return redirect('poster')->with('success','Poster updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        poster::destroy($id);
        return back()->with('delete','Poster deleted successfully!');
    }
}
