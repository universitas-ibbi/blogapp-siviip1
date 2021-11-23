<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblkomentar', function (Blueprint $table) {
            $table->id();
            $table->text("isi");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")
                ->on("users");
            // $table->foreignId("user");
            $table->unsignedBigInteger("blog_id");
            $table->foreign("blog_id")->references("id")
                ->on("tblblog");
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
        Schema::dropIfExists('tblkomentar');
    }
}
