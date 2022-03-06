<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\User;
use App\Models\Controller;
use App\Models\Restrict;
use App\Models\Certificate;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = controller::find(4);
        $participant= user::where('is_admin', '=', $data->nilai)->get();
        $participants = count($participant);
        $bayar = user::where([
            ['pembayaran','=' ,'Sudah Bayar'],
            ['is_admin', '=', $data->nilai]
            ])->orWhere([
                ['pembayaran','=' ,'Lolos'],
                ['is_admin', '=', $data->nilai]
                ])->get();
        $belum = user::where([
            ['pembayaran','=' ,'Belum Bayar'],
            ['is_admin', '=', $data->nilai]
            ])->count();
        $wait = user::where([
            ['pembayaran','=' ,'Menunggu Konfirmasi'],
            ['is_admin', '=', $data->nilai]
            ])->count();
            $olym = 0;
            $poster = 0;
            $essay = 0;
            foreach ($bayar as $s) {
                foreach ($s->participant as $p) {
                    if($p->cabang == "Olimpiade") {
                    $olym += 1;
                    } else if($p->cabang == "Poster") {
                    $poster += 1;
                    } else if($p->cabang == "Essay") {
                    $essay += 1;
                    }
                }
            }
        $bayar = $bayar->count();
          return view('admin.index', compact('participants', 'olym', 'essay', 'poster', 'bayar', 'belum', 'wait'));
    }
    public function tutorial()
    {
        return view('admin/tutorial');
    }

    public function controlView()
    {
        $data = controller::orderBy('type', 'asc')->get();
        return view('admin.controller.index', compact('data'));
    }
    
    public function controlEdit(request $request, $id)
    {
        $data = controller::find($id);
        if ($data->type == "bool") {
            if ($data->nilai == "Aktif") {
                controller::where('id', $id)
                    ->update([
                        'nilai' => "Tidak Aktif"
                    ]);
            }
            if ($data->nilai == "Tidak Aktif") {
                controller::where('id', $id)
                    ->update([
                        'nilai' => "Aktif"
                    ]);
            }
        }
        if ($data->type == "num") {
            if ($data->nilai == 3) {
                controller::where('id', $id)
                    ->update([
                        'nilai' => 2
                    ]);
            }
            if ($data->nilai == 2) {
                controller::where('id', $id)
                    ->update([
                        'nilai' => 3
                    ]);
            }
        }
        if ($data->type == "var") {
            $isi = $request->$id;
            controller::where('id', $id)
                ->update([
                    'nilai' => $isi
                ]);
        }
        return back();
    }
    
    public function generateCertif1() {
        $bayar = user::where([
            ['pembayaran','=' ,'Sudah Bayar'],
            ['is_admin', '=', '3']
            ])->get();
        $noSertif = controller::find(21)->nilai;
        $sertif = controller::find(20)->nilai;
        settype($noSertif, "int");
        if (certificate::where('type', 'pny')->get()->first() !== null) {
            certificate::where('type', 'pny')->delete();
        }
        foreach ($bayar as $s) {
            foreach ($s->participant as $p) {
                if(isset($p->nama1)) {
                    certificate::create([
                        'nama' => $p->nama1,
                        'nomor1' => $noSertif.$sertif,
                        'participant_id' => $p->id,
                        'user_id' => $p->user_id,
                        'type' => 'pny',
                    ]);
                    $noSertif += 1;
                }
                if(isset($p->nama2)) {
                    certificate::create([
                        'nama' => $p->nama2,
                        'nomor1' => $noSertif.$sertif,
                        'participant_id' => $p->id,
                        'user_id' => $p->user_id,
                        'type' => 'pny',
                    ]);
                    $noSertif += 1;
                }
                if(isset($p->nama3)) {
                    certificate::create([
                        'nama' => $p->nama3,
                        'nomor1' => $noSertif.$sertif,
                        'participant_id' => $p->id,
                        'user_id' => $p->user_id,
                        'type' => 'pny',
                    ]);
                    $noSertif += 1;
                }
            }
        }
        return back()->with('success', 'number of certificates has been added');
    }

    public function generateCertif2() {
        $bayar = user::where([
            ['pembayaran','=' ,'Lolos'],
            ['is_admin', '=', '3']
            ])->get();
        $noSertif = controller::find(21)->nilai;
        $sertif = controller::find(20)->nilai;
        settype($noSertif, "int");
        $data = [];
        if (certificate::where('type', 'smf')->get()->first() !== null) {
            certificate::where('type', 'smf')->delete();
        }
        foreach ($bayar as $s) {
            foreach ($s->participant as $p) {
                if(isset($p->nama1)) {
                    certificate::create([
                        'nama' => $p->nama1,
                        'nomor2' => $noSertif.$sertif,
                        'participant_id' => $p->id,
                        'user_id' => $p->user_id,
                        'type' => 'smf',
                    ]);
                    $noSertif += 1;
                }
                if(isset($p->nama2)) {
                    certificate::create([
                        'nama' => $p->nama2,
                        'nomor2' => $noSertif.$sertif,
                        'participant_id' => $p->id,
                        'user_id' => $p->user_id,
                        'type' => 'smf',
                    ]);
                    $noSertif += 1;
                }
                if(isset($p->nama3)) {
                    certificate::create([
                        'nama' => $p->nama3,
                        'nomor2' => $noSertif.$sertif,
                        'participant_id' => $p->id,
                        'user_id' => $p->user_id,
                        'type' => 'smf',
                    ]);
                    $noSertif += 1;
                }
            }
        }
        return back()->with('success', 'number of certificates has been added');
    }

    public function restrict()
    {
        $data = user::all();
        return view('admin.controller.batas', compact('data'));
    }
    public function reset($id)
    {
        restrict::where('id', $id)
            ->update([
                'jumlah' => 0,
            ]);
        return back();
    }
}
