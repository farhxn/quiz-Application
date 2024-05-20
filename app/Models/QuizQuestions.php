<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestions extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'a', 'b', 'c', 'd', 'answer'];

    protected $casts = [
        'id' => 'integer',
    ];
}
