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
        Schema::create('categorie_operations', function (Blueprint $table) {
            $table->increments('idCategorie');
            $table->string('nomCategorieOperation');
            $table->timestamps();
        });

        Schema::table('operations', function(Blueprint $table) {
           $table->foreign('idCategorie')->references('id')->on('operations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_operations');
    }
};
