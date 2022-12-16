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
        Schema::create('tanahs', function (Blueprint $table) {
            $table->increments('id_tanah');
            $table->string('tanah');
            $table->text('texture');
            $table->text('description');
            $table->text('procedur');
            $table->text('superiority');
            $table->text('recomendation');
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
        Schema::dropIfExists('tabel_tanah');
    }
};
