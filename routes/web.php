<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/', function () {
	$news = App\News::limit(5)->orderBy('updated_at', 'desc')->get();
    return view('welcome', compact('news'));
});

Route::get('test', function() {
	return view('auth.passwords.email2', ['url' => 'manap']);
});

Route::get('news', 'NewsController@index');
Route::post('news', 'NewsController@store');
Route::delete('news/{id}', 'NewsController@destroy');
Route::get('news/{id}', 'NewsController@edit');
Route::put('news/{id}', 'NewsController@update');
Route::get('public/news', 'NewsController@publicIndex');
Route::get('public/news/{id}', 'NewsController@publicShow');
Route::get('teachers', 'TeacherController@index');
Route::get('teachers/{id}', 'TeacherController@edit');
Route::put('teachers/{id}', 'TeacherController@update');
Route::post('teachers', 'TeacherController@store');
Route::delete('teachers/{id}', 'TeacherController@destroy');

Route::get('schedules', 'ScheduleController@index');
Route::put('schedules/{id}', 'ScheduleController@update');
Route::get('schedules/{id}/edit', 'ScheduleController@edit');
Route::get('students', 'StudentController@index');
Route::get('students/{id}/edit', 'StudentController@edit');
Route::put('students/{id}', 'StudentController@update');
Route::get('students/export', 'StudentController@export');
Route::get('interview', 'InterviewController@index')->middleware('config');
Route::put('interview/{id}', 'InterviewController@update');
Route::get('interview/{id}/edit', 'InterviewController@edit');
Route::get('schedule-registration', 'ScheduleRegistrationController@index')->middleware('config');
Route::get('schedule-registration/{id}/edit', 'ScheduleRegistrationController@edit');
Route::put('schedule-registration/{id}', 'ScheduleRegistrationController@update');
Route::get('pick-student', 'PickStudentController@index')->middleware('config');
Route::put('pick-student/{id}', 'PickStudentController@update');
Route::get('pick-student/{id}/pick', 'PickStudentController@pick');
Route::get('pick-student/{id}/unpick', 'PickStudentController@unpick');
Route::get('schedules/class', 'ScheduleClassController@index');
Route::get('schedules/class/export', 'ScheduleClassController@export');
Route::get('schedules/corner', 'ScheduleCornerController@index');
Route::get('schedules/corner/export', 'ScheduleCornerController@export');
Route::get('schedules/export', 'ScheduleController@export');
Route::post('topics', 'TopicController@store')->middleware('config');
Route::put('topics/{id}', 'TopicController@update');
Route::delete('topics/{id}', 'TopicController@destroy');

Route::post('assignments', 'AssignmentController@store')->middleware('config');
Route::get('assignments/export', 'AssignmentController@export')->middleware('config');
Route::get('assignments/{id}', 'AssignmentController@edit')->middleware('config');
Route::put('assignments/{id}', 'AssignmentController@update')->middleware('config');
Route::get('attendances', 'AttedanceController@index')->middleware('config');
Route::get('assignments', 'AssignmentController@index')->middleware('config');
Route::get('configurations', 'ConfigurationController@index');
Route::post('configurations', 'ConfigurationController@store');
Route::post('attendances', 'AttedanceController@store');
Route::get('profile', 'ProfileController@index');
Route::put('profile', 'ProfileController@update');
Route::get('student-attendance', 'StudentAttendance@index')->middleware('config');
Route::get('student-attendance/export', 'StudentAttendance@export')->middleware('config');
Route::get('teacher-level', 'TeacherLevelController@index');
Route::get('teacher-level/{id}', 'TeacherLevelController@edit');
Route::put('teacher-level/{id}', 'TeacherLevelController@update');



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', 'LoginController@showLoginPage')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@login');
Route::get('/register', 'LoginController@showRegisterPage')->name('register')->middleware('guest', 'config');
Route::post('/register', 'LoginController@register')->middleware('config');
Route::post('/logout', 'LoginController@logout');

Route::get('/dashboard', 'HomeController@dashboard')->middleware('auth', 'config');