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
       

        Schema::create('o_p_d_s', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('staff_id');//Foreign ID
            $table->unsignedBigInteger('patient_id'); //Foreign ID
            $table->string('weight');
            $table->string('height');
            $table->string('blood_pressure');
            $table->string('temperature');
            $table->timestamps(); //created_at & updated_at
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_p_d_s');
    }
};
