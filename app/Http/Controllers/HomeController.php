<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::query()->orderBy('id')->get();
        return view('home', compact('questions'));
    } 
    public function createFeedback($id)
    {
        $q = Question::with('comments')->find($id);
        return view('teacher.feedback', compact('q'));
    }
    public function store(Request $req)
    {
        $q = Question::find($req->question_id);

        $q->comments()->create([
            'user_id' => Auth::user()->id,
            'body' => $req->body
        ]);

        $q->update([
            'status' => 2,
        ]);


        return back();
    }
}
