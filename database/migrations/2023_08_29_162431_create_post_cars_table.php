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
            $table->foreignId('user_id');
            $table->string("foto_profil");
            $table->string("nama_kendaraan");
            $table->integer("harga");
            $table->string("no_kendaraan");
            $table->integer("no_stnk");
            $table->string("status")->nullable();
            $table->string("masa_akhir")->nullable();
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
