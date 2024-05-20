<?php

namespace App\Http\Controllers;

use App\Exports\ExportResults;
use App\Models\AttemptQuestions;
use App\Models\bank;
use App\Models\question;
use App\Models\QuizQuestions;
use App\Models\Results;
use App\Models\user as ModelsUser;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function saveAttemptQuiz(Request $request)
    {
        Log::info('Request data:', $request->all());
        $atq = new AttemptQuestions();
        $atq->question = json_encode($request->input('questions'));
        $atq->userAnswer = json_encode($request->input('userAnswers'));
        $atq->correctAnswer = json_encode($request->input('correctAnswers'));
        $atq->bank = $request->input('bank');
        $atq->userId = session()->get('id');
        $atq->UserName = session()->get('name');
        $atq->save();

        $data = [];
        $questions = $request->input('questions');
        $userAnswers = $request->input('userAnswers');
        $correctAnswers = $request->input('correctAnswers');

        foreach ($questions as $index => $question) {
            $data[] = [
                'question' => $question,
                'correctAnswer' => $correctAnswers[$index],
                'userAnswer' => $userAnswers[$index]
            ];
        }

        // Generate PDF
        $pdf = FacadePdf::loadView('pdf.quiz_results', compact('data'));

        $pdfPath = 'pdfs/quiz_results_' . time() . '.pdf';
        Storage::disk('public')->put($pdfPath, $pdf->output());

        return response()->json(['pdf_url' => Storage::url($pdfPath)]);
    }

    public function downloadPdf($filename)
    {
        // Return the PDF as a response for download
        $filePath = storage_path('app/public/pdfs/' . $filename);
        return response()->download($filePath, $filename, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function pdf()
    {
        $pdf = FacadePdf::loadView('pdf.quiz_results');
        return $pdf->stream('quiz_results.pdf');
    }

    public function AddQuestionForm()
    {
        $bank = bank::all();
        return view('Admin.question', compact('bank'));
    }
    public function AddQuestion(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'answer' => 'required',
            'bank' => 'required',
            'marks' => 'required',
        ]);

        $q = new QuizQuestions(); 
        $q->question = $validatedData['question'];
        $q->a = $validatedData['a'];
        $q->b = $validatedData['b'];
        $q->c = $validatedData['c'];
        $q->d = $validatedData['d'];
        $q->answer = $validatedData['answer'];
        $q->bank = $validatedData['bank'];
        $q->marks = $validatedData['marks'];
        $q->save();

        // Session::put('successMessage', 'Question Successfully Added!');
        return redirect()->back()->with('success', 'Bank added successfully!');
    }

    public function QuestionList()
    {
        $questions = QuizQuestions::all();
        return view('Admin.QuestionList', compact('questions'));
    }

    public function edit($id)
    {
        $question = QuizQuestions::findOrFail($id);
        $bank = bank::all();
        return view('Admin.edit', compact('question', 'bank'));
    }
    public function update(Request $request, $id)
    {
        $question = QuizQuestions::findOrFail($id);

        // Validate the request data
        $request->validate([
            'question' => 'required|string|max:255',
            'a' => 'required|string|max:255',
            'b' => 'required|string|max:255',
            'c' => 'required|string|max:255',
            'd' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'marks' => 'required|string|max:255',
        ]);

        // Update the question with the new data
        $question->question = $request->input('question');
        $question->a = $request->input('a');
        $question->b = $request->input('b');
        $question->c = $request->input('c');
        $question->d = $request->input('d');
        $question->bank = $request->bank;
        $question->answer = $request->input('answer');
        $question->marks = $request->input('marks');
        $question->save();

        // Redirect to the answer page with a success message
        return Redirect::to('QuestionList')->with('success', 'Question updated successfully.');
    }

    public function delete($id)
    {
        $question = QuizQuestions::findOrFail($id);
        $question->delete();
        return redirect::to('QuestionList')->with('success', 'Question deleted successfully.');
    }




    public function AddUserForm()
    {
        return view('Admin.Useradd');
    }

    public function AddUser(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'role' => 'required',
        ]);

        // If validation passes, create a new user
        $u = new user();
        $u->name = $validatedData['name'];
        $u->email = $validatedData['email'];
        $u->password = $request->filled('password') ? $request->password : rand(1000, 9999);
        $u->role = $validatedData['role'];
        $u->save();

        // Redirect back with success message or any other action you want to take
        return redirect()->back()->with('success', 'User added successfully!');
    }



    public function ShowUser()
    {
        $users = user::all();
        return view('Admin.usershow', compact('users'));
    }

    public function edituser($id)
    {
        $users = user::findOrFail($id);
        return view('Admin.useredit', compact('users'));
    }
    public function updateuser(Request $request, $id)
    {
        $users = user::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->filled('password') ? $request->password : rand(1000, 9999);
        $users->role = $request->role;
        $users->save();


        // Redirect to the answer page with a success message
        return Redirect::to('ShowUser')->with('success', 'Question updated successfully.');
    }

    public function deleteuser($id)
    {
        $users = ModelsUser::find($id);
        $users->delete();
        return back()->with('success', 'Question deleted successfully.');
    }



    // Bank Crud

    public function AddBankForm()
    {
        return view('Admin.bankadd');
    }
    public function AddBank(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        $b = new bank();
        $b->name = $validatedData['name'];
        $b->status = $validatedData['status'];
        $b->save();


        // Session::put('successMessage', 'Question Successfully Added!');
        return view('Admin.bankadd');
    }

    public function ShowBank()
    {
        $bank = bank::all();
        return view('Admin.bankshow', compact('bank'));
    }

    public function editBank($id)
    {
        $bank = bank::find($id);
        return view('Admin.editbank', compact('bank'));
    }

    public function UpdateBank(Request $request, $id)
    {
        $bank = bank::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        $bank->name = $request->name;
        $bank->status = $request->status;
        $bank->save();


        // $bank->name = $request->input('name');
        // $bank->status = $request->input('status');
        // $bank->save();

        // Redirect to the answer page with a success message
        return Redirect::to('ShowBank')->with('success', 'Question updated successfully.');
    }

    public function DeleteBank($id)
    {
        $bank = bank::find($id);
        $bank->delete();
        return back()->with('success', 'Question deleted successfully.');
    }



    public function Dashboard()
    {
        $usersCount = user::count();
        $bankCount = bank::count();
        $questionCount = QuizQuestions::count();
        $results = Results::all(); // Fetch all results from the database
        $totalResults = $results->count();
        $averageScore = $results->avg('percentage');
        return view('Admin.dashboard', compact('usersCount', 'bankCount', 'questionCount', 'results', 'averageScore'));
    }

    public function Profile()
    {
        $id = session()->get('id');
        $prof = user::findOrFail($id);
        return view('Admin.Profile', compact('prof'));
    }

    public function ProfileUpdate(Request $request, $id)
    {
        $prof = user::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $prof->name = $request->name;
        $prof->email = $request->email;
        $prof->password = $request->password;
        $prof->save();
        session()->put('name', $request->name);

        return Redirect::to('Dashboard')->with('success', 'Profile updated successfully.');
    }
}
