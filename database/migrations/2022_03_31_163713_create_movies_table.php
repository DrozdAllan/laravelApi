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
            $table->string('original_title');
            $table->string('slug');
            $table->text('synopsis');
            $table->string('release_date');
            $table->string('en_translation');
            $table->string('fr_translation')->nullable();
            $table->string('de_translation')->nullable();
            $table->string('es_translation')->nullable();
            $table->string('it_translation')->nullable();
            $table->string('ja_translation')->nullable();
            $table->string('zh_translation')->nullable();
            $table->string('ru_translation')->nullable();
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
