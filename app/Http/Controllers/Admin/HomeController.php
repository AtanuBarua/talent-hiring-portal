<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use App\Models\QuizOption;

class HomeController extends Controller
{
    public function index(){
        return view('admin.home.index');
    }

    public function manageUsers(){
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }

    public function updateUser(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->save();
        return redirect()->back();

    }

    public function userStatus(Request $request){
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return redirect()->back();
    }

    public function deleteUser(Request $request){
        $user = User::find($request->user_id);
        $user->delete();
        return redirect()->back();

    }

    public function userDetails(Request $request,$id){
        $user = User::find($id);
        if($request->ajax()){
            return response()->json(['user' => $user]);
        }
        return view('admin.users.details', compact('user'));

    }

    public function manageQuiz(){
        $quizzes = Quiz::all();
        // foreach ($quizzes as $key => $value) {
        //     # code...
        //     return $value->options()->get();
        // }
        return view('admin.quiz.manage', compact('quizzes'));
        
    }

    public function ajaxGetQuiz($id){
        $quiz = Quiz::with('options')->find($id);
        return response()->json(['quiz' => $quiz]);
        // foreach ($quizzes as $key => $value) {
        //     # code...
        //     return $value->options()->get();
        // }
        
    }

    public function newQuiz(Request $request){
        // return $request->all();
        if ($request->id) {
            $quiz = Quiz::find($request->id);
            $quiz->question = $request->question;
            $quiz->answer = $request->correct_ans;
            $quiz->save();
            $options = QuizOption::where('quiz_id',$request->id)->get();

            foreach ($options as $key => $value) {
                # code...
                $value->option = $request->options[$key];
                $value->save();
            }
        }
        else{
            $options = $request->options;
            $quiz = new Quiz();
            $quiz->question = $request->question;
            $quiz->answer = $request->correct_ans;
            $quiz->save();
    
            $quiz = Quiz::latest()->first();
            foreach ($options as $key => $value) {
                # code...
                $option = new QuizOption(); 
                $option->quiz_id = $quiz->id;
                $option->option = $value;
                $option->save();
            }
        }
        
        return redirect()->back();
        
    }

    public function deleteQuiz(Request $request){
        $quiz = Quiz::find($request->id);
        $quiz->delete();
        return redirect()->back();
    }
}
