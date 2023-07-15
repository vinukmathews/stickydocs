<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Permalink;
use App\Models\Question;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permalink(){
        return $this->hasOne(Permalink::class,'user_id','id');
    }


    public function clientQuestions(){
        return $this->hasMany(Question::class,'user_id','id')->orderBy('id','desc');
    }

    public static function latestRequest($user_id){
         return $row = Question::where(['user_id'=>$user_id])->orderBy('id','desc')->pluck('created_at')->first();
         
    }

    public static function latestSubmission($user_id){
        return $row = Answer::where(['user_id'=>$user_id])->orderBy('id','desc')->pluck('created_at')->first();
        
   }

    
}
