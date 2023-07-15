<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Permalink extends Model
{
    use HasFactory;

    public function client(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public static function checkPermaLink($code)
    {
        return self::where('permalink',$code)->first();
    }
}
