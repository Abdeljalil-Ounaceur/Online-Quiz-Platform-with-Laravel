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
    Schema::create('resultat_choix', function (Blueprint $table) {
      $table->id();
      $table->foreignId('id_resultat')->constrained('resultats')->cascadeOnDelete()->cascadeOnUpdate();
      $table->integer('question');
      $table->integer('choix');
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
    Schema::dropIfExists('reultat_reponses');
  }
};
