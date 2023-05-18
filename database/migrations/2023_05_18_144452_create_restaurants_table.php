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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->required();
            $table->string('andress')->required();
            $table->tinyInteger('vat_number')->required();
            $table->string('telephone')->required()->unique();
            $table->text('description');
            $table->string('immagine')->required();
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('owners');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
