<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id'];

    // Relationship: A discussion belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
