<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Session extends Model
{
    use HasFactory;

    protected static function booted()
    {
        self::creating(function($model){
            $model->school_id = Auth::user() ?  Auth::user()->school_id : 1;
        });
    }
}
