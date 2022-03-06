<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Quiziz1;
use App\Models\User;
use Illuminate\Http\Request;

class QuizizController extends Controller
{
    public function hasil($id)
    {
         $user = user::where('pembayaran', 'Lolos')->get();
        return view('admin.quiziz.data-hasil', compact('user', 'id'));
    }
    public function index()
    {
        $data = quiziz1::all();
        return view('admin.quiziz.index', compact('data'));
    }
}
