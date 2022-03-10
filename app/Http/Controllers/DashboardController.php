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
        $data = controller::find(8);
        $participant= user::where('is_admin', '=', $data->nilai)->get();
        $participants = count($participant);
        $bayar = user::where([
            ['pembayaran','=' ,'Sudah Bayar'],
            ['is_admin', '=', $data->nilai]
            ])->orWhere([
                ['pembayaran','=' ,'Lolos'],
                ['is_admin', '=', $data->nilai]
                ])->with('participant')->get();
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
                if($s->participant->cabang == "Olimpiade") {
                $olym += 1;
                } else if($s->participant->cabang == "Poster") {
                $poster += 1;
                } else if($s->participant->cabang == "Essay") {
                $essay += 1;
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
        if ($data->type == "Bool") {
            if ($data->nilai == "Aktif") {
                controller::where('id', $id)
                    ->update([
                        'nilai' => "Tidak Aktif"
                    ]);
            }
            else if ($data->nilai == "Tidak Aktif") {
                    controller::where('id', $id)
                        ->update([
                            'nilai' => "Aktif"
                        ]);
                }
            }
        else if ($data->type == "Int") {
            if ($data->nilai == 3) {
                controller::where('id', $id)
                    ->update([
                        'nilai' => 2
                    ]);
            }
            else if ($data->nilai == 2) {
                controller::where('id', $id)
                    ->update([
                        'nilai' => 3
                    ]);
            }
        }
        else if ($data->type == "Var") {
            $isi = $request->$id;
            controller::where('id', $id)
                ->update([
                    'nilai' => $isi
                ]);
        }
        else if ($data->type == "Text") {
            $isi = $request->$id;
            controller::where('id', $id)
                ->update([
                    'nilai' => $isi
                ]);
        }
        return back()->with('success', $data->Nama . ' berhasil diubah');
    }
    
    public function generateCertif1() 
    {
        $data = controller::find(4);
        $bayar = user::where([
            ['pembayaran','=' ,'Sudah Bayar'],
            ['is_admin', '=', $data->nilai]
            ])->with('participants')->get();
        $noSertif = controller::find(11)->nilai;
        $sertif = controller::find(12)->nilai;
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
        controller::where('id', 13)->update(['nilai' => $noSertif]);
        return back()->with('success', 'number of certificates has been added');
    }

    public function generateCertif2() 
    {
        $data = controller::find(4);
        $bayar = user::where([
            ['pembayaran','=' ,'Lolos'],
            ['is_admin', '=', $data->nilai]
            ])->with('participants')->get();
        $noSertif = controller::find(13)->nilai;
        $sertif = controller::find(12)->nilai;
        settype($noSertif, "int");
        $certificate = certificate::where('type', 'smf')->get();
        if ($certificate->first() !== null) {
            foreach ($certificate as $c ) {
                certificate::where('id', $c->id)->delete();
            }
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
        controller::where('id', 14)->update(['nilai' => $noSertif-1]);
        return back()->with('success', 'number of certificates has been added');
    }

    public function restrict()
    {
        $data = user::with('restrict')->get();
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
