<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\requests;
use Illuminate\Http\Request;
use Illuminate\Http\response;
use Illuminate\Support\Facades\Auth;
use App\Models\exam;
use App\Models\question;
use App\Models\Answer;
use App\Models\Result;
use App\Models\Quiziz;
use App\Models\Quiziz1;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = exam::where('keterangan', 'Aktif')->get();
        $user = auth::user();
        // dd($user->answer);
        $exam = answer::where('user_id', $user->id)->get();
        return view('user.test', compact('test', 'user', 'exam'));
    }

    /**
     * Show the form for creating a new resource.
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
    public function store(Request $request, $id)
    {
        $ujian = exam::find($id);
        $user = auth::user();
        $soal = question::where('exam_id', $id)->inRandomOrder($user->id)->get();
        for ($i = 1; $i <= count($soal); $i++) {
            $userid = $_COOKIE['userid'.$i]??$user->id;
            $examid = $_COOKIE['examid'.$i]??$soal[$i-1]->exam_id;
            $questionid = $_COOKIE['questionid'.$i]??$soal[$i-1]->id;
            $jawaban = $_COOKIE['jawaban'.$i]??null;
            $data = [
            'userid' => $userid,
            'examid' => $examid,
            'questionid' => $questionid,
            'jawaban' => $jawaban,
            ];
        session([
            'nomor'.$i => $data
            ]);  
        }
        // take request
         $data = session()->all();
         for ($i = 1; $i <= count($soal); $i++) {
          $user_id[] = $data['nomor'.$i]['userid'];
          $exam_id[] = $data['nomor'.$i]['examid'];
          $question_id[] = $data['nomor'.$i]['questionid'];
          $pilihan[] = $data['nomor'.$i]['jawaban'];
         }
        // take key

          for ($i = 0; $i < count($soal); $i++ ) {
            $kunjaw[] = strtoupper($soal[$i]->kunjaw);
         }

         for ($i = 0; $i < count($soal) ; $i++) {
             if ($kunjaw[$i] == $pilihan[$i]) {
                 $hasil[$i] = 'Benar';
             } elseif ($pilihan[$i] == null) {
                 $hasil[$i] = 'Kosong';
             } else {
                 $hasil[$i] = 'Salah';
             }
         }
        //  conclusion
         $nilai = array_count_values($hasil);
         $benar = $nilai['Benar']??0;
         $salah = $nilai['Salah']??0;
         $kosong = $nilai['Kosong']??0;
          //insert using foreach loop
          for ($i = 0; $i < count($soal); $i++ ) {
            $scores = new Answer();
            $scores->question_id = isset($question_id[$i]) ? $question_id[$i] : ''; //add a default value here
            $scores->user_id = isset($user_id[$i]) ? $user_id[$i] : ''; //add a default value here
            $scores->jawaban = isset($pilihan[$i]) ? $pilihan[$i] : ''; //add a default value here
            $scores->exam_id = isset($exam_id[$i]) ? $exam_id[$i] : ''; //add a default value here
            $scores->hasil = isset($hasil[$i]) ? $hasil[$i] : ''; //add a default value here
            $scores->save();
        }
        $jenis = explode('_', $ujian->nama);
        $data = quiziz::where([
            ['user_id', '=' ,$user_id[0]],
            ['exam_id', '=', $jenis[1]??0],
            ])->get();
        $ujian = exam::find($exam_id[0]);
              result::create([
                'user_id' => $user_id[0],
                'exam_id' => $exam_id[0],
                'benar' => $benar,
                'salah' => $salah,
                'kosong' => $kosong,
                'dijawab' => $salah+$benar,
                'score' => $benar*4-$salah,
              ]);
              
          if (last($jenis) == 'quiziz') {
            quiziz::create([
                'user_id' => $user_id[0],
                'exam_id' => $jenis[1],
                'benar' => $benar,
                'salah' => $salah,
                'kosong' => $kosong,
                'dijawab' => $salah+$benar,
                'score' => $benar*4-$salah,
              ]);
              //   quizzi
              if ($data->count() == 2) {
                  $data1 = [$data->first()->benar, $data->first()->salah, $data->first()->kosong];
                  $data2 = [$data->last()->benar, $data->last()->salah, $data->last()->kosong];
                quiziz1::create([
                    'user_id' => $user_id[0],
                    'exam_id' => $jenis[1],
                    'benar' => $benar+$data1[0]+$data2[0],
                    'salah' => $salah+$data1[1]+$data2[1],
                    'kosong' => $kosong+$data1[2]+$data2[2],
                    'dijawab' => $salah+$benar+$data1[0]+$data2[0]+$data1[1]+$data2[1],
                    'score' => (($benar+$data1[0]+$data2[0])*4-($salah+$data1[1]+$data2[1]))/12,
                  ]);
              }
                return redirect('exam');
          }
            return redirect('exam');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($data, request $request)
    {
        $id = auth::user()->id;
        $time = $request->cookie('time');
        $soal = question::find($request->id);
        $soall = question::where('exam_id', $data)->inRandomOrder($id)->get();
        $ujian = exam::find($data);
        $last = [];
         $jenis = explode('_', $ujian->nama);

            for ($i = 1; $i <= $ujian->soal; $i++) {
            
           $sudah[] = $_COOKIE['questionid'.$i]??null;
        }

        for ($i = ($ujian->soal)-1; $i >= 0 ; $i--) {
            if ($sudah[$i] !== null) {
            $last = ['nomor' => $i+2];break;
                
            }
        }
        session()->put('last', $last);

         // quiziz
         if (last($jenis) == 'quiziz' ) {
            $nomer = $_GET['nomer']??1;

            if (session('time'.$nomer)) {
                return view('user.quiziz', compact('soal', 'ujian', 'time', 'soall'));
            } else {
            session(['time'.$nomer => time()]);
            }
            return view('user.quiziz', compact('soal', 'ujian', 'time', 'soall'));
        }
        // endquiziz
        return view('user.exam', compact('soal', 'ujian', 'time', 'soall'));
    }

    public function preShow($id, request $request)
    {
        $idd = auth::user()->id;
        $ujian = exam::find($id);
        $soall = question::where('exam_id', $id)->inRandomOrder($idd)->get();
        $soal = [];
        // format waktu
        $waktuUjian = strtotime($ujian->tanggal);
        foreach ($soall as $a) {
            $soal[] = $a;
        }
        $last = [];
        $jenis = explode('_', $ujian->nama);
        
        // quiziz
        if (last($jenis) == 'quiziz' ) {
            $last = ['id' => session('nomor'.session('last.nomor').'.userid'), 'nomor' => session('last.nomor')]; 
            // kalau keluar
        if ($request->cookie('time')) {
            $id = $last['id']??$soal[0]->id;
            $nomor = $last['nomor']??1;
            return view('user.preexam', compact('soal', 'ujian', 'id', 'nomor'));
        } else {
            Cookie::queue(cookie::make('time', $waktuUjian, 60*24));
        }
        // endkalau keluar

            return view('user.preexam', compact('soal', 'ujian'));
        }
        // endquiziz

        // normal
        if ($request->cookie('time')) {
           $id = $last['id']??$soal[0]->id;
            $nomor = $last['nomor']??1;
            return view('user.preexam', compact('soal', 'ujian', 'id', 'nomor'));
        } else {
            Cookie::queue(cookie::make('time', $waktuUjian, 60*24));
        }

        return view('user.preexam', compact('soal', 'ujian'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
