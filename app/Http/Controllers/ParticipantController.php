<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\participant;
use App\Models\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    public function index()
    {
    $bayar['bayar'] = [controller::find(8)->nilai];
    $users = user::filter($bayar)->with('participant')->get();
        return view('admin.peserta.data-peserta', compact('users'));
    }
        
    public function bayar()
    {
        $bayar = user::where([
            ['is_admin', '=', controller::find(8)->nilai]
            ])->get();
        return view('admin.peserta.bayar-peserta', compact('bayar'));
    }
        
    public function pembayaran()
    {
        $user = user::where('id', auth::user()->id)->with('restrict', 'participant')->first();
        $tanggal = controller::find(9)->nilai;
        $batas = controller::find(15)->nilai;
        return view('user.pembayaran', compact('user', 'tanggal', 'batas'));
    }

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
        $filename1 = $request->nama1;
            // Get just ext
        $extension1 = $request->file('foto1')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore1 = $filename1.'_'.time().'.'.$extension1;
            // // Upload Image
        $path1 = $request->file('foto1')->storeAs('public/identitas/foto', $fileNameToStore1, 'local');

            
        $filenameWithExt2 = $request->file('kartu1')->getClientOriginalName();
            //Get just filename
        $filename2 = $request->nama1;
            // Get just ext
        $extension2 = $request->file('kartu1')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore2 = $filename2.'_'.time().'.'.$extension2;
            // // Upload Image
        $path2 = $request->file('kartu1')->storeAs('public/identitas/kartu', $fileNameToStore2, 'local');
        
        if ($request->file('foto2')) {
        // gambar2
        $filenameWithExt3 = $request->file('foto2')->getClientOriginalName();
            //Get just filename
        $filename3 = $request->nama2;
            // Get just ext
        $extension3 = $request->file('foto2')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore3 = $filename3.'_'.time().'.'.$extension3;
            // // Upload Image
        $path3 = $request->file('foto2')->storeAs('public/identitas/foto', $fileNameToStore3, 'local');

        $filenameWithExt4 = $request->file('kartu2')->getClientOriginalName();
            //Get just filename
        $filename4 = $request->nama2;
            // Get just ext
        $extension4 = $request->file('kartu2')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore4 = $filename4.'_'.time().'.'.$extension4;
            // // Upload Image
        $path4 = $request->file('kartu2')->storeAs('public/identitas/kartu', $fileNameToStore4, 'local');
        }

        if ($request->file('foto3')) {
        // gambar3
        $filenameWithExt5 = $request->file('foto3')->getClientOriginalName();
            //Get just filename
        $filename5 = $request->nama3;
            // Get just ext
        $extension5 = $request->file('foto3')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore5 = $filename5.'_'.time().'.'.$extension5;
            // // Upload Image
        $path5 = $request->file('foto3')->storeAs('public/identitas/foto', $fileNameToStore5, 'local');

        $filenameWithExt6 = $request->file('kartu3')->getClientOriginalName();
            //Get just filename
        $filename6 = $request->nama3;
            // Get just ext
        $extension6 = $request->file('kartu3')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore6 = $filename6.'_'.time().'.'.$extension6;
            // // Upload Image
        $path6 = $request->file('kartu3')->storeAs('public/identitas/kartu', $fileNameToStore6, 'local');
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
        return redirect('home/identitas-peserta');

    }

    public function bukti()
    {
        $user = user::where('pembayaran', 'Menunggu Konfirmasi')->with('participant')->get();
        return view('admin.peserta.bukti', compact('user'));
    }
 
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

    public function show(Participant $id)
    {
        $participant = $id;
        return view('user.editbiodata', compact('participant'));
    }

    public function edit(request $request, Participant $id)
    {
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
        storage::disk('public')->delete('identitas/foto/'.$id->foto1);    
        // gambar1
        $filenameWithExt1 = $request->file('foto1')->getClientOriginalName();
            //Get just filename
        $filename1 = $request->nama1;
            // Get just ext
        $extension1 = $request->file('foto1')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore1 = $filename1.'_'.time().'.'.$extension1;
            // // Upload Image
        $path1 = $request->file('foto1')->storeAs('public/identitas/foto', $fileNameToStore1, 'local');
        }

        if ($request->file('kartu1')) {
        storage::disk('public')->delete('identitas/kartu/'.$id->kartu1);    
        $filenameWithExt2 = $request->file('kartu1')->getClientOriginalName();
            //Get just filename
        $filename2 = $request->nama1;
            // Get just ext
        $extension2 = $request->file('kartu1')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore2 = $filename2.'_'.time().'.'.$extension2;
            // // Upload Image
        $path2 = $request->file('kartu1')->storeAs('public/identitas/kartu', $fileNameToStore2, 'local');
        
        }
        if ($request->file('foto2')) {
        storage::disk('public')->delete('identitas/foto/'.$id->foto2);
        // gambar2
        $filenameWithExt3 = $request->file('foto2')->getClientOriginalName();
            //Get just filename
        $filename3 = $request->nama2;
            // Get just ext
        $extension3 = $request->file('foto2')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore3 = $filename3.'_'.time().'.'.$extension3;
            // // Upload Image
        $path3 = $request->file('foto2')->storeAs('public/identitas/foto', $fileNameToStore3, 'local');
        }

        if ($request->file('kartu2')) {
        storage::disk('public')->delete('identitas/kartu/'.$id->kartu2);
        $filenameWithExt4 = $request->file('kartu2')->getClientOriginalName();
            //Get just filename
        $filename4 = $request->nama2;
            // Get just ext
        $extension4 = $request->file('kartu2')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore4 = $filename4.'_'.time().'.'.$extension4;
            // // Upload Image
        $path4 = $request->file('kartu2')->storeAs('public/identitas/kartu', $fileNameToStore4, 'local');
        }

        if ($request->file('foto3')) {
        storage::disk('public')->delete('identitas/foto/'.$id->foto3);
        // gambar3
        $filenameWithExt5 = $request->file('foto3')->getClientOriginalName();
            //Get just filename
        $filename5 = $request->nama3;
            // Get just ext
        $extension5 = $request->file('foto3')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore5 = $filename5.'_'.time().'.'.$extension5;
            // // Upload Image
        $path5 = $request->file('foto3')->storeAs('public/identitas/foto', $fileNameToStore5, 'local');
        }

        if ($request->file('kartu3')) {
        storage::disk('public')->delete('identitas/kartu/'.$id->kartu3);
        $filenameWithExt6 = $request->file('kartu3')->getClientOriginalName();
            //Get just filename
        $filename6 = $request->nama3;
            // Get just ext
        $extension6 = $request->file('kartu3')->getClientOriginalExtension();
            // Filename to store
        $fileNameToStore6 = $filename6.'_'.time().'.'.$extension6;
            // // Upload Image
        $path6 = $request->file('kartu3')->storeAs('public/identitas/kartu', $fileNameToStore6, 'local');
        }

        $fileNameToStore1 = isset($fileNameToStore1) ? $fileNameToStore1 : $id->foto1; //add a default value here
        $fileNameToStore2 = isset($fileNameToStore2) ? $fileNameToStore2 : $id->kartu1; //add a default value here
        $fileNameToStore3 = isset($fileNameToStore3) ? $fileNameToStore3 : $id->foto2; //add a default value here
        $fileNameToStore4 = isset($fileNameToStore4) ? $fileNameToStore4 : $id->kartu2; //add a default value here
        $fileNameToStore5 = isset($fileNameToStore5) ? $fileNameToStore5 : $id->foto3; //add a default value here
        $fileNameToStore6 = isset($fileNameToStore6) ? $fileNameToStore6 : $id->kartu3; //add a default value here

        participant::where('id', $id->id)
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

        return redirect('home/identitas-peserta');

    }

    public function fetch()
    {
        $bayar['bayar'] = [controller::find(8)->nilai];
        $users = user::filter($bayar)->get();
        return response()->json($users);
    }

}
