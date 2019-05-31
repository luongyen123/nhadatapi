<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTintucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("tieude",200);
            $table->integer("loaitin_id");
            $table->string("chitiet",5000);
            $table->string("anh_daidien",100);
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
        Schema::dropIfExists('tinruc');
    }
}
