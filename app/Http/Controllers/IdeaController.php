<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
	/**
	 * Display a listing of ideas.
	 */
	public function index()
	{
		$ideas = Idea::where([
			"user_id" => Auth::user()->id,
		])->get();

		return view("ideas.index", [
			"ideas" => $ideas,
		]);
	}

	/**
	 * Show the form for creating a new idea.
	 */
	public function create()
	{
		return view("ideas.create");
	}

	/**
	 * Store a newly created idea in storage.
	 */
	public function store(Request $request)
	{
		$request->validate(
			[
				"description" => ["required", "min:10"],
			]
		);

		$idea = $request->input("description");

		Idea::create([
			"description" => $idea,
			"state" => "pending",
			"user_id" => Auth::user()->id,
		]);

		return redirect("/ideas");
	}

	/**
	 * Display the specified idea.
	 */
	public function show(Idea $idea)
	{
		return view("ideas.show", [
			"idea" => $idea,
		]);
	}

	/**
	 * Show the form for editing the specified idea.
	 */
	public function edit(Idea $idea)
	{
		return view("ideas.edit", [
			"idea" => $idea,
		]);
	}

	/**
	 * Update the specified idea in storage.
	 */
	public function update(Request $request, Idea $idea)
	{
		$request->validate(
			[
				"description" => ["required", "min:10"],
			]
		);

		$idea->update([
			"description" => $request->input("description"),
		]);

		return redirect("/ideas/{$idea->id}");
	}

	/**
	 * Remove the specified idea from storage.
	 */
	public function destroy(Idea $idea)
	{
		$idea->delete();

		return redirect("/ideas");
	}
}
