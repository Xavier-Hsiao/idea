<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Idea;

// show all ideas
Route::get("/ideas", function () {
	$ideas = Idea::all();

	return view("ideas.index", [
		"ideas" => $ideas,
	]);
});

// show an idea
Route::get("/ideas/{idea}", function (Idea $idea) {
	// $idea = Idea::findOrFail($id)

	return view("ideas.show", [
		"idea" => $idea,
	]);
});

// get the edit form
Route::get("/ideas/{idea}/edit", function (Idea $idea) {
	return view("ideas.edit", [
		"idea" => $idea,
	]);
});

// update an idea
Route::patch("/ideas/{idea}", function (Idea $idea) {
	$idea->update([
		"description" => request("description"),
	]);

	return redirect("/ideas/{$idea->id}");
});

// store a new idea
Route::post("/ideas", function () {
	$idea = Request::input("idea");

	Idea::create([
		"description" => $idea,
		"state" => "pending",
	]);

	return redirect("/");
});

// destroy an idea
Route::delete("/ideas/{idea}", function (Idea $idea) {
	$idea->delete();

	return redirect("/ideas");
});
