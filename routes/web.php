<?php

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

Route::get('/','User\IndexController@index');

//User Routes
Auth::routes();
Route::get('/dashboard','User\DashboardController@index');
Route::post('/vote','User\CastVoteController@index')->name('vote');
Route::post('/cast-vote','User\CastVoteController@castVote')->name('castvote');
Route::get('/success','User\DashboardController@success');


//Candidate Routes

Route::get('/candidate','Candidate\CandidateController@showCandidateForm')->name('candidate');
Route::post('/candidate','Candidate\CandidateController@formSubmit');
Route::get('/candidate-list','Candidate\CandidateListController@index')->name('can.list');

//Route::get('/home', 'HomeController@index')->name('home');


//Admin Routes

Route::prefix('admin')->group( function(){
    Route::get('login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\Admin\LoginController@login');
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');

    Route::get('/dashboard','Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/add','Admin\AddDeptRegController@allList')->name('add.form');
    Route::post('/add/number','Admin\AddDeptRegController@index')->name('insert.form');
    Route::post('/update','Admin\AddDeptRegController@updateNumber')->name('update.form');
    Route::post('/update/message','Admin\DashboardController@messageUpdate')->name('update.message');
    Route::get('/candidate-list','Admin\StudentCandidateListController@candidateList')->name("candidatelist");
    Route::post('/accept','Admin\StudentCandidateListController@updateStatus')->name('updatestatus');
    //Route::post('/reject','Admin\StudentCandidateListController@rejectStatus')->name('reject');
    Route::get('/student-list','Admin\StudentCandidateListController@studentList')->name("studentlist");

});
