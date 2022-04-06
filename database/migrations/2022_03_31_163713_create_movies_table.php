<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->text('synopsis');
            $table->string('release_date');
            $table->string('en_title')->unique();
            $table->string('fr_title')->nullable();
            $table->string('de_title')->nullable();
            $table->string('es_title')->nullable();
            $table->string('it_title')->nullable();
            $table->string('ja_title')->nullable();
            $table->string('zh_title')->nullable();
            $table->string('ru_title')->nullable();
            $table->string('poster')->nullable();
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
        Schema::dropIfExists('movies');
    }
};
