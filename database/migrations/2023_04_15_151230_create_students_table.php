<?php

use App\Models\Guardian;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('school_id');
            $table->foreignId('guardian_id');
            $table->string('name');
            $table->string('gender');
            $table->string('religion')->nullable();
            $table->string('state_of_origin');
            $table->string('nationality');
            $table->date('date_of_birth');
            $table->string('email_address')->unique()->nullable();
            $table->string('admission_number')->unique()->nullable();
            $table->text('passport_link')->nullable();
            $table->string('last_school_attended')->nullable();
            $table->string('health_status')->nullable();

            //Current term , session and class
            $table->foreignId('term_id');
            $table->foreignId('session_id');
            $table->foreignId('class_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
