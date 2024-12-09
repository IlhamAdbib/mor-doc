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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('Appogé');
            $table->string('Module1');
            $table->integer('Note1');
            $table->string('Module2');
            $table->integer('Note2');
            $table->string('Module3');
            $table->integer('Note3');
            $table->string('Module4');
            $table->integer('Note4');
            $table->string('Module5');
            $table->integer('Note5');
            $table->string('Module6');
            $table->integer('Note6');
            $table->string('semester');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
