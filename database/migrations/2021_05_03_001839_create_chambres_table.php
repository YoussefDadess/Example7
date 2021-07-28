<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->string('image')-> nullable();
            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->unsignedBigInteger('typechambre_id');
            $table->foreign('typechambre_id')->references('id')->on('typechambres')->onDelete('cascade');
            $table->string('etage');
            $table->Integer('capacite_adultes')->nullable();
            $table->Integer('capacite_enfants')->nullable();
            $table->float('prix');
            $table->string('devise');
            $table->string('nbrLits')->nullable();
            $table->float('zone_residentielle');
            $table->string('equipement');
            $table->string('etat');
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
        Schema::dropIfExists('chambres');
    }
}
