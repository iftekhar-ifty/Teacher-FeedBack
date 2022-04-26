<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
    	$questions = Question::query()
    							->with('student')
    							->with('comments')
    							->orderBy('id')
    							->get();

    	return  QuestionResource::collection($questions);
    }
}
