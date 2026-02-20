<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Idea;

Route::get("/ideas", function () {
	$ideas = Idea::all();

	return view("ideas", [
		"ideas" => $ideas,
	]);
});

Route::post("/ideas", function () {
	$idea = Request::input("idea");

	Idea::create([
		"description" => $idea,
		"state" => "pending",
	]);

	return redirect("/");
});

//! Temporary
Route::get("/delete-ideas", function () {


	return redirect("/");
});
