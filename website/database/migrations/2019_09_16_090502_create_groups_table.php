<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('g_id');
            $table->string('course_name');
            $table->integer('course_code');
            $table->unique(['course_name', 'course_code']);
            $table->integer('section_number')->nullable();
            $table->integer('semester_number');
            $table->string('url')->unique();
            $table->string('instructor_name')->default("General");
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('u_id')->on('users');
            $table->integer('university_id')->unsigned();
            $table->foreign('university_id')->references('un_id')->on('universities');
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
