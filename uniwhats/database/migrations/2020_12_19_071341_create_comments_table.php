<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text("commentText");
            $table->unsignedBigInteger("group_id");
            $table->foreign("group_id")->references("id")->on('groups')->onDelete("cascade");
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references("id")->on("users")->onDelete("set null");

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
        Schema::dropIfExists('comments');
    }
}
