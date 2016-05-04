<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Task;
use App\Person;

Route::get('/', function () {
	$person = new Person;
	$person->first_name = "Luis";
	$person->last_name = "Bosquez";
	$person->save();
	
	
	$task = new Task;
	$task->title = "Test";
	$task->due_date = "2015-10-11";
	$task->priority = "1";
	$task->assignment = "1";
	$task->save();
	
    return view('welcome');
});

Route::get('/tasks', 'TaskController@index');

Route::post('/task', 'TaskController@store');

//Route::delete('/task/{task}', 'TaskController@destroy');
