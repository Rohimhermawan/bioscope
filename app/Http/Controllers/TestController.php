<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App;
use App\Models\exam;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexR($id)
    {
        $exams = exam::find($id);
        $userID = [];
         foreach($exams->answer as $a) {
             $userID[] = $a->user_id; 
         }
         $userID = array_unique($userID);
        $user = user::whereIn('id', $userID)->get();
        $kode = $id;
       return view('admin.ujian.data-hasil', compact('exams', 'user', 'kode'));
    }
    public function result()
    {
        $exams = exam::all();
        $user = user::where('pembayaran', 'Sudah Bayar')->get();
        return view('admin.ujian.hasil', compact('exams', 'user'));
    }
    public function index()
    {
        $exams = exam::all();
        return view('admin.ujian.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ujian.create');
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
            'nama' => 'required',
            'waktu' => 'required',
            'soal' => 'required',
            'peraturan' => 'required',
            'tanggal' => 'required',
        ]);
        exam::create($request->all());

    return redirect('test')->with('success','Test created successfully!');
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
        $data = exam::find($id);
        return view('admin.ujian.edit', compact('data'));
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
            'nama' => 'required',
            'waktu' => 'required',
            'soal' => 'required',
            'peraturan' => 'required',
            'tanggal' => 'required',
        ]);
        exam::where('id', $id)
            ->update([
                'nama' => $request->nama,
                'waktu' => $request->waktu,
                'soal' => $request->soal,
                'peraturan' => $request->peraturan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect('test')->with('update','test updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        exam::destroy($id);
        return redirect('test')->with('delete','test deleted successfully!');
    }

    public function active($id)
    {
        $cek = exam::find($id)->keterangan;
        if ($cek == 'Tidak Aktif') {
            exam::where('id', $id)
            ->update([
                'keterangan' => 'Aktif'
            ]);
        } else {
            exam::where('id', $id)
            ->update([
                'keterangan' => 'Tidak Aktif'
            ]);
        }

        return redirect('test');
    }

    public function print($id) 
    {
        $data = result::where('exam_id', $id)->get();
        $html = App::make('dompdf.wrapper');
        $html = PDF::loadView('admin.ujian.print-hasil', compact('data'))->setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $html->getDomPDF()->setHttpContext(
        stream_context_create([
            'ssl' => [
                'allow_self_signed'=> TRUE,
                'verify_peer' => FALSE,
                'verify_peer_name' => TRUE,
            ]
        ])
    );
        return $html->setPaper('a4')->stream();
    }
}
