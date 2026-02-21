<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\Email;

class SessionsController extends Controller
{
	public function create()
	{
		return view("auth.login");
	}

	public function destroy()
	{
		Auth::logout();

		return redirect("/ideas");
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
			"email" => ["required", Email::default()],
			"password" => ["required", Password::default()],
		]);

		if (Auth::attempt($validated)) {
			$request->session()->regenerate();

			return redirect("/ideas");
		}

		return back()->withErrors([
			"email" => "The provided credentials do not match our records...",
		]);
	}
}
