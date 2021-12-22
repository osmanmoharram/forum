<?php

use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

use Michelf\Markdown;
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


// Route::resource('topics', TopicController::class);

Route::get('/', function () {
	return view('topics.index', [
		'codeBlock' => $my_html = Markdown::defaultTransform($my_text)
	]);
});

require __DIR__.'/auth.php';
