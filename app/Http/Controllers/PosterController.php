<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Poster;
use App\Models\User;
use App\Models\Trace;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // dd($data);
        if($request->cookie($id) == 'sudah') {
            $likes = $data->likes - 1;
            Cookie::queue(cookie::make($id, 'cancel', 60*24*14));
            poster::where('id', $id)
                ->update([
                    'likes' => $likes,
                ]);
            trace::create([
                'nama' => $_COOKIE['username'],
                'poster_id' => $id,                 
                'email' => $_COOKIE['email'],                
                'action' => 'Unvote',                
                'device' => $request->header('User-Agent')                
            ]);
            return redirect('vote-poster')->with('success', 'Jumlah likes '. $data->user->name .' sudah berkurang.');
        } else {
            $likes = $data->likes + 1;
            Cookie::queue(cookie::make($id, 'sudah', 60*24*14));
            poster::where('id', $id)
            ->update([
                'likes' => $likes,
            ]);
            trace::create([
                'nama' => $_COOKIE['username'],
                'poster_id' => $id,                 
                'email' => $_COOKIE['email'],                
                'action' => 'Vote',                
                'device' => $request->header('User-Agent')                
            ]);
            return redirect('vote-poster')->with('success', 'Jumlah likes '. $data->user->name .' sudah bertambah. Yuk ajak yang lainnya untuk vote');
        }
    }

    public function create()
    {
        $id[] = poster::get('user_id');
        $data = participant::where([
            ['cabang', '=', 'poster'],
            ['user_id', '!=', $id]
        ])->get();
        return view('admin.poster.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'poster' => 'required|image|max:1000',
        ]);
         $fileNameToStore = null;
            
            $filenameWithExt = $request->file('poster')->getClientOriginalName();
            // Get just ext
            $extension = $request->file('poster')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $request->namaUser.'_'.time().'.'.$extension;
            // // Upload Image
            $path = $request->file('poster')->storeAs('public/poster', $fileNameToStore, 'local');

        poster::create([
            'user_id' => $request->user_id,
            'poster' => $fileNameToStore,
        ]);

    return redirect('poster')->with('success','Poster created successfully!');
    }

    public function show($id)
    {
        $data = poster::where('id', $id)->with('trace', 'user')->first();
        return view('admin.poster.trace', compact('data'));
    }

    public function edit($id)
    {
        $data = poster::find($id);
        return view('admin.poster.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'poster' => 'required|image|max:1000',
        ]);
         $fileNameToStore = null;
            storage::disk('public')->delete('poster/'.$request->riwayat);
            $filenameWithExt = $request->file('poster')->getClientOriginalName();
            // Get just ext
            $extension = $request->file('poster')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $request->namaUser.'_'.time().'.'.$extension;
            // // Upload Image
            $path = $request->file('poster')->storeAs('public/poster', $fileNameToStore, 'local');
        poster::where('id', $id)
            ->update([
                'poster' => $fileNameToStore,
            ]);

    return redirect('poster')->with('success','Poster updated successfully!');
    }

    public function destroy(Poster $id)
    {
        storage::disk('public')->delete('poster/'.$id->poster);
        poster::destroy($id->id);
        return back()->with('delete','Poster deleted successfully!');
    }

    public function fetch(User $id)
    {
        $nama = $id->name;
        return response()->json($nama);
    }
}
