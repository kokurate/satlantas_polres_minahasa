<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKritikSaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kritik_sarans', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('judul')->nullable();
            $table->string('slug')->unique();
            // $table->id_user();
            $table->text('konten')->nullable();

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
        Schema::dropIfExists('kritik_sarans');
    }
}
