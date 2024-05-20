<?php

namespace App\Http\Controllers;

use App\Models\bank;
use App\Models\QuizQuestions;
use App\Models\Results;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\password;

class MainController extends Controller
{
    public function startQuiz()
    {
        session()->put("nextq", "1");
        session()->put("wrongans", "0");
        session()->put("correctans", "0");

        $bank = bank::where('status',1)->first();
        $questions = QuizQuestions::where('bank',$bank->id)->get();
        $questCount = QuizQuestions::where('bank',$bank->id)->count();
        $totalMarks = $questions->sum('marks');
        if ($questions->isNotEmpty()) {
            return view('index', compact('questions', 'questCount','totalMarks'));
        } else {
            return redirect::to('error');
        }
    }

                                           

    public function login()
    {
        $users = user::all();
        return view('login', compact('users'));
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Invalid email or password.');
        }

        $admin = user::where('email', $request->email)->first();

        if ($admin && $admin->password === $request->password) {
            session()->put('role', $admin->role);
            session()->put('id', $admin->id);
            session()->put('name', $admin->name);
            if ($admin->role == 'admin') {
                session()->put('roll', 1);
                return redirect::to('Dashboard');
            } else {
                session()->put('rol', 1);
                return redirect::to('');
            }

            return redirect::to('SignIn');
        }



        return back()->with('error', 'Invalid email or password.');
    }


    public function logout()
    {
        session()->flush();
        return redirect('SignIn');
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        // $validatedData = $request->validate([
        //     'user_id' => 'required',
        //     'user_name' => 'required',
        //     'percentage' => 'required',
        //     'bank' => 'required',
        // ]);
    
        // Create a new Percentage model instance
        $percentage = new Results();
        $percentage->user_id = $request->user_id;
        $percentage->user_name = $request->user_name;
        $percentage->percentage = $request->percentage;
        $percentage->bank = $request->bank;
        $percentage->save();
        session()->flush();
    
        return response()->json(['success' => true]);
    }



}
