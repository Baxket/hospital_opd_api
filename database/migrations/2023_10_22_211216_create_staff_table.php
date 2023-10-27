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
        
        Schema::create('staff', function (Blueprint $table) {
            $table->id(); //Primary Key
            $table->string('staff_num')->nullable();
            $table->string('password');
            $table->string('full_name');
            $table->unsignedBigInteger('staff_type_id'); //Foreign Key
            $table->string('phone_number');
            $table->date('dob');
            $table->string('residence');
            $table->string('email')->unique();
            $table->timestamps();
            //Foreign Key Set Up
            $table->foreign('staff_type_id')->references('id')->on('staff_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
