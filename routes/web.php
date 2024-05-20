<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminSignInController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SignInController;
use App\Http\Middleware\AuthCheck;
use App\Models\question;
use Illuminate\Support\Facades\Route;

// Route::get('/exportToexcel', [MainController::class, 'exportToexcel']);

Route::get('/logout', [MainController::class, 'logout']);
Route::get('Profile', [AdminController::class, 'Profile']);
Route::post('ProfileUpdate/{id}', [AdminController::class, 'ProfileUpdate']);

Route::get('/QuestionList', [AdminController::class, 'QuestionList'])->middleware('isAdminLogin');
Route::get('/AddQuestionForm', [AdminController::class, 'AddQuestionForm'])->middleware('isAdminLogin');
Route::post('/AddQuestion', [AdminController::class, 'AddQuestion'])->middleware('isAdminLogin');

Route::get('QuestionEdit/{id}', [AdminController::class, 'edit'])->middleware('isAdminLogin');
Route::post('QuestionUpdate/{id}', [AdminController::class, 'update'])->middleware('isAdminLogin');
Route::get('QuestionDelete/{id}', [AdminController::class, 'delete'])->middleware('isAdminLogin');


Route::get('/AddUserForm', [AdminController::class, 'AddUserForm'])->middleware('isAdminLogin');
Route::post('/AddUser', [AdminController::class, 'AddUser'])->middleware('isAdminLogin');
Route::get('/ShowUser', [AdminController::class, 'ShowUser'])->middleware('isAdminLogin');
Route::get('EditUser/{id}', [AdminController::class, 'edituser'])->middleware('isAdminLogin');
Route::post('UpdateUser/{id}', [AdminController::class, 'updateuser'])->middleware('isAdminLogin');
Route::get('DeleteUser/{id}', [AdminController::class, 'deleteuser'])->middleware('isAdminLogin');


// Bank Crud
Route::get('/AddBankForm', [AdminController::class, 'AddBankForm'])->middleware('isAdminLogin');
Route::post('/AddBank', [AdminController::class, 'AddBank'])->middleware('isAdminLogin');
Route::get('/ShowBank', [AdminController::class, 'ShowBank'])->middleware('isAdminLogin');
Route::get('editBank/{id}', [AdminController::class, 'editBank'])->middleware('isAdminLogin');
Route::post('UpdateBank/{id}', [AdminController::class, 'UpdateBank'])->middleware('isAdminLogin');
Route::get('DeleteBank/{id}', [AdminController::class, 'DeleteBank'])->middleware('isAdminLogin');

Route::get('/Dashboard', [AdminController::class, 'Dashboard'])->middleware('isAdminLogin');

Route::get('/SignIn', [MainController::class, 'login'])->middleware('AuthCheck');
Route::post('/Authenticate', [MainController::class, 'authenticate'])->middleware('AuthCheck');

Route::get('/', [MainController::class, 'startQuiz'])->middleware('UserCheck');
    

Route::post('/storepercentage', [MainController::class, 'store']);
Route::post('/saveAttemptQuiz', [AdminController::class, 'saveAttemptQuiz']);
Route::get('/pdf', [AdminController::class, 'pdf']);

Route::get('/downloadPdf/{filename}', [AdminController::class, 'downloadPdf']);

