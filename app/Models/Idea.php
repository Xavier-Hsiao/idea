<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Idea extends Model
{
	use HasFactory;

	protected $fillable = [
		"description",
		"user_id",
	];

	public function user(): BelongsTo
	{
		// * Eloquent will attempt to fund a User model that has an id which matches the user_id column on the Idea model.
		return $this->belongsTo(User::class);
	}
}
