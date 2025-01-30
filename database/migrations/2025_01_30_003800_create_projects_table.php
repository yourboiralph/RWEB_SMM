<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name')->unique();
            $table->unsignedBigInteger('issued_by');
            $table->unsignedBigInteger('client_id');
            $table->text('description'); // Changed from string to text
            $table->date('target_date');
            $table->string('status'); 
            $table->timestamps();

            $table->foreign('issued_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
