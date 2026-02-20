<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Idea;

Route::get("/", function () {
	// $ideas = session()->get("ideas", []);
	// $ideas = DB::table("ideas")->get();

	$ideas = Idea::when(request("state"), function ($query, $state) {
		$query->where("state", $state);
	})->get();

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

	// session()->push("ideas", $idea);

	return redirect("/");
});

//! Temporary
Route::get("/delete-ideas", function () {
	session()->forget("ideas");

	return redirect("/");
});
