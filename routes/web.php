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

// get the create form
Route::get("/ideas/create", function () {
	return view("ideas.create");
});

// store a new idea
Route::post("/ideas", function () {
	$idea = Request::input("description");

	Idea::create([
		"description" => $idea,
		"state" => "pending",
	]);

	return redirect("/ideas");
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

// destroy an idea
Route::delete("/ideas/{idea}", function (Idea $idea) {
	$idea->delete();

	return redirect("/ideas");
});
