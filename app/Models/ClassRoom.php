<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class ClassRoom extends Model
{
    use HasFactory;

    protected  $fillable = [
        'school_id', 'section_id', 'class_name'
    ];
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    protected static function booted()
    {
        self::creating(function($model){
            $model->school_id = Auth::user() ? Auth::user()->school_id : 1;
            $model->sort_id = 1;
        });
    }
}
