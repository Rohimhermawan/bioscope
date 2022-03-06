<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use App;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::find(auth::user()->id);
        return view('user.home', compact('user'));
    }

    public function index2()
    {
        $user = user::find(auth::user()->id)->participant[0];
        return view('user.biodata', compact('user'));
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

        return back();
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
    public function store(Request $request)
    {
        //
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        participant::where('id', $id)->delete();
        user::where('id', $id)->update([
            'pembayaran' => 'Belum Bayar'
        ]);
        return back()->with('delete','data deleted successfully!');
    }
}
