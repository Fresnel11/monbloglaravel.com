<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'quiz_id', 'user_answer'];
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}