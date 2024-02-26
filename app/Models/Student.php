<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Student extends Model
{
    use HasFactory;
    //use MediaAlly;

//    protected $fillable = [
//        'user_id',
//        'name','gender',
//        'religion', 'state_of_origin',
//        'nationality', 'date_of_birth',
//        'email_address',
//        'guardian_id', 'class_id',
//        'admission_number',
//        'passport_link', 'last_school_attended',
//        'health_status'
//    ];

protected $guarded = [];

    public function guardian(): BelongsTo
    {
        return $this->belongsTo(Guardian::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function studentClass(): BelongsTo
    {
        return $this->belongsTo(StudentClass::class,'student_class_id');
    }
}
