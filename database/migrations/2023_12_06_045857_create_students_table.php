<?php

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
            $table->string('name');
            $table->string('student_id');
            $table->string('e_mail')->nullable();
            $table->string('dob');
            $table->string('class');
            $table->string('section');
            $table->string('roll_no');
            $table->string('address');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('contact_no')->nullable();
            $table->string('guardian_contact_no');
            $table->string('image');
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
