<?php


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DailyworkController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\GroupController;
use App\Models\Group;
use App\Models\Question;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/home', [HomeController::class, 'index'])->name('home');

// profile
Route::get('/employee',[HomeController::class,'employee'])->name('employee');
Route::get('/employee/delete/{id}',[HomeController::class,'employee_delete'])->name('employee.delete');
Route::get('/employee/forch/{id}', [HomeController::class, 'employee_forch'])->name('delete.employe');
Route::get('/restore/employee/{id}',[HomeController::class,'restore_employee'])->name('restore.employee');

Route::get('/profile_edit',[HomeController::class,'profile_edit'])->name('profile_edit');
Route::post('/profile/info/change',[HomeController::class,'profile_info_change'])->name('profile.info.change');
Route::post('/profile/change/password',[HomeController::class,'change_password'])->name('profile.change.password');
Route::post('/profile/photo/change',[HomeController::class,'profile_photo_change'])->name('profile.photo.change');



// daily update_form
Route::get('/update_form',[DailyworkController::class,'update_form'])->name('update_form');
Route::post('/dailyform',[DailyworkController::class,'dailyform'])->name('dailyform');
Route::get('/form_list',[DailyworkController::class,'form_list'])->name('form.list');
Route::get('/form_list_edit/{id}',[DailyworkController::class,'form_list_edit'])->name('form.list_edit');
Route::post('/list/update',[DailyworkController::class,'list_update'])->name('list.update');
Route::get('/form_list_delete/{id}',[DailyworkController::class,'form_list_delete'])->name('form.list.delete');
Route::post('/form_multiple/delete',[DailyworkController::class,'form_multiple_delete'])->name('form.multiple.delete');

// question add
Route::get('/question_create',[QuestionController::class,'question_create'])->name('question_create');
Route::post('/question_insert',[QuestionController::class,'question_insert'])->name('question_insert');
Route::get('/question/list',[QuestionController::class,'question_list'])->name('question.list');
Route::get('/question/edit/{id}',[QuestionController::class,'question_edit'])->name('question.edit');
Route::post('/question/update',[QuestionController::class,'question_update'])->name('question.update');
Route::GET('/question/list/delete/{id}',[QuestionController::class,'question_list_delete'])->name('question.delete');

// group section
Route::post('/group/create',[GroupController::class,'group_create'])->name('group.create');
