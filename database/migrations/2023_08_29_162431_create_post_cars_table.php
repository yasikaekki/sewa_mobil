<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id');
            $table->string("foto_profil");
            $table->integer("nama_kendaraan");
            $table->integer("no_kendaraan");
            $table->integer("no_stnk");
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
        Schema::dropIfExists('post_cars');
    }
}
