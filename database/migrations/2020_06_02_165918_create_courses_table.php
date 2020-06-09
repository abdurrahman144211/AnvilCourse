<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('title', 60);
            $table->string('slug')->index();
            $table->string('short_overview');
            $table->text('overview');
            $table->text('requirements'); // json data
            $table->string('type');
            $table->enum('level', ['beginner', 'intermediate', 'advanced', 'expert'])->index();
            $table->integer('price')->default(0);
            $table->boolean('approved')->default(false);
            $table->boolean('live')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('courses');
    }
}
