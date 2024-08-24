<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        // 'user_id',
    ];

    // // Un article peut avoir plusieurs commentaires
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    // public function user_error() {
    //     return $this->belongsTo(User::class);
    // }
};
