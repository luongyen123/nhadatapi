<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinmuabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinmuaban', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("tieude",50);
            $table->string("gia",20);
            $table->string("dientich",20);
            $table->string("vitri",100);
            $table->string("chitiet",1000);
            $table->integer("maqh_id");
            $table->integer("maxp_id");
            $table->integer("matinh_id");
            $table->string("anhdaidien",100);
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
        Schema::dropIfExists('tinmuaban');
    }
}
