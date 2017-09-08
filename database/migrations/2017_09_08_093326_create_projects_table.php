<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amd_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('location');
            $table->text('scope');
            $table->string('img_large');
            $table->string('img_large_alt');
            $table->string('img_thumb');
            $table->string('img_thumb_alt');
            $table->date('post_date');
            $table->string('flag_publish', 1)->default('Y');
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
        Schema::dropIfExists('projects');
    }
}
