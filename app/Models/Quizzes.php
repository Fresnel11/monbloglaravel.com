<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizzes extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'image', 'correct_answer', 'explanation'];

    public function answers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
