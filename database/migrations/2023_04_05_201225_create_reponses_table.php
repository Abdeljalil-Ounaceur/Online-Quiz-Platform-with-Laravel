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
    Schema::create('reponses', function (Blueprint $table) {
      $table->id();
      $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete()->cascadeOnUpdate();
      $table->text('text');
      $table->boolean('estCorrecte');
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
    Schema::dropIfExists('reponses');
  }
};
