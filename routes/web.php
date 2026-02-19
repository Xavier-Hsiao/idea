<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome', [
		"tasks" => [
			"Go to the market",
			"Feed my cat",
			"Read books",
			"Learn Laravel",
		]
	]);
});

Route::get('/about', function () {
	return view('about');
});

Route::get('/contact', function () {
	return view('contact');
});
