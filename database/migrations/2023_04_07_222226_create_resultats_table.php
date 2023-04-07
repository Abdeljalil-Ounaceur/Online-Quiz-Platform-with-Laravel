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
    Schema::create('resultats', function (Blueprint $table) {
      $table->id();
      $table->foreignId('id_test')->constrained('tests')->cascadeOnDelete()->cascadeOnUpdate();
      $table->integer('score');
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
    Schema::dropIfExists('resultats');
  }
};
