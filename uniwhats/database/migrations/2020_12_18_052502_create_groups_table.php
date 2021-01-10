<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string("url")->unique();
            $table->unsignedBigInteger("department_id");
            $table->foreign('department_id')->references("id")->on("departments")->onDelete("cascade");
            $table->string("courseCode");
            $table->string("instructorName")->nullable();
            $table->integer("sectionNumber")->nullable();
            $table->boolean("isGeneral");
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
        Schema::dropIfExists('groups');
    }
}
