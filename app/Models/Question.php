<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class Question extends Model
{
    use HasFactory;

    public function ans(){
        return $this->hasOne(Answer::class,'question_id','id');
    }
}
