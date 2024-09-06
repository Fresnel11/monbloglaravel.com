<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    protected $table = 'user_answer'; // indiquer à Laravel d'utiliser le nom correct de la table.
    protected $fillable = ['user_id', 'quiz_id', 'user_answer'];
    public function quiz()
    {
        return $this->belongsTo(Quizzes::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
