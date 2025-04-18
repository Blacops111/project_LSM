<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];
    public function students(): BelongsToMany
{
    return $this->belongsToMany(User::class, 'course_student', 'course_id', 'student_id')->withTimestamps();
}
public function schedules()
{
    return $this->hasMany(Schedule::class);
}
}
