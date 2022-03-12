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
use Illuminate\Support\Str;

class ExamController extends Controller
{
    public function index()
    {
        $test = exam::where('keterangan', 'Aktif')->get();
        $user = auth::user();
        $exam = answer::where('user_id', $user->id)->get();
        return view('user.test', compact('test', 'user', 'exam'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $ujian = exam::find($id);
        $user = auth::user();
        // take result
        $result = answer::where([
             ['user_id', '=', $user->id],
             ['exam_id', '=', $id],
             ])->get();
        for ($i = 0; $i < count($result); $i++ ) {
            $pilihan[] = [$result[$i]->id, strtoupper($result[$i]->jawaban)];
            }
            // take key
            $soal = question::where('exam_id', $id)->inRandomOrder($user->id)->get();
            for ($i = 0; $i < count($soal); $i++ ) {
            $kunjaw[] = strtoupper($soal[$i]->kunjaw);
        }
        for ($i = 0; $i < count($soal) ; $i++) {
             if ($kunjaw[$i] == $pilihan[$i][1]) {
                 $hasil[$i] = 'Benar';
                } elseif ($pilihan[$i][1] == null) {
                    $hasil[$i] = 'Kosong';
                } else {
                    $hasil[$i] = 'Salah';
                }
            }
         //insert using foreach loop
         for ($i = 0; $i < count($soal); $i++ ) {
            answer::where('id', '=', $pilihan[$i][0])
                    ->update([
                        'hasil' => $hasil[$i]   
                    ]);
            }
            //  conclusion
            $nilai = array_count_values($hasil);
            $benar = $nilai['Benar']??0;
            $salah = $nilai['Salah']??0;
            $kosong = $nilai['Kosong']??0;
            result::create([
                'user_id' => $user->id,
                'exam_id' => $id,
                'benar' => $benar,
                'salah' => $salah,
                'kosong' => $kosong,
                'dijawab' => $salah+$benar,
                'score' => $benar*4-$salah,
            ]);
            
            $ujian = exam::find($id);
            $data = quiziz::where([
                ['user_id', '=' ,$user->id],
                ['exam_id', '=', $id??0],
                ])->get();
            $jenis = explode('_', $ujian->nama);
          if (last($jenis) == 'quiziz') {
            quiziz::create([
                'user_id' => $user->id,
                'exam_id' => $id,
                'benar' => $benar,
                'salah' => $salah,
                'kosong' => $kosong,
                'dijawab' => $salah+$benar,
                'score' => $benar*4-$salah,
              ]);
              //   quiziz
              if ($data->count() == 2) {
                  $data1 = [$data->first()->benar, $data->first()->salah, $data->first()->kosong];
                  $data2 = [$data->last()->benar, $data->last()->salah, $data->last()->kosong];
                quiziz1::create([
                    'user_id' => $user->id,
                    'exam_id' => $id,
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

    public function show($data, request $request)
    {
        // dd($request->id);
        $id = auth::user()->id;
        $time = $request->cookie('time');
        $soall = question::where('exam_id', $data)->inRandomOrder($id)->get();
        $soal = $soall->find($request->id);
        $ujian = exam::find($data);
        $last = [];
        $jenis = explode('_', $ujian->nama);
        if (isset($_COOKIE['jawaban'])) {
            $idJawaban = str::of($_COOKIE['jawaban'])->explode(',');
            $answer = answer::where('question_id', $idJawaban->first())->first();
            if ($_COOKIE['prevId'] == $idJawaban->first()) {
                if ($answer->jawaban != $idJawaban->last()) {
                    answer::where('question_id', $idJawaban->first())
                    ->update([
                        'jawaban' => $idJawaban->last(),
                    ]);
                }
            }
        }
        $oldAnswers = answer::where([
                        ['user_id', '=', $id],
                        ['exam_id', '=', $data],
                        ['jawaban', '!=', '']
                    ])->get();
        $answers = json_encode($oldAnswers);
                    // dd($oldAnswers);
        for ($i = 1; $i <= $ujian->soal; $i++) {           
            $sudah[] = $_COOKIE['jawaban'.$i]??null;
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
        return view('user.exam', compact('soal', 'ujian', 'time', 'soall', 'answers'));
    }

    public function preShow($id, request $request)
    {
        $idd = auth::user()->id;
        $ujian = exam::find($id);
        $soall = question::where('exam_id', $id)->inRandomOrder($idd)->get();
        $soal = [];
        $data = [];
        // $last = [];
        // format waktu
        $waktuUjian = strtotime($ujian->tanggal)-60*60*7;
        $jenis = explode('_', $ujian->nama);
        
        foreach ($soall as $a) {
            $soal[] = $a; 
            $data[] = ['user_id'=>$idd, 'exam_id'=> $id, 'question_id'=>$a->id];
        }
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
           $id = $soal[0]->id;
            return view('user.preexam', compact('soal', 'ujian', 'id'));
        } else {
            Cookie::queue(cookie::make('time', $waktuUjian, 60*24));
            answer::insert($data);
        }

        return view('user.preexam', compact('soal', 'ujian'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
