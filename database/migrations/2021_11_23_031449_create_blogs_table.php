<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblblog', function (Blueprint $table) {
            $table->id();
            $table->string("judul");
            $table->text("isi");
            $table->unsignedBigInteger("kategori_id");
            $table->foreign("kategori_id")->references("id")
                ->on("tblkategori");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")
                ->on("users");
            // $table->foriegnId("user");
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
        Schema::dropIfExists('tblblog');
    }
}
