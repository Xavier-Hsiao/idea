<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
	// $ideas = session()->get("ideas", []);

	$ideas = DB::table("ideas")->get();

	return view("ideas", [
		"ideas" => $ideas,
	]);
});

Route::post("/ideas", function () {
	$idea = Request::input("idea");

	session()->push("ideas", $idea);

	return redirect("/");
});

//! Temporary
Route::get("/delete-ideas", function () {
	session()->forget("ideas");

	return redirect("/");
});
