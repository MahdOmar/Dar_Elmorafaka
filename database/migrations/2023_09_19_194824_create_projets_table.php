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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stucture_id');
            $table->unsignedBigInteger('user_id');

            $table->longText('projet')->nullable();
            $table->string('lieu_projet')->nullable();
            $table->string('type_projet')->nullable();
            $table->integer('nombre_participants')->nullable();


            $table->longText('but_projet')->nullable();
            $table->longText('domaine')->nullable();
            $table->longText('categorie')->nullable();
            $table->longText('concurrence')->nullable();
            $table->longText('conditions')->nullable();
            $table->longText('benifices')->nullable();


            $table->foreign('stucture_id')->references('id')->on('structures')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
