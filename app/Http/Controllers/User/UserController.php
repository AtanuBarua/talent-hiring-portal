<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function giveQuiz()
    {
        // $quizzes = Quiz::inRandomOrder()->get();
        $quizzes = Quiz::inRandomOrder()->where('status','0')->get();
        return view('user.quiz.quiz', compact('quizzes'));
    }

    public function quizHistory()
    {
        // $quizzes = Quiz::inRandomOrder()->get();
        $results = Result::join('users','users.id','=','results.user_id')->where('user_id', Auth::id())->select('results.*','users.name')->latest()->get();
        return view('user.quiz.history', compact('results'));
    }

    public function leaderBoard()
    {
        // $quizzes = Quiz::inRandomOrder()->get();
        $results = DB::table('results')
        ->join('users','users.id','=','results.user_id')
        ->where('results.highest', '1')
        ->orderBy('results.marks','desc')
        ->select('results.*','users.name')
        ->get();
        // return $results;
        return view('user.quiz.history', compact('results'));
    }

    public function submitQuiz(Request $request)
    {
        $result = Result::where('user_id', Auth::id())->orderBy('marks', 'desc')->latest()->first();
        if ($result) {
            # code...
            $result->highest = '0';
            $result->save();
        }


        $questions = $request->question;
        $i = 0;
        $answerNo = 1;
        foreach ($questions as $key => $value) {
            # code...
            $answer = 'answer' . $value;
            $question = Quiz::find($value);
            // return $request->answer.$value; 
            if ($request->$answer == $question->answer) {
                $i++;
            }
            $answerNo++;
        }

        $result = new Result();
        $result->user_id = Auth::id();
        $result->marks = $i;
        $result->out_of = count($questions);
        $result->highest = '0';
        $result->save();

        $result = Result::where('user_id', Auth::id())->orderBy('marks', 'desc')->latest()->first();
        $result->highest = '1';
        $result->save();

        return redirect()->route('user.quiz-history')->with('message', 'You got ' . $i . '/' . count($questions));
    }
}
