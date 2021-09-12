<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/test', function (){
    return view('test');
});

Route::get('/', 'HomeController@index' )->name('home');
Route::prefix('admin')->group(function () {
    Route::resource('questions', 'Admin\QuestionController');
});

Route::get('questions/create','QuestionController@create')->name('questions.create');
Route:: post('questions','QuestionController@store')->name('questions.store');
Route:: get('questions/{question}','QuestionController@show')->name('questions.show');


Route:: post('answers','AnswerController@store')->name('answers.store');

Route::post('/comment/store', 'CommentController@store')->name('comments.store');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::post('/Vote/store','VoteController@store')->name('Vote.store');
Route::post('/Vote/store/question','VoteController@questionvotestore')->name('Vote.store.question');
Route::post('/tag/store','TagController@store')->name('Tag.store');
Route::post('/tag/Show','TagController@store')->name('Tag.show');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// Route::resource('questions.answers', 'AnswersController')->except(['index', 'create', 'show']);
// Route::get('/questions/{slug}', 'QuestionsController@show')->name('questions.show');
// // Route::post('/answers/{answer}/accept', 'AcceptAnswerController')->name('answers.accept');

// Route::post('/questions/{question}/favorites', 'FavoritesController@store')->name('questions.favorite');
// Route::delete('/questions/{question}/favorites', 'FavoritesController@destroy')->name('questions.unfavorite');

// Route::post('/questions/{question}/vote', 'VoteQuestionController');
// Route::post('/answers/{answer}/vote', 'VoteAnswerController');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


