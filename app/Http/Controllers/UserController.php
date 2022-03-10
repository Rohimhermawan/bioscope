<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use App;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = user::where('id', auth::user()->id)->with('participant')->get();
        return view('user.home', compact('user'));
    }

    public function index2()
    {
        $participant = user::where('id', auth::user()->id)->first()->participant;
        return view('user.biodata', compact('participant'));
    }

    public function confirm($id)
    {
        $cek = user::find($id)->pembayaran;
        if ($cek == 'Belum Bayar') {
            user::where('id', $id)
            ->update([
                'pembayaran' => 'Sudah Bayar'
            ]);
        } else if($cek == 'Menunggu konfirmasi') {
            user::where('id', $id)
            ->update([
                'pembayaran' => 'Sudah Bayar'
            ]);
        } else {
            user::where('id', $id)
            ->update([
                'pembayaran' => 'Belum Bayar'
            ]);
        }

        return back()->with('success', 'Data has been updated successfully');
    }

    public function pass($id) {
        $cek = user::find($id)->pembayaran;
        if ($cek == 'Sudah Bayar') {
            user::where('id', $id)
            ->update([
                'pembayaran' => 'Lolos'
            ]);
        } else if($cek == 'Lolos') {
            user::where('id', $id)
            ->update([
                'pembayaran' => 'Sudah Bayar'
            ]);
        }
        return back();
    }

    public function printCard($id)
    {
        $data = participant::find($id);
        $html = App::make('dompdf.wrapper');
        $html = PDF::loadView('template', compact('data'))->setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $contxt = stream_context_create([
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'GET',
        'user_agent' => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)',
    ],
    'ssl' => [ 
        'verify_peer' => FALSE, 
        'verify_peer_name' => FALSE,
        'allow_self_signed'=> TRUE,
    ] 
]);
        $html->getDomPDF()->setHttpContext(
        stream_context_create([
            'ssl' => [
                'allow_self_signed'=> TRUE,
                'verify_peer' => FALSE,
                'verify_peer_name' => TRUE,
            ]
        ])
    );
        return $html->setPaper('a5')->stream();
    }

    public function printCertificate($id)
    {
        $data = user::where('name', $id)->with('participant')->first();
        $html = App::make('dompdf.wrapper');
        $html = PDF::loadView('user/sertif', compact('data'))->setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $contxt = stream_context_create([
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'GET',
        'user_agent' => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)',
    ],
    'ssl' => [ 
        'verify_peer' => FALSE, 
        'verify_peer_name' => FALSE,
        'allow_self_signed'=> TRUE,
    ] 
]);
        $html->getDomPDF()->setHttpContext(
        stream_context_create([
            'ssl' => [
                'allow_self_signed'=> TRUE,
                'verify_peer' => FALSE,
                'verify_peer_name' => TRUE,
            ]
        ])
    );
        return $html->setPaper('a4', 'landscape')->stream();
    }

    public function destroy($id)
    {   
        $participant = participant::where('user_id', $id)->first();
        storage::disk('public')->delete('pembayaran/'.$participant->updated_at->format('d-m-Y'). '/' . $participant->bukti);
        user::where('id', $id)->update([
            'pembayaran' => 'Belum Bayar'
        ]);
        return back()->with('delete','data rejected successfully!');
    }
}
