<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function index($soal)
    {
        $questions = question::where('exam_id', $soal)->get();
        return view('admin.soal.index', compact('questions'));
    }

    public function create()
    {   
        $genre = exam::all();
        return view('admin.soal.create', compact('genre'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_id' => 'required',
            'image' => 'image|max:1000',
            'soal' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'opsi_e' => 'required',
            'kunjaw' => 'required|max:1',
        ]);
         $fileNameToStore = null;
        if ($request->file('gambar')) {
            
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('gambar')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // // Upload Image
            $folderFile = 'public/gambar/soal/'.$request->exam_id;
            $request->file('gambar')->storeAs($folderFile, $fileNameToStore, 'local');
        }
   

        question::create([
            'exam_id' => $request->exam_id,
            'soal' => $request->soal,
            'gambar' => $fileNameToStore,
            'opsi_a' => $request->opsi_a,
            'opsi_b' => $request->opsi_b,
            'opsi_c' => $request->opsi_c,
            'opsi_d' => $request->opsi_d,
            'opsi_e' => $request->opsi_e,
            'kunjaw' => $request->kunjaw,
            'waktu' => $request->waktusoal,
        ]);

    return redirect('test')->with('success','Question created successfully!');
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
        $data = question::find($id);
        $nama = exam::find($data->exam_id)->nama;
        return view('admin.soal.edit', compact('data', 'nama'));
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
        $question = question::find($id);
        $request->validate([
            'exam_id' => 'required',
            'gambar' => 'image|max:1000',
            'soal' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'opsi_e' => 'required',
            'kunjaw' => 'required'
        ]);
        if ($request->file('gambar')) {
            if ($request->oldGambar) {
                storage::disk('public')->delete('gambar/soal/'.$request->oldExam. '/' . $request->oldGambar);
            }
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('gambar')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $folderFile = 'public/gambar/soal/'.$request->exam_id;
            $request->file('gambar')->storeAs($folderFile, $fileNameToStore, 'local');
        }
        $fileNameToStore = isset($fileNameToStore) ? $fileNameToStore : $question->gambar; //add a default value here

        question::where('id', $id)
            ->update([
                'soal' => $request->soal,
                'gambar' => $fileNameToStore,
                'opsi_a' => $request->opsi_a,
                'opsi_b' => $request->opsi_b,
                'opsi_c' => $request->opsi_c,
                'opsi_d' => $request->opsi_d,
                'opsi_e' => $request->opsi_e,
                'kunjaw' => $request->kunjaw,
                'waktu' => $request->waktu
            ]);
        return redirect('soal/'.$request->exam_id)->with('update','question updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = question::find($id);
        storage::disk('public')->delete('gambar/soal/'.$data->exam_id. '/' . $data->gambar);
        question::destroy($id);
        return redirect('soal/'.$data->exam_id)->with('delete','test deleted successfully!');
    }
}
