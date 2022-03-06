<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\participant;
use App\Models\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $DATA = controller::find(4)->nilai;
        $participants = [];
        $nomor = 0;
        $id = [];
        $pembayaran = [];
        $user = user::where([
            ['is_admin', '=', $DATA],
            ['pembayaran', '=', 'Sudah Bayar'],
            ])->orWhere([
                ['is_admin', '=', $DATA],
            ['pembayaran', '=', 'Lolos'],
            ])->get();
            foreach ($user as $s) {
                $id[] = $s->id;
                $pembayaran[$nomor] = $s->pembayaran;
                settype($pembayaran[$nomor], "string"); 
                $nomor++;
                $participants[] = $s->participant->first();
            }
            // dd($user, $participants);
            return view('admin.peserta.data-peserta', compact('participants', 'id', 'pembayaran'));
        }
        
        public function bayar()
        {
            $nomor = 0;
            $nomor = 0;
            $id = [];
            $pembayaran = [];
            $bayar = user::where([
                ['is_admin', '=', controller::find(4)->nilai]
                ])->get();
            foreach ($bayar as $s) {
                $id[] = $s->id;
                $pembayaran[$nomor] = $s->pembayaran;
                settype($pembayaran[$nomor], "string"); 
                $nomor++;
                $participants[] = $s->participant->first();
            }
            return view('admin.peserta.bayar-peserta', compact('bayar', 'id', 'pembayaran'));
        }
        
        public function pembayaran()
    {
        $user = user::find(auth::user()->id);
        $tanggal = controller::find(9)->nilai;
        return view('user.pembayaran', compact('user', 'tanggal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data(request $request, $id)
    {
        $participant = participant::find($id);
        $request->validate([
            'nama1' => 'required',
            'alamat1' => 'required',
            'kelas1' => 'required',
            'domisili1' => 'required',
            'telepon1' => 'numeric|required|digits_between:10,13',
            'telepon2' => 'numeric|digits_between:10,13|nullable',
            'telepon3' => 'numeric|digits_between:10,13|nullable',
            'line1' => 'required',
            'email1' => ['required','email',Rule::unique('participants')->ignore($id)],
            'email2' => [Rule::unique('participants')->ignore($id)->where('email2', '!=', null)],
            'email3' => [Rule::unique('participants')->ignore($id)->where('email3', '!=', null)],
            'foto1' => 'required|max:1024|mimes:png',
            'kartu1' => 'required|max:1024',
            'foto2' => 'max:1024|mimes:png',
            'kartu2' => 'max:1024',
            'foto3' => 'max:1024|mimes:png',
            'kartu3' => 'max:1024',
        ]);
            
        // gambar1
        $filenameWithExt1 = $request->file('foto1')->getClientOriginalName();
            //Get just filename
        $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
            // Get just ext
        $extension1 = $request->file('foto1')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore1 = $filename1.'_'.time().'.'.$extension1;
            // // Upload Image
        $path1 = $request->file('foto1')->storeAs('public/foto', $fileNameToStore1, 'local');

            
        $filenameWithExt2 = $request->file('kartu1')->getClientOriginalName();
            //Get just filename
        $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
        $extension2 = $request->file('kartu1')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore2 = $filename2.'_'.time().'.'.$extension2;
            // // Upload Image
        $path2 = $request->file('kartu1')->storeAs('public/kartu', $fileNameToStore2, 'local');
        
        if ($request->file('foto2')) {
        // gambar2
        $filenameWithExt3 = $request->file('foto2')->getClientOriginalName();
            //Get just filename
        $filename3 = pathinfo($filenameWithExt3, PATHINFO_FILENAME);
            // Get just ext
        $extension3 = $request->file('foto2')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore3 = $filename3.'_'.time().'.'.$extension3;
            // // Upload Image
        $path3 = $request->file('foto2')->storeAs('public/foto', $fileNameToStore3, 'local');

        $filenameWithExt4 = $request->file('kartu2')->getClientOriginalName();
            //Get just filename
        $filename4 = pathinfo($filenameWithExt4, PATHINFO_FILENAME);
            // Get just ext
        $extension4 = $request->file('kartu2')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore4 = $filename4.'_'.time().'.'.$extension4;
            // // Upload Image
        $path4 = $request->file('kartu2')->storeAs('public/kartu', $fileNameToStore4, 'local');
        }

        if ($request->file('foto3')) {
        // gambar3
        $filenameWithExt5 = $request->file('foto3')->getClientOriginalName();
            //Get just filename
        $filename5 = pathinfo($filenameWithExt5, PATHINFO_FILENAME);
            // Get just ext
        $extension5 = $request->file('foto3')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore5 = $filename5.'_'.time().'.'.$extension5;
            // // Upload Image
        $path5 = $request->file('foto3')->storeAs('public/foto', $fileNameToStore5, 'local');

        $filenameWithExt6 = $request->file('kartu3')->getClientOriginalName();
            //Get just filename
        $filename6 = pathinfo($filenameWithExt6, PATHINFO_FILENAME);
            // Get just ext
        $extension6 = $request->file('kartu3')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore6 = $filename6.'_'.time().'.'.$extension6;
            // // Upload Image
        $path6 = $request->file('kartu3')->storeAs('public/kartu', $fileNameToStore6, 'local');
        }

        $fileNameToStore1 = isset($fileNameToStore1) ? $fileNameToStore1 : ''; //add a default value here
        $fileNameToStore2 = isset($fileNameToStore2) ? $fileNameToStore2 : ''; //add a default value here
        $fileNameToStore3 = isset($fileNameToStore3) ? $fileNameToStore3 : ''; //add a default value here
        $fileNameToStore4 = isset($fileNameToStore4) ? $fileNameToStore4 : ''; //add a default value here
        $fileNameToStore5 = isset($fileNameToStore5) ? $fileNameToStore5 : ''; //add a default value here
        $fileNameToStore6 = isset($fileNameToStore6) ? $fileNameToStore6 : ''; //add a default value here

        participant::where('id', $id)
        ->update([
            'nama1' => $request->nama1,
            'alamat1' => $request->alamat1,
            'kelas1' => $request->kelas1,
            'telepon1' => $request->telepon1,
            'line1' => $request->line1,
            'email1' => $request->email1,
            'foto1' => $fileNameToStore1,
            'kartu1' => $fileNameToStore2,
            'nama2' => $request->nama2,
            'alamat2' => $request->alamat2,
            'kelas2' => $request->kelas2,
            'telepon2' => $request->telepon2,
            'line2' => $request->line2,
            'email2' => $request->email2,
            'foto2' => $fileNameToStore3,
            'kartu2' => $fileNameToStore4,
            'nama3' => $request->nama3,
            'alamat3' => $request->alamat3,
            'kelas3' => $request->kelas3,
            'telepon3' => $request->telepon3,
            'line3' => $request->line3,
            'email3' => $request->email3,
            'foto3' => $fileNameToStore5,
            'kartu3' => $fileNameToStore6,
            'domisili1' => $request->domisili1,
            'domisili2' => $request->domisili2,
            'domisili3' => $request->domisili3,
            ]);

        $user = user::find(auth::user()->id)->participant[0];
        return view('user.biodata', compact('user'));

    }

    public function bukti()
    {
        $user = user::where('pembayaran', 'Menunggu Konfirmasi')->get();
        return view('admin.peserta.bukti', compact('user'));
    }
    /**
     * Show the form for creating a new resource0
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
    public function store(Request $request, $participant)
    {
        $request->validate([
            'sekolah' => 'required',
            'email1' => 'required|email',
            'pengirim' => 'required',
            'penerima' => 'required',
            'cabang' => 'required'
        ]);
        participant::create([
                        'nama1' => auth::user()->name,
                        'sekolah' => $request->sekolah,
                        'email1' => $request->email1,
                       'user_id' => $participant,
                       'cabang' => $request->cabang,
                       'pembimbing' => $request->pembimbing,
                       'pengirim' => $request->pengirim,
                       'penerima' => $request->penerima
                   ]);
            return redirect('home/pembayaran');
    }
    
    public function uploadBukti(Request $request, $id)
    {
        $request->validate([
            'bukti' => 'required|max:1024'
        ]);
        $todayDate = Carbon::now()->format('d-m-Y');
        $filenameWithExt = $request->file('bukti')->getClientOriginalName();
            // Get just ext
        $extension = $request->file('bukti')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore = time().'.'.$extension;
            // // Upload Image
        $path = $request->file('bukti')->storeAs('public/pembayaran/'.$todayDate, $fileNameToStore, 'local');

        participant::where('user_id', $id)->update([
            'bukti' => $fileNameToStore,
            ]);
        user::where('id', $id)->update([
            'pembayaran' => 'Menunggu konfirmasi'
        ]);
            return redirect('home/pembayaran');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participant = participant::find($id);
        // dd($participant);
        return view('user.editbiodata', compact('participant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request, $id)
    {
        $participant = participant::find($id);
        $request->validate([
            'nama1' => 'required',
            'alamat1' => 'required',
            'kelas1' => 'required',
            'domisili1' => 'required',
            'telepon1' => 'numeric|required|digits_between:10,13',
            'telepon2' => 'numeric|digits_between:10,13|nullable',
            'telepon3' => 'numeric|digits_between:10,13|nullable',
            'line1' => 'required',
            'email1' => ['required','email',Rule::unique('participants')->ignore($id)],
            'email2' => [Rule::unique('participants')->ignore($id)->where('email2', '!=', null)],
            'email3' => [Rule::unique('participants')->ignore($id)->where('email3', '!=', null)],
            'foto1' => 'max:1024|mimes:png',
            'kartu1' => 'max:1024',
            'foto2' => 'max:1024|mimes:png',
            'kartu2' => 'max:1024',
            'foto3' => 'max:1024|mimes:png',
            'kartu3' => 'max:1024',
        ]);
        if ($request->file('foto1')) {
            
        // gambar1
        $filenameWithExt1 = $request->file('foto1')->getClientOriginalName();
            //Get just filename
        $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
            // Get just ext
        $extension1 = $request->file('foto1')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore1 = $filename1.'_'.time().'.'.$extension1;
            // // Upload Image
        $path1 = $request->file('foto1')->storeAs('public/foto', $fileNameToStore1, 'local');
        }

        if ($request->file('kartu1')) {
            
        $filenameWithExt2 = $request->file('kartu1')->getClientOriginalName();
            //Get just filename
        $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
        $extension2 = $request->file('kartu1')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore2 = $filename2.'_'.time().'.'.$extension2;
            // // Upload Image
        $path2 = $request->file('kartu1')->storeAs('public/kartu', $fileNameToStore2, 'local');
        
        }
        if ($request->file('foto2')) {
        // gambar2
        $filenameWithExt3 = $request->file('foto2')->getClientOriginalName();
            //Get just filename
        $filename3 = pathinfo($filenameWithExt3, PATHINFO_FILENAME);
            // Get just ext
        $extension3 = $request->file('foto2')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore3 = $filename3.'_'.time().'.'.$extension3;
            // // Upload Image
        $path3 = $request->file('foto2')->storeAs('public/foto', $fileNameToStore3, 'local');

        $filenameWithExt4 = $request->file('kartu2')->getClientOriginalName();
            //Get just filename
        $filename4 = pathinfo($filenameWithExt4, PATHINFO_FILENAME);
            // Get just ext
        $extension4 = $request->file('kartu2')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore4 = $filename4.'_'.time().'.'.$extension4;
            // // Upload Image
        $path4 = $request->file('kartu2')->storeAs('public/kartu', $fileNameToStore4, 'local');
        }

        if ($request->file('foto3')) {
        // gambar3
        $filenameWithExt5 = $request->file('foto3')->getClientOriginalName();
            //Get just filename
        $filename5 = pathinfo($filenameWithExt5, PATHINFO_FILENAME);
            // Get just ext
        $extension5 = $request->file('foto3')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore5 = $filename5.'_'.time().'.'.$extension5;
            // // Upload Image
        $path5 = $request->file('foto3')->storeAs('public/foto', $fileNameToStore5, 'local');

        $filenameWithExt6 = $request->file('kartu3')->getClientOriginalName();
            //Get just filename
        $filename6 = pathinfo($filenameWithExt6, PATHINFO_FILENAME);
            // Get just ext
        $extension6 = $request->file('kartu3')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore6 = $filename6.'_'.time().'.'.$extension6;
            // // Upload Image
        $path6 = $request->file('kartu3')->storeAs('public/kartu', $fileNameToStore6, 'local');
        }

        $fileNameToStore1 = isset($fileNameToStore1) ? $fileNameToStore1 : $participant->foto1; //add a default value here
        $fileNameToStore2 = isset($fileNameToStore2) ? $fileNameToStore2 : $participant->kartu1; //add a default value here
        $fileNameToStore3 = isset($fileNameToStore3) ? $fileNameToStore3 : $participant->foto2; //add a default value here
        $fileNameToStore4 = isset($fileNameToStore4) ? $fileNameToStore4 : $participant->kartu2; //add a default value here
        $fileNameToStore5 = isset($fileNameToStore5) ? $fileNameToStore5 : $participant->foto3; //add a default value here
        $fileNameToStore6 = isset($fileNameToStore6) ? $fileNameToStore6 : $participant->kartu3; //add a default value here

        participant::where('id', $id)
        ->update([
            'nama1' => $request->nama1,
            'alamat1' => $request->alamat1,
            'kelas1' => $request->kelas1,
            'telepon1' => $request->telepon1,
            'line1' => $request->line1,
            'email1' => $request->email1,
            'foto1' => $fileNameToStore1,
            'kartu1' => $fileNameToStore2,
            'nama2' => $request->nama2,
            'alamat2' => $request->alamat2,
            'kelas2' => $request->kelas2,
            'telepon2' => $request->telepon2,
            'line2' => $request->line2,
            'email2' => $request->email2,
            'foto2' => $fileNameToStore3,
            'kartu2' => $fileNameToStore4,
            'nama3' => $request->nama3,
            'alamat3' => $request->alamat3,
            'kelas3' => $request->kelas3,
            'telepon3' => $request->telepon3,
            'line3' => $request->line3,
            'email3' => $request->email3,
            'foto3' => $fileNameToStore5,
            'kartu3' => $fileNameToStore6,
            'domisili1' => $request->domisili1,
            'domisili2' => $request->domisili2,
            'domisili3' => $request->domisili3,
            ]);

        $user = user::find(auth::user()->id)->participant[0];
        return view('user.biodata', compact('user'));

    }
}
