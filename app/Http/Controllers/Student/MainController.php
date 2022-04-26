<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
class MainController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:student');
    }
    public function dashboard()
    {
    	$questions =  Question::query()->orderBy('id')->get();
        return view('student.dashboard', compact('questions'));
    }
}
